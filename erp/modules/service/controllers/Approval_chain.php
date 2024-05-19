<?php
include_once 'BaseController.php';

class Approval_chain extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->model('service/approval_chain_model', 'personal_model');
    }


    public function index(){
        //echo "Personal info"; die();
        $totalRec = @count($this->personal_model->get_user_data());
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'service/approval_chain/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->personal_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "approval_chain/index";
        $this->_commonPageLayout('viewer');
     
   }
   
   public function paginate_data()
    {
        $conditions = array();
        //calc offset number
        $page = $this->input->post('page');

        if (!$page) {
            $offset = 0;
            $data['loop_start'] = 0;
			 $data['count1'] = 0;
        } else {
            $offset = $page;
            $data['loop_start'] = $page;
			$data['count1'] = $page ;
        }
        $service_type = $this->input->post('service_type');      

        if (!empty($service_type)) {
            $conditions['search']['service_type'] = $service_type;
        }

        $totalRec = @count($this->personal_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#service_type';
        $config['base_url'] = base_url() . 'service/approval_chain/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->personal_model->get_user_data($conditions);
        $this->load->view('service/approval_chain/home', $data);

    }
	
	public function add()
    {   $data['designations'] = $this->db->get('designation')->result();
        $this->load->view('service/approval_chain/entry',$data);
    }

    public function added(){
        $service_type = $this->input->post('service_type');
        $employee_id = $this->input->post('employee');
        $message = $this->input->post('message');

        $this->form_validation->set_rules('service_type', 'Service Type', 'trim|required|xss_clean');

        
        if ($this->form_validation->run() == false) {
            $this->toastr->success('Data Already exist!');
            echo json_encode(array("status" => "warning", "message" => "Data Already exist!"));
        } else {

            $duplicate_check = $this->db->where('service_type_id',$service_type)->get('approval_chain')->row();

            if(!empty($duplicate_check)){
                $this->toastr->success('Required Service Type');
                echo json_encode(array("status" => "warning", "message" => "Data Already exist!"));
            }else{
                $data = array();
                $i = 0;
                $priority = 1;
                foreach($employee_id as  $emp_id){
                    $data['service_type_id'] = $service_type;
                    $data['priority'] = $priority;
                    $data['employee_id'] = $emp_id;
                    $data['message'] = $message[$i];

                    $this->db->insert('approval_chain',$data);
                    $i++;
                    $priority++;

                    $this->toastr->success('saved successfully');
                }
                echo json_encode(array("status" => "success", "message" => "saved successfully!"));
            }

            
            
        }
    }

    public function edit($id){
        $data['designations'] = $this->db->get('designation')->result();
        $data['approval_chain'] = $this->db->select('approval_chain.*,service_type.id as type_id,service_type.service_type,job_info.current_desig,personal_info.employee_name')
                    ->join('service_type','approval_chain.service_type_id = service_type.id')
                    ->join('personal_info','personal_info.employee_id = approval_chain.employee_id','left')
                    ->join('job_info','personal_info.employee_id = job_info.employee_id','left')
                    ->where('approval_chain.service_type_id',$id)
                    ->order_by('approval_chain.id','asc')
                    ->get('approval_chain')->result();
        //echo "<pre>"; print_r($data['approval_chain']); die();
        $this->load->view('service/approval_chain/edit', $data);
    }

    public function update(){

        $chain_id = $this->input->post('chain_id');
        $service_type = $this->input->post('service_type');
        $employee_id = $this->input->post('employee');
        $message = $this->input->post('message');

        $this->form_validation->set_rules('service_type', 'Service Type', 'trim|required|xss_clean');

        
        if ($this->form_validation->run() == false) {
            $this->toastr->success('Service Type id required!');
            echo json_encode(array("status" => "warning", "message" => "Data Already exist!"));
        } else {

                $data = array();
                $update = array();
                $i = 0;
                $priority = 1;
                foreach($employee_id as  $emps){

                    if(isset($chain_id[$i]) && ($chain_id[$i] != '')){
                        $update['priority'] = $priority;
                        $update['employee_id'] = $emps;
                        $update['message'] = $message[$i];
                        $this->db->where('id',$chain_id[$i])->update('approval_chain',$update);
                    }else{
                        $data['service_type_id'] = $service_type;
                        $data['priority'] = $priority;
                        $data['employee_id'] = $emps;
                        $data['message'] = $message[$i];
    
                        $this->db->insert('approval_chain',$data);
                    }
                    
                    $i++;
                    $priority++;
                    $this->toastr->success('saved successfully');
                }
                echo json_encode(array("status" => "success", "message" => "saved successfully!"));            
            
        }
    }

    public function show($service_type_id,$count1){
        $data['count1'] = $count1;
        //$data['designations'] = $this->db->get('designation')->result();
        $data['approval_chain'] = $this->db->select('approval_chain.*,personal_info.employee_name,service_type.id as type_id,service_type.service_type,designation.designation_name')
                    ->join('service_type','approval_chain.service_type_id = service_type.id','left')
                    ->join('personal_info','personal_info.employee_id = approval_chain.employee_id','left')
                    ->join('job_info','personal_info.employee_id = job_info.employee_id','left')
                    ->join('designation','designation.id = job_info.current_desig','left')
                    ->where('approval_chain.service_type_id',$service_type_id)
                    ->order_by('approval_chain.priority','asc')
                    ->get('approval_chain')->result();       
        $this->load->view('service/approval_chain/show', $data);
    }

    function delete($id,$status){
        $message = "Data Active Successfully!";
        $con = "id = '$id'";
        if($status==1){
            $data = array(
                'status' => 0                 
            );
        $message = "Data Inactive Successfully!";
        $status='Inactive';

        }
        elseif($status==0){
            $data = array(
                'status' => 1                
            );
        }
        $result = $this->Shows->updateThisValue($data, "service_type", $con); 
        echo json_encode(array("status" => "success", "message" => $message));
       

    }
    // ajax
    public function get_emp_by_desig($designation){
        
        if(!empty($designation)){
            $emp_info = $this->db->select('personal_info.employee_name,personal_info.employee_id')
                            ->where('current_desig',$designation)
                            ->join('personal_info','personal_info.employee_id = job_info.employee_id','left')
                            ->get('job_info')->result();

            if (empty($emp_info)) {
                echo "<option value=''>not found</option>";
                die;
            }
            echo "<option value=''>--select--</option>";
            foreach ($emp_info as $emp_val) {
                echo  "<option value='" . $emp_val->employee_id . "'>" . $emp_val->employee_name." (".$emp_val->employee_id.")" . "</option>";                     
            }
        }

            
    }


    public function generateListPdf(){
        error_reporting('E_NONE');
        $this->load->library('mpdf/mpdf');
        $mpdf = new mPDF('', 'A4-P', 11, 'nikosh');             
        $mpdf->AddPage('P');

        $id = $this->input->post('id');
        
        $data['array'] = $this->db->select('personal_info.*,pre_upazila.upazila_name as pre_upazila,pre_district.district_name as pre_district, pre_division.division_name as pre_division,per_upazila.upazila_name as per_upazila,per_district.district_name as per_district, per_division.division_name as per_division')
            ->where('personal_info.id',$id)
            ->join('upazila as pre_upazila','pre_upazila.id = personal_info.pre_upazila')
            ->join('district as pre_district','pre_district.id = personal_info.pre_district')
            ->join('division as pre_division','pre_division.id = personal_info.pre_division')
            ->join('upazila as per_upazila','per_upazila.id = personal_info.per_upazila')
            ->join('district as per_district','per_district.id = personal_info.per_district')
            ->join('division as per_division','per_division.id = personal_info.per_division')
            ->get('personal_info')->row();
        $data['pdf'] = 1;
        $html = $this->load->view('service/approval_chain/pdf', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('personal_info.pdf', 'D');
        exit;
    }


    protected function _commonPageLayout($viewName, $cacheIt = FALSE){
        $view = $this->layout->view($viewName, $this->data, TRUE);
        $replaces = array(
            '{SITE_BACKEND_TOP_HEADER}' => $this->load->view('backend/site_top_header', $this->data, TRUE),
            '{SITE_BACKEND_LEFT_MENU}' => $this->load->view('backend/site_left_menu', NULL, TRUE),
            '{SITE_BACKEND_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE)
            );
        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }
	


}
