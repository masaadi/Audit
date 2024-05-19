<?php
include_once 'BaseController.php';

class Job_info extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->model('applicant/job_info_model', 'personal_model');
    }


    public function index(){
        //echo "Personal info"; die();
        $totalRec = @count($this->personal_model->get_user_data());
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'applicant/job_info/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->personal_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "job_info/index";
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
        $config['base_url'] = base_url() . 'applicant/job_info/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->personal_model->get_user_data($conditions);
        $this->load->view('applicant/job_info/home', $data);

    }
	
	public function add()
    {       
        $this->load->view('applicant/job_info/entry');
    }

    public function added(){
        $employee_id = $this->input->post('employee_id');
        $duplicate = $this->db->where('employee_id',$employee_id)->get('job_info')->row();
        if(!empty($duplicate)){
            $this->toastr->success('Data Already exist!');
            echo json_encode(array("status" => "warning", "message" => "Data Already exist!"));
        }else{
            $data = array();
            $data['employee_id'] = $this->input->post('employee_id');
            $data['employee_name'] = $this->input->post('employee_name');
            $data['joining_date'] = $this->input->post('joining_date');
            $data['joining_office'] = $this->input->post('joining_office');
            $data['joining_desig'] = $this->input->post('joining_desig');
            $data['joining_grade'] = $this->input->post('joining_grade');
            $data['joining_scale'] = $this->input->post('joining_scale');
            $data['joining_salary'] = $this->input->post('joining_basic');
            $data['current_joining'] = $this->input->post('current_joining');
            $data['current_office'] = $this->input->post('current_office');
            $data['section'] = $this->input->post('section');
            $data['current_desig'] = $this->input->post('cuurent_desig');
            $data['posting_status'] = $this->input->post('posting_status');
            $data['current_grade'] = $this->input->post('current_grade');
            $data['current_scale'] = $this->input->post('current_scale');
            $data['current_basic'] = $this->input->post('current_basic');
            $data['emp_type'] = $this->input->post('emp_type');
            $data['emp_class'] = $this->input->post('emp_class');
            $data['quota'] = $this->input->post('quota');
            $data['qouta_info'] = $this->input->post('qouta_info');
            $data['qouta_type'] = $this->input->post('qouta_type');
            $data['district'] = $this->input->post('district');
            $data['prl_date'] = $this->input->post('prl_date');
            $data['detail'] = $this->input->post('responsibility');

            $config['upload_path']='public/uploads/employee';
            $config['allowed_types']='jpg|png|jpeg';
            $fdata=array();
            $error=array();
            $this->load->library('upload', $config);
            if(!empty($_FILES['signature']['name'])){
                if ( ! $this->upload->do_upload('signature'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    print_r ($error);
                }
                else
                {
                    $fdata =( $this->upload->data());
                    $data['signature']='public/uploads/employee/'.$fdata['file_name'];
                }
            }           

            $this->db->insert('job_info',$data);

            $login['user_type'] = 2;
            $login['username'] = $this->input->post('employee_id');
            $login['employee_id'] = $this->input->post('employee_id');
            $login['full_name'] = $this->input->post('employee_name');
            $login['password'] = crypt($this->dx_auth->_encode($this->input->post("password")), '');
            $this->db->insert('users',$login);

            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "saved successfully!"));
        }
    }

    public function edit($id){
        $con = "id = '$id'";
        $data['employee'] = $this->db->where('id',$id)->get('job_info')->row();       
        $this->load->view('applicant/job_info/edit', $data);
    }

    public function update(){
        $id = $this->input->post('id');
        $employee_id = $this->input->post('employee_id');
        $duplicate = $this->db->where('employee_id',$employee_id)->get('job_info')->row();
        if(!empty($duplicate) && ($duplicate->id != $id)){
            $this->toastr->success('Data Already exist!');
            echo json_encode(array("status" => "warning", "message" => "Data Already exist!"));
        }else{
            $data = array();
            $data['employee_id'] = $this->input->post('employee_id');
            $data['employee_name'] = $this->input->post('employee_name');
            $data['joining_date'] = $this->input->post('joining_date');
            $data['joining_office'] = $this->input->post('joining_office');
            $data['joining_desig'] = $this->input->post('joining_desig');
            $data['joining_grade'] = $this->input->post('joining_grade');
            $data['joining_scale'] = $this->input->post('joining_scale');
            $data['joining_salary'] = $this->input->post('joining_basic');
            $data['current_joining'] = $this->input->post('current_joining');
            $data['current_office'] = $this->input->post('current_office');
            $data['section'] = $this->input->post('section');
            $data['current_desig'] = $this->input->post('cuurent_desig');
            $data['posting_status'] = $this->input->post('posting_status');
            $data['current_grade'] = $this->input->post('current_grade');
            $data['current_scale'] = $this->input->post('current_scale');
            $data['current_basic'] = $this->input->post('current_basic');
            $data['emp_type'] = $this->input->post('emp_type');
            $data['emp_class'] = $this->input->post('emp_class');
            $data['quota'] = $this->input->post('quota');
            $data['qouta_info'] = $this->input->post('qouta_info');
            $data['qouta_type'] = $this->input->post('qouta_type');
            $data['district'] = $this->input->post('district');
            $data['prl_date'] = $this->input->post('prl_date');
            $data['detail'] = $this->input->post('responsibility');

            $config['upload_path']='public/uploads/employee';
            $config['allowed_types']='jpg|png|jpeg';
            $fdata=array();
            $error=array();
            $this->load->library('upload', $config);
            if(!empty($_FILES['signature']['name'])){
                if ( ! $this->upload->do_upload('signature'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    print_r ($error);
                }
                else
                {
                    $fdata =( $this->upload->data());
                    $data['signature']='public/uploads/employee/'.$fdata['file_name'];
                }
            } 

            //echo "<pre>"; print_r($data); die();          

            $this->db->where('id',$id)->update('job_info',$data);

            if($this->input->post("password") != ''){
                $login['password'] = crypt($this->dx_auth->_encode($this->input->post("password")), '');
                $this->db->where('username',$employee_id)->update('users',$login);
            }



            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "saved successfully!"));
        }
}

    public function show($id,$count1){
        $con = "id = '$id'";
        $data['count1'] = $count1;
        $data['array'] = $this->db->select('job_info.*,personal_info.emp_photo,personal_info.employee_name,personal_info.email,personal_info.phone,district.district_name,joining_office.office_name as joining_office,current_office.office_name as current_office,joining_desig.designation_name as joining_desig,current_desig.designation_name as current_desig,section.section_name,employee_type.type_name')
            ->where('job_info.id',$id)
            ->join('personal_info','personal_info.employee_id = job_info.employee_id','left')
            ->join('section','section.id = job_info.section','left')
            ->join('employee_type','employee_type.id = job_info.emp_type','left')
            ->join('office as joining_office','job_info.joining_office = joining_office.id','left')
            ->join('office as current_office','job_info.current_office = current_office.id','left')
            ->join('designation as joining_desig','job_info.joining_desig = joining_desig.id','left')
            ->join('designation as current_desig','job_info.current_desig = current_desig.id','left')
            ->join('district','district.id = job_info.district','left')->get('job_info')->row();      
        $this->load->view('applicant/job_info/show', $data);
    }


    public function generateListPdf(){
        error_reporting('E_NONE');
        $this->load->library('mpdf/mpdf');
        $mpdf = new mPDF('', 'A4-P', 11, 'nikosh');             
        $mpdf->AddPage('P');

        $id = $this->input->post('id');
        
        $data['array'] = $this->db->select('job_info.*,personal_info.emp_photo,personal_info.employee_name,personal_info.email,personal_info.phone,district.district_name,joining_office.office_name as joining_office,current_office.office_name as current_office,joining_desig.designation_name as joining_desig,current_desig.designation_name as current_desig,section.section_name,employee_type.type_name')

            ->where('job_info.id',$id)
            ->join('personal_info','personal_info.employee_id = job_info.employee_id')
            ->join('section','section.id = job_info.section')
            ->join('employee_type','employee_type.id = job_info.emp_type')
            ->join('office as joining_office','job_info.joining_office = joining_office.id')
            ->join('office as current_office','job_info.current_office = current_office.id')
            ->join('designation as joining_desig','job_info.joining_desig = joining_desig.id')
            ->join('designation as current_desig','job_info.current_desig = current_desig.id')
            ->join('district','district.id = job_info.district')->get('job_info')->row();
        $data['pdf'] = 1;
        $html = $this->load->view('applicant/job_info/pdf', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('personal_info.pdf', 'D');
        exit;
    }

    // ajax
    public function get_emp($emp_id){
        $emp_info = $this->db->where('employee_id',$emp_id)->get('personal_info')->row();
        echo json_encode($emp_info);
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
