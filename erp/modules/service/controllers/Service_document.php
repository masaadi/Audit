<?php
include_once 'BaseController.php';

class Service_document extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->model('service/service_document_model', 'personal_model');
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
		$this->data['dynamicView'] = "service_document/index";
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
        $config['base_url'] = base_url() . 'service/service_document/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->personal_model->get_user_data($conditions);
        $this->load->view('service/service_document/home', $data);

    }
	
	public function add()
    {   $data['designations'] = $this->db->get('designation')->result();
        $this->load->view('service/service_document/entry',$data);
    }

    public function added(){
        $service_type = $this->input->post('service_type');
        $doc_name = $this->input->post('doc_name');

        $duplicate_check = $this->db->where('service_type_id',$service_type)->get('service_document')->result();
        if(!empty($duplicate_check)){
            $this->toastr->success('Data Already exist!');
            echo json_encode(array("status" => "warning", "message" => "Data Already exist!"));
        }else{
            foreach ($doc_name as $value) {
                $save['service_type_id'] = $service_type;
                $save['document_name'] = $value;
                $this->db->insert('service_document',$save);
            }
            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "Data is saved successfully"));
        }

    }

    public function edit($service_type){
        $data['service_document'] = $this->db->select('service_type.service_type,service_document.*')->where('service_type_id',$service_type)->join('service_type','service_type.id = service_document.service_type_id','left')->get('service_document')->result();        
        $this->load->view('service/service_document/edit', $data);
    }

    public function update(){

        $id = $this->input->post('id');
        $service_type = $this->input->post('service_type');
        $doc_name = $this->input->post('doc_name');

        //echo "<pre>"; print_r($id); die();

        $row=0;
        foreach ($doc_name as $value) {
            if(isset($id[$row])){
                $update['document_name'] = $value;
                $this->db->where('id',$id[$row])->update('service_document',$update);

            }else{
                $save['service_type_id'] = $service_type;
                $save['document_name'] = $value;
                $this->db->insert('service_document',$save);
            }

            $row++;
        }
        $this->toastr->success('saved successfully');
        echo json_encode(array("status" => "success", "message" => "Data is saved successfully"));
    }

    public function show($service_type_id,$count1){
        $data['count1'] = $count1;
        //$data['designations'] = $this->db->get('designation')->result();
        $data['approval_chain'] = $this->db->select('approval_chain.*,designation.designation_name, designation.id as desig_id,service_type.id as type_id,service_type.service_type')
                    ->join('service_type','approval_chain.service_type_id = service_type.id')
                    ->join('designation','approval_chain.designation = designation.id')
                    ->where('approval_chain.service_type_id',$service_type_id)
                    ->get('approval_chain')->result();       
        $this->load->view('service/service_document/show', $data);
    }

    function delete($id){
        $this->db->where('id',$id)->delete('service_document');       

    }
    // ajax
    public function get_emp_by_desig($designation){
        $emp_info = $this->db->select('personal_info.employee_name,personal_info.employee_id')
                            ->where('current_desig',$designation)
                            ->join('personal_info','personal_info.employee_id = job_info.employee_id','left')
                            ->get('job_info')->row();

        if (empty($emp_info)) {
                echo "<option value=''>not found</option>";
                die;
        }else{
            echo "<option value=''>---select---</option>";

            foreach ($emp_info as $row3) {
                echo  "<option value='" . $row3->employee_id . "'>" . $row3->employee_name . "</option>";                     
            }
        }

            
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
