<?php
include_once 'BaseController.php';

class Seniority_info extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->model('applicant/seniority_model', 'personal_model');
    }


    public function index(){
        //echo "Personal info"; die();
        $totalRec = @count($this->personal_model->get_user_data());
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'applicant/seniority_info/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->personal_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "seniority_info/index";
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
        $emp_name = $this->input->post('emp_name');      
        $emp_id = $this->input->post('emp_id');      

        if (!empty($emp_name)) {
            $conditions['search']['emp_name'] = $emp_name;
        }
        if (!empty($emp_id)) {
            $conditions['search']['emp_id'] = $emp_id;
        }

        $totalRec = @count($this->personal_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'applicant/seniority_info/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->personal_model->get_user_data($conditions);
        $this->load->view('applicant/seniority_info/home', $data);

    }
	
	public function add()
    {       
        $this->load->view('applicant/seniority_info/entry');
    }

    public function added(){
        $employee_id = $this->input->post('employee_id');
        $duplicate = $this->db->where('employee_id',$employee_id)->get('seniority_info')->row();
        if(!empty($duplicate)){
            $this->toastr->success('Data Already exist!');
            echo json_encode(array("status" => "warning", "message" => "Data Already exist!"));
        }else{
            $data = array();
            $data['employee_id'] = $this->input->post('employee_id');
            $data['position'] = $this->input->post('position');
            
            $this->db->insert('seniority_info',$data);
            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "saved successfully!"));
        }
    }

    public function edit($id){
        $data['employee'] = $this->db->select('seniority_info.*,office.office_name,designation.designation_name,job_info.employee_name')
                ->where('seniority_info.id',$id)
                ->join('job_info','job_info.employee_id = seniority_info.employee_id')
                ->join('office','office.id = job_info.current_office')
                ->join('designation','designation.id = job_info.current_desig')
                ->get('seniority_info')->row();
        $this->load->view('applicant/seniority_info/edit', $data);
    }

    public function update(){
        $id = $this->input->post('id');
        $employee_id = $this->input->post('employee_id');
        $duplicate = $this->db->where('employee_id',$employee_id)->get('seniority_info')->row();
        if(!empty($duplicate) && ($id != $duplicate->id)){
            $this->toastr->success('Data Already exist!');
            echo json_encode(array("status" => "warning", "message" => "Data Already exist!"));
        }else{
            $data = array();
            $data['position'] = $this->input->post('position');
            
            $this->db->where('id',$id)->update('seniority_info',$data);
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
        $this->load->view('applicant/seniority_info/show', $data);
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
        $html = $this->load->view('applicant/seniority_info/pdf', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('personal_info.pdf', 'D');
        exit;
    }

    // ajax
    public function get_emp($emp_id){
        $emp_info = $this->db->select('job_info.*,office.office_name,designation.designation_name')
                            ->where('employee_id',$emp_id)
                            ->join('office','office.id = job_info.current_office')
                            ->join('designation','designation.id = job_info.current_desig')
                            ->get('job_info')->row();
        if(!empty($emp_info)){
            echo json_encode($emp_info);
        }else{
            $message = array("status"=>"empty");
            echo json_encode($message);
        }
        
    }


    protected function _commonPageLayout($viewName, $cacheIt = FALSE)
    {
        $view = $this->layout->view($viewName, $this->data, TRUE);
        $replaces = array(
            '{SITE_BACKEND_TOP_HEADER}' => $this->load->view('backend/site_top_header', $this->data, TRUE),
            '{SITE_BACKEND_LEFT_MENU}' => $this->load->view('backend/site_left_menu_applicant', NULL, TRUE),
            '{SITE_BACKEND_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE)
        );
        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }
	


}
