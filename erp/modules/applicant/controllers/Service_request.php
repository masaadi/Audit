<?php
include_once 'BaseController.php';

class Service_request extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->model('applicant/service_request_model', 'personal_model');
        $this->load->helper('sms_sender_helper');

        $emp_info = $this->db->select('employee_id')->where('users.id',$this->userId)->get('users')->row();
        $this->employee_id  = $emp_info->employee_id;
    }


    public function index(){
        $totalRec = @count($this->personal_model->get_user_data());
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'applicant/service_request/index';
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


		// echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "service_request/index";
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
        $config['base_url'] = base_url() . 'service/service_request/paginate_data';
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
        $this->load->view('applicant/service_request/home', $data);

    }

    public function forward(){

        //print_r($_POST); die();
        $this->db->trans_start();

        $id = $this->input->post('service_id');
        $service_type = $this->input->post('service_type_id');
        $step_id = $this->input->post('step_id');
        $type = $this->input->post('type');
        if($type == 'forward'){
            $type = 1;
        }

        $approval_step = $this->db->where('id',$step_id)->get('approval_steps')->row();
        $approval_chain = $this->db->where('service_type_id',$service_type)->where('employee_id',$approval_step->employee_id)->where('priority',$approval_step->priority)->get('approval_chain')->row();

        // print_r($approval_chain); die();

        $priority = $approval_chain->priority + 1;
        $next_chain = $this->db->where('service_type_id',$service_type)->where('priority',$priority)->get('approval_chain')->row();
        
        // print_r($next_chain); die();
        $duplicate_check = $this->db->where('service_id',$id)->where('employee_id',$next_chain->employee_id)->where('status',0)->get('approval_steps')->row();
        if(empty($duplicate_check)):

            $save = array();
            $save['service_id'] = $id;
            $save['employee_id'] = $next_chain->employee_id;
            $save['priority'] = $next_chain->priority;
            $save['created_date'] = date('Y-m-d');
            $this->db->insert('approval_steps',$save);

            $update['status'] = 1;
            $this->db->where('id',$step_id)->update('approval_steps',$update);

            $service_up['status'] = 'processing';
            $this->db->where('id',$id)->update('service_register',$service_up);

            $notification['service_id'] = $id;
            $notification['employee_id'] = $next_chain->employee_id;
            $notification['status'] = 0;
            $this->db->insert('notification',$notification);

            
            $reason['action_type'] = $type;
            $reason['service_id'] = $id;
            $reason['step_id'] = $step_id;
            $reason['message'] = $this->input->post('message');
            $reason['actioned_by'] = $this->employee_id;
            $reason['created_date'] = date('Y-m-d');
            $this->db->insert('service_action_message',$reason);

            // to sms notification
            $message = $next_chain->message;
            $service_info = $this->db->where('id',$id)->get('service_register')->row();
            $emp_info = $this->db->where('employee_id',$service_info->employee_id)->get('personal_info')->row();
            if(!empty($message)):
                eng_sms($emp_info->phone, $message);
            endif;

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE){
                $this->toastr->danger('Server Error');
            }else{
                $this->toastr->success('Forwarded successfully');
            }
        endif;
    }

    public function backward_service(){
        //print_r($_POST); die();
        $this->db->trans_start();

        $id = $this->input->post('service_id');
        $service_type = $this->input->post('service_type_id');
        $step_id = $this->input->post('step_id');
        $type = $this->input->post('type');
        if($type == 'backward'){
            $type = 2;
        }

        $approval_step = $this->db->where('id',$step_id)->get('approval_steps')->row();

        $approval_chain = $this->db->where('service_type_id',$service_type)->where('employee_id',$approval_step->employee_id)->where('priority',$approval_step->priority)->get('approval_chain')->row();



        $priority = $approval_chain->priority - 1;
        $next_chain = $this->db->where('service_type_id',$service_type)->where('priority',$priority)->get('approval_chain')->row();

        $duplicate_check = $this->db->where('service_id',$id)->where('employee_id',$next_chain->employee_id)->where('status',0)->get('approval_steps')->row();
        if(empty($duplicate_check)):

            $save = array();
            $save['service_id'] = $id;
            $save['employee_id'] = $next_chain->employee_id;
            $save['priority'] = $next_chain->priority;
            $save['created_date'] = date('Y-m-d');
            $this->db->insert('approval_steps',$save);

            $update['status'] = 1;
            $this->db->where('id',$step_id)->update('approval_steps',$update);

            $service_up['status'] = 'processing';
            $this->db->where('id',$id)->update('service_register',$service_up);

            

            $reason['action_type'] = $type;
            $reason['service_id'] = $id;
            $reason['step_id'] = $step_id;
            $reason['message'] = $this->input->post('message');
            $reason['actioned_by'] = $this->employee_id;
            $reason['created_date'] = date('Y-m-d');
            $this->db->insert('service_action_message',$reason);

            $notification['service_id'] = $id;
            $notification['employee_id'] = $next_chain->employee_id;
            $notification['status'] = 0;
            $this->db->insert('notification',$notification);

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE){
                $this->toastr->danger('Server Error');
            }else{
                $this->toastr->success('Backwarded successfully');
            }
        endif;

        
    }
	

    public function approve_service(){
        $this->db->trans_start();

        $id = $this->input->post('service_id');
        $step_id = $this->input->post('step_id');

        $service_up = array();
        $service_up['status'] = 'completed';
        $this->db->where('id',$id)->update('service_register',$service_up);
        $this->toastr->success('Approved successfully');

        $update['status'] = 1;
        $this->db->where('id',$step_id)->update('approval_steps',$update);

        if(!empty($_FILES['app_doc']['name'])){  

          $_FILES['file']['name'] = $_FILES['app_doc']['name'];
          $_FILES['file']['type'] = $_FILES['app_doc']['type'];
          $_FILES['file']['tmp_name'] = $_FILES['app_doc']['tmp_name'];
          $_FILES['file']['error'] = $_FILES['app_doc']['error'];
          $_FILES['file']['size'] = $_FILES['app_doc']['size'];
  
          $config['upload_path'] = 'public/uploads/services/approve_letter/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|pdf';
          $config['max_size'] = '30000';
          $config['file_name'] = $_FILES['app_doc']['name'];
   
          $this->load->library('upload',$config); 
    
          if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
            if($uploadData){
                $filename = $uploadData['file_name'];   
                $upload_file['document'] = 'public/uploads/services/approve_letter/'.$filename;
                $upload_file['service_id'] = $id;
                $this->db->insert('approve_document',$upload_file);
            }            
          }
        }

        $this->db->trans_complete();

    }

    public function deny_service(){
        $this->db->trans_start();

        $id = $this->input->post('service_id');
        $step_id = $this->input->post('step_id');
        $message = $this->input->post('message');

        $emp_info = $this->db->select('employee_id')->where('id',$id)->get('service_register')->row();
        $employee_id = $emp_info->employee_id;
        //echo $service_id.'/'.$step_id; die();
        $service_up = array();
        $service_up['status'] = 'deny';
        $this->db->where('id',$id)->update('service_register',$service_up);
        $this->toastr->success('Deny successfully');

        $update['status'] = 1;
        $this->db->where('id',$step_id)->update('approval_steps',$update);

        $save['service_id'] = $id;
        $save['applicant_id'] = $employee_id;
        $save['message'] = $message;
        $save['denied_by'] = $this->employee_id;
        $save['created_date'] = date('Y-m-d');
        $this->db->insert('deny_reason',$save);
        $emp_personal_info = $this->db->select('phone')->where('employee_id',$emp_info->employee_id)->get('personal_info')->row();
        $message = "Your%20file%20has%20been%20returned,%20requesting%20to%20resubmit%20with%20the%20required%20information.";
        eng_sms($emp_personal_info->phone, $message);

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            $this->toastr->danger('Server Error');
        }else{
            $this->toastr->success('Denied successfully');
        }
    }

    public function view_action_detail($id){
        $data = array();
        $action_detail = $this->db->where('id',$id)->get('service_action_message')->row();
        if(!empty($action_detail)){
            $emp_detail = $this->db->select('personal_info.employee_name,job_info.current_desig')->where('personal_info.employee_id',$action_detail->actioned_by)->join('job_info','job_info.employee_id = personal_info.employee_id')->get('personal_info')->row();
            if(!empty($emp_detail->current_desig)){
                $desig_info = $this->db->where('id',$emp_detail->current_desig)->get('designation')->row();
                if(!empty($desig_info)){
                    $data['current_desig'] = $desig_info->designation_name;
                }else{
                    $data['current_desig'] = '';
                }
            }
            $data['message_detail'] = $action_detail;
            $data['emp_name'] = $emp_detail->employee_name;
            

            echo json_encode($data);
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
        $html = $this->load->view('applicant/service_request/pdf', $data, true);
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
        $this->load->view('applicant/service_request/show', $data);
    }

    // ajax

    public function get_emp($emp_id){
        $emp_info = $this->db->select('personal_info.employee_name,job_info.current_scale,designation.designation_name,designation.id as desig_id,office.office_name,office.id as office_id')
                    ->join('job_info','job_info.employee_id = personal_info.employee_id')
                    ->join('designation','designation.id = job_info.current_desig')
                    ->join('office','office.id = job_info.current_office')
                    ->where('personal_info.employee_id',$emp_id)
                    ->get('personal_info')->row();
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
