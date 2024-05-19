<?php
include_once 'BaseController.php';

class Service_type extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->model('service/service_type_model', 'personal_model');
    }


    public function index(){
        //echo "Personal info"; die();
        $totalRec = @count($this->personal_model->get_user_data());
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'service/service_type/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->personal_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "service_type/index";
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
        $config['base_url'] = base_url() . 'service/service_type/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->personal_model->get_user_data($conditions);
        $this->load->view('service/service_type/home', $data);

    }
	
	public function add()
    {       
        $this->load->view('service/service_type/entry');
    }

    public function added(){

        $this->form_validation->set_rules('service_type', 'Service Type', 'trim|required|is_unique[service_type.service_type]|xss_clean');
        
        if ($this->form_validation->run() == false) {
            $this->toastr->success('Data Already exist!');
            echo json_encode(array("status" => "warning", "message" => "Data Already exist!"));
        } else {
            $data = array();
            $data['service_type'] = $this->input->post('service_type');
            $this->db->insert('service_type',$data);
            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "saved successfully!"));
        }
    }

    public function edit($id){
        $con = "id = '$id'";
        $data['service_type'] = $this->db->where('id',$id)->get('service_type')->row();      
        $this->load->view('service/service_type/edit', $data);
    }

    public function update(){

        $id = $this->input->post('id');
        $original_value = $this->db->where('id',$id)->get('service_type')->row();
        if (strtolower($this->input->post('service_type')) != strtolower($original_value->service_type)) {
            $is_unique = '|is_unique[service_type.service_type]';
        } else {
            $is_unique = '';
        }

        $this->form_validation->set_rules('service_type', 'Service Type', 'trim|required|xss_clean'.$is_unique);
        
        if ($this->form_validation->run() == false) {
            $this->toastr->success('Data Already exist!');
            echo json_encode(array("status" => "warning", "message" => "Data Already exist!"));
        } else {
            $data = array();
            $data['service_type'] = $this->input->post('service_type');
            $this->db->where('id',$id)->update('service_type',$data);
            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "saved successfully!"));
        }
    }

    public function show($id,$count1){
        $con = "id = '$id'";
        $data['count1'] = $count1;
        $data['array'] = $this->db->select('personal_info.*,pre_upazila.upazila_name as pre_upazila,pre_district.district_name as pre_district, pre_division.division_name as pre_division,per_upazila.upazila_name as per_upazila,per_district.district_name as per_district, per_division.division_name as per_division')
            ->where('personal_info.id',$id)
            ->join('upazila as pre_upazila','pre_upazila.id = personal_info.pre_upazila')
            ->join('district as pre_district','pre_district.id = personal_info.pre_district')
            ->join('division as pre_division','pre_division.id = personal_info.pre_division')
            ->join('upazila as per_upazila','per_upazila.id = personal_info.per_upazila')
            ->join('district as per_district','per_district.id = personal_info.per_district')
            ->join('division as per_division','per_division.id = personal_info.per_division')
            ->get('personal_info')->row();       
        $this->load->view('service/service_type/show', $data);
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
        $html = $this->load->view('service/service_type/pdf', $data, true);
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
