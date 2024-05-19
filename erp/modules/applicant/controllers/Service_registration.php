<?php
include_once 'BaseController.php';

class Service_registration extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->model('applicant/service_registration_model', 'personal_model');
    }


    public function index(){
        $totalRec = @count($this->personal_model->get_user_data());
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'applicant/service_registration/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->personal_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;

        $user_id = $this->session->userdata('DX_user_id');
        $user_info = $this->db->select('job_info.employee_id')->where('users.id',$user_id)->join('job_info','job_info.employee_id = users.employee_id','left')->get('users')->row();
        $employee_id = $user_info->employee_id;
        $this->data['employee_id'] = $employee_id;

		//echo "<pre>";print_r($this->data);die();
		$this->data['dynamicView'] = "service_registration/index";
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
        $emp_id = $this->input->post('emp_id');      
        $regi_no = $this->input->post('regi_no');      
        $service_type = $this->input->post('service_type');      

        if (!empty($emp_id)) {
            $conditions['search']['emp_id'] = $emp_id;
        }
        if (!empty($regi_no)) {
            $conditions['search']['regi_no'] = $regi_no;
        }
        if (!empty($service_type)) {
            $conditions['search']['service_type'] = $service_type;
        }

        $totalRec = @count($this->personal_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#service_type';
        $config['base_url'] = base_url() . 'applicant/service_registration/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $user_id = $this->session->userdata('DX_user_id');
        $user_info = $this->db->select('job_info.employee_id')->where('users.id',$user_id)->join('job_info','job_info.employee_id = users.employee_id','left')->get('users')->row();
        $employee_id = $user_info->employee_id;
        $data['employee_id'] = $employee_id;

        $data['wings'] = $this->personal_model->get_user_data($conditions);
        $this->load->view('applicant/service_registration/home', $data);

    }
	
	public function add(){
        $user_id = $this->userId;
        $user_info = $this->db->where('id',$this->userId)->get('users')->row();
        $data['employee_id'] = $user_info->employee_id;
        $this->load->view('applicant/service_registration/entry',$data);
    }

    public function added(){

        $service_type = $this->input->post('service_type');
        $reg_no = $this->input->post('reg_no');
        $employee_id = $this->input->post('employee_id');
        $designation_id = $this->input->post('designation');
        $salary_scale = $this->input->post('salary_scale');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');
        $dispatch_no = $this->input->post('dispatch_no');
        $dispatch_date = $this->input->post('dispatch_date');
        $enothi_ref = $this->input->post('enothi_ref');
        $enothi_ref_date = $this->input->post('enothi_ref_date');
        $reg_date = date('Y-m-d');

        $duplicate_check = $this->db->where('registration_id',$reg_no)->get('service_register')->row();

        if(!empty($duplicate_check)){
            $this->toastr->success('Data Already exist');
            echo json_encode(array("status" => "success", "message" => "Data Already exist"));
        }else{
            $data = array();

            $data['service_type_id'] = $service_type;
            $data['registration_id'] = $reg_no;
            $data['employee_id'] = $employee_id;
            $data['designation_id'] = $designation_id;
            $data['salary_scale'] = $salary_scale;
            $data['mobile'] = $mobile;
            $data['email'] = $email;

            if($dispatch_no != ''):
            $data['dispatch_no'] = $dispatch_no;
            $data['dispatch_date'] = $dispatch_date;
            endif;

            if($enothi_ref != ''):
            $data['enothi_ref'] = $enothi_ref;
            $data['enothi_ref_date'] = $enothi_ref_date;
            endif;
            
            $data['date'] = date('Y-m-d');
            $data['created_by'] = $this->userId;
            $data['created_date'] = date('Y-m-d');

            $service_id = $this->Shows->insertThisValue($data,'service_register');
            $upload_file = array();
            $doc_count = count($_FILES['document']['name']);

            //echo "<pre>"; print_r($_FILES['document']['name'][0]); die();
            for($i = 0; $i < $doc_count; $i++){
                if(!empty($_FILES['document']['name'][$i])){  

                  $_FILES['file']['name'] = $_FILES['document']['name'][$i];
                  $_FILES['file']['type'] = $_FILES['document']['type'][$i];
                  $_FILES['file']['tmp_name'] = $_FILES['document']['tmp_name'][$i];
                  $_FILES['file']['error'] = $_FILES['document']['error'][$i];
                  $_FILES['file']['size'] = $_FILES['document']['size'][$i];
          
                  $config['upload_path'] = 'public/uploads/services/'; 
                  $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                  $config['max_size'] = '30000';
                  $config['file_name'] = $_FILES['document']['name'][$i];
           
                  $this->load->library('upload',$config); 
            
                  if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    if($uploadData){
                        $filename = $uploadData['file_name'];               
                        $upload_file['document'] = 'public/uploads/services/'.$filename;
                        $upload_file['service_regi_id'] = $service_id;
                        $this->db->insert('service_regi_document',$upload_file);
                    }
                  }
                }

            }

            $approval_chain = $this->db->where('service_type_id',$service_type)->where('priority',1)->get('approval_chain')->row();
            $approval_step = array();
            $notification = array();

            $approval_step['service_id'] = $service_id;
            $approval_step['employee_id'] = $approval_chain->employee_id;
            $approval_step['priority'] = $approval_chain->priority;
            $approval_step['status'] = 0;
            $approval_step['created_date'] = date('Y-m-d');

            $notification['service_id'] = $service_id;
            $notification['employee_id'] = $approval_chain->employee_id;
            $notification['status'] = 0;
            $this->db->insert('approval_steps',$approval_step);
            $this->db->insert('notification',$notification);


            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "saved successfully!"));

        }

        
    }

    public function edit($id){
        $data['service_register'] = $this->db->select('service_register.*,service_type.id as type_id,service_type.service_type')
                ->join('service_type','service_type.id = service_register.service_type_id')
                ->where('service_register.id',$id)
                ->get('service_register')->row();
        //echo "<pre>"; print_r($data); die();      
        $this->load->view('applicant/service_registration/edit', $data);
    }

    public function update(){
        $id = $this->input->post('id');
        
        $service_type = $this->input->post('service_type');
        $reg_no = $this->input->post('reg_no');
        $employee_id = $this->input->post('employee_id');
        $designation_id = $this->input->post('designation');
        $salary_scale = $this->input->post('salary_scale');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');
        $dispatch_no = $this->input->post('dispatch_no');
        $dispatch_date = $this->input->post('dispatch_date');
        $enothi_ref = $this->input->post('enothi_ref');
        $reg_date = $this->input->post('reg_date');

        $duplicate_check = $this->db->where('registration_id',$reg_no)->get('service_register')->row();

        if(!empty($duplicate_check) && ($duplicate_check->id != $id)){
            $this->toastr->success('Data Already exist');
            echo json_encode(array("status" => "success", "message" => "Data Already exist"));
        }else{
            $data = array();
            $data['service_type_id'] = $service_type;
            //$data['registration_id'] = $reg_no;
            $data['employee_id'] = $employee_id;
            $data['designation_id'] = $designation_id;
            $data['salary_scale'] = $salary_scale;
            $data['mobile'] = $mobile;
            $data['email'] = $email;
            $data['dispatch_no'] = $dispatch_no;
            $data['dispatch_date'] = $dispatch_date;
            $data['enothi_ref'] = $enothi_ref;
            $data['date'] = date('Y-m-d');
            $data['created_by'] = $this->userId;
            $data['status'] = 'pending';
            //$data['created_date'] = date('Y-m-d');

            $this->db->where('id',$id)->update('service_register',$data);
            $upload_file = array();
            $doc_count = count($_FILES['document']['name']);

            //echo "<pre>"; print_r($_FILES['document']['name'][0]); die();
            for($i = 0; $i < $doc_count; $i++){
                if(!empty($_FILES['document']['name'][$i])){  

                  $_FILES['file']['name'] = $_FILES['document']['name'][$i];
                  $_FILES['file']['type'] = $_FILES['document']['type'][$i];
                  $_FILES['file']['tmp_name'] = $_FILES['document']['tmp_name'][$i];
                  $_FILES['file']['error'] = $_FILES['document']['error'][$i];
                  $_FILES['file']['size'] = $_FILES['document']['size'][$i];
          
                  $config['upload_path'] = 'public/uploads/services/'; 
                  $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                  $config['max_size'] = '5000';
                  $config['file_name'] = $_FILES['document']['name'][$i];
           
                  $this->load->library('upload',$config); 
            
                  if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
           
                    $upload_file['document'] = 'public/uploads/services/'.$filename;
                    $upload_file['service_regi_id'] = $id;
                    $this->db->insert('service_regi_document',$upload_file);
                  }
                }

            }

            $approval_chain = $this->db->where('service_type_id',$service_type)->where('priority',1)->get('approval_chain')->row();
            $approval_step = array();
            $notification = array();

            $approval_step['service_id'] = $id;
            $approval_step['employee_id'] = $approval_chain->employee_id;
            $approval_step['priority'] = $approval_chain->priority;
            $approval_step['status'] = 0;
            $approval_step['created_date'] = date('Y-m-d');

            $notification['service_id'] = $id;
            $notification['employee_id'] = $approval_chain->employee_id;
            $notification['status'] = 0;
            $this->db->insert('approval_steps',$approval_step);
            $this->db->insert('notification',$notification);

            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "saved successfully!"));
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
        $html = $this->load->view('applicant/service_registration/pdf', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('service_registration_info.pdf', 'D');
        exit;
    }

    public function show($id){
        $data['service_register'] = $this->db->select('service_register.*,service_type.id as type_id,service_type.service_type')
                ->join('service_type','service_type.id = service_register.service_type_id')
                ->where('service_register.id',$id)
                ->get('service_register')->row();
        //echo "<pre>"; print_r($data); die();      
        $this->load->view('applicant/service_registration/show', $data);
    }

    // ajax

    public function delete_doc($doc_id){
        $this->db->where('id',$doc_id)->delete('service_regi_document');        
    }
    public function get_emp($emp_id){
        $emp_info = $this->db->select('personal_info.employee_name,personal_info.phone,personal_info.email,job_info.current_scale,designation.designation_name,designation.id as desig_id,office.office_name,office.id as office_id')
                    ->join('job_info','job_info.employee_id = personal_info.employee_id','left')
                    ->join('designation','designation.id = job_info.current_desig','left')
                    ->join('office','office.id = job_info.current_office','left')
                    ->where('personal_info.employee_id',$emp_id)
                    ->get('personal_info')->row();
        echo json_encode($emp_info);
    }

    public function get_document_list(){
        $service_type = $this->input->post('service_type');
        $document_list = $this->db->where('service_type_id',$service_type)->get('service_document')->result();
        echo json_encode($document_list);
    }

    public function change_notifi_status($notif_id){
        $data['status'] = 1;
        $this->db->where('id',$notif_id)->update('notification',$data);
    }

    public function show_status($service_id){
        $data['processing_status'] = $this->db->select('approval_steps.*,personal_info.employee_name,designation.designation_name')
                ->join('personal_info','personal_info.employee_id = approval_steps.employee_id','left')
                ->join('job_info','personal_info.employee_id = job_info.employee_id','left')
                ->join('designation','designation.id = job_info.current_desig','left')
                ->where('approval_steps.service_id',$service_id)
                ->where('approval_steps.status',1)
                ->order_by('approval_steps.id','asc')
                ->get('approval_steps')->result();
        //echo "<pre>"; print_r($data); die();   
        $this->load->view('applicant/service_registration/status', $data);
    }

    public function show_query($service_id){
        $data['query_status'] = $this->db->select('deny_reason.*,job_info.employee_name,designation.designation_name')
                ->join('job_info','deny_reason.denied_by = job_info.employee_id','left')
                ->join('designation','designation.id = job_info.current_desig','left')
                ->where('deny_reason.service_id',$service_id)
                ->get('deny_reason')->result();
        //echo "<pre>"; print_r($data); die();   
        $this->load->view('applicant/service_registration/query_page', $data);
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
