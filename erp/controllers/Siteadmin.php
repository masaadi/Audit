<?php
include_once 'BaseController.php';
class Siteadmin extends BaseController {

    var $min_username = 4;
    var $max_username = 20;
    var $min_password = 4;
    var $max_password = 20;

    public function __construct() {
        parent::__construct();
        $this->lang->load('default', $this->session->userdata('lang_file'));
        $this->load->model('users', 'U_model');
    }

    public function index() {
        $this->login();
    }



    function captcha_check($code) {
        $result = TRUE;
        if ($this->dx_auth->is_captcha_expired()) {
            // Will replace this error msg with $lang
            $this->form_validation->set_message('captcha_check', 'Your confirmation code has expired. Please try again.');
            $result = FALSE;
        } elseif (!$this->dx_auth->is_captcha_match($code)) {
            $this->form_validation->set_message('captcha_check', 'Your confirmation code does not match the one in the image. Try again.');
            $result = FALSE;
        }
        return $result;
    }

    function recaptcha_check() {
        $result = $this->dx_auth->is_recaptcha_match();
        if (!$result) {
            $this->form_validation->set_message('recaptcha_check', 'Your confirmation code does not match the one in the image. Try again.');
        }
        return $result;
    }

    function username_check($username) {
        $result = $this->dx_auth->is_username_available($username);
        if (!$result) {
            $this->form_validation->set_message('username_check', 'Username already exist. Please choose another username.');
        }
        return $result;
    }

    function email_check($email) {
        $result = $this->dx_auth->is_email_available($email);
        if (!$result) {
            $this->form_validation->set_message('email_check', 'Email is already used by another user. Please choose another email address.');
        }
        return $result;
    }

    function login($id=NULL) {

        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'v_login';
		 $this->data['id'] = $id;
        //echo 'Here';exit;
        if (!$this->dx_auth->is_logged_in()) {

            $val = $this->form_validation;

            // Set form validation rules
            $val->set_rules('username', 'Username', 'trim|required|xss_clean');
            $val->set_rules('password', 'Password', 'trim|required|xss_clean');
            $val->set_rules('remember', 'Remember me', 'integer');


            // Set captcha rules if login attempts exceed max attempts in config
            if ($this->dx_auth->is_max_login_attempts_exceeded()) {
                $val->set_rules('captcha', 'Confirmation Code', 'trim|required|xss_clean|callback_captcha_check');
            }

            if ($val->run() AND $this->dx_auth->login($val->set_value('username'), $val->set_value('password'), $val->set_value('remember'))) {	
                //Add by lt
                $user_id = $this->session->userdata('DX_user_id'); 
                $this->load->model("admin/user_model");
                $user_privilege = $this->user_model->get_user_wise_privilege($user_id);

                $user_privileges = array();
                $m_index = 'module_name';
                if($this->session->userdata("lang_file")=='bn'){
                    $m_index = 'module_name_bn';
                }
                if($user_privilege){
                    foreach ($user_privilege as $k => $v) {
                        $user_privileges[$v[$m_index]."~".$v['module_icon']][] = $v;
                    }
                }
                $this->session->set_userdata('user_privileges', $user_privileges);
                // end add by lt
                		
                if ($this->dx_auth->is_admin()) {
                    
                    $redir_loc = "admin/home";
                }
				elseif ($this->dx_auth->is_employee()) {
                    $redir_loc = "applicant/home";
                }
				elseif ($this->dx_auth->is_entrepreneur()) {
                    
                    $redir_loc = "applicant/home";
                }
				else {
                    
                    $redir_loc = "inspector/inspection";
                }
				
				redirect($redir_loc);
				
            } else {
				
                // Check if the user is failed logged in because user is banned user or not
                if ($this->dx_auth->is_banned()) {
					
                    // Redirect to banned uri
                    $this->dx_auth->deny_access('banned');
                } else {
                    // Default is we don't show captcha until max login attempts eceeded
                    $this->data['show_captcha'] = FALSE;

                    // Show captcha if login attempts exceed max attempts in config
                    if ($this->dx_auth->is_max_login_attempts_exceeded()) {
						
                        // Create catpcha						
                        $this->dx_auth->captcha();
                        // Set view data to show captcha on view file
                        $this->data['show_captcha'] = TRUE;
                    }
					

                    // Load login page view
                    $this->data['windowTitle'] = $this->siteTitle . 'Login Panel';
                    $this->data['activeTab'] = 'login';
                   // $this->data['dynamicView'] = 'backend/login_form';
					$this->load->view("frontend/login_form",$this->data);
					
                }
            }
        } else {
            $this->dx_auth->logout();
			redirect('siteadmin');
            //$this->data['windowTitle'] = $this->siteTitle . 'User Login Confirmation';
            //$this->data['dynamicView'] = 'frontend/general_message';
            //redirect('welcome/dashboard');
        }

       // $this->_commonPageLayout('viewer');
    }
// password change 
    public function password_change(){
        $this->data['windowTitle'] = $this->siteTitle . 'User Login Confirmation';
        $this->data['activeTab'] = 'login';
        $this->data['dynamicView'] = "siteadmin/index";        
        $this->_commonPageLayout('viewer');
    }

    function change_password() {

        $val = $this->form_validation;
        // Set form validation
        $val->set_rules('old_password', 'Old Password', 'trim|required|xss_clean|min_length[' . $this->min_password . ']|max_length[' . $this->max_password . ']');
        $val->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length[' . $this->min_password . ']|max_length[' . $this->max_password . ']|matches[confirm_new_password]');
        $val->set_rules('confirm_new_password', 'Confirm New Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);
        } else {

            $old_password = $this->input->post("old_password");
            $new_password = $this->input->post("new_password");

            if ($val->run() AND $this->dx_auth->change_password($old_password, $new_password)) {
                $this->toastr->success('Password is changed Successfully!');
                echo json_encode(array("status" => "success", "message" => "success message"));
            } else {
                $this->toastr->success('Fail to change the password!');
                echo json_encode(array("status" => "fail", "message" => "success message"));
            }
        }
    }
    function test(){
        $this->load->library('session');
        $this->session->set_flashdata('message', "<div id='message'>Registration Completed Successfully !!</div>");
            //echo $message;

        redirect("siteadmin/register");
    }

  /////////////////

    public function verify_user() {

        $this->load->library('session');
        $this->data['windowTitle'] = $this->siteTitle;
        $this->data['mainTab'] = 'home';
        $this->data['activeTab'] = 'sRegister';
        $this->data['main_content'] = 'frontend/register/otp_page';
        $this->load->view('frontend/master',$this->data);

    }

    public function get_otp($employee_id,$user_type){
        $this->load->helper('sms_sender_helper');

        if($user_type == '1'){
            $emp_info = $this->db->where('employee_id',$employee_id)->get('personal_info')->row();
        }

        if($user_type == '2'){
            $emp_info = $this->db->where('phone',$employee_id)->where('status',1)->get('client')->row();
        }

        
        if(!empty($emp_info)){
            if($emp_info->phone != ''){
               /*  $otp = rand(100000,999999);
                $message = "Your OTP is ".$otp;
                eng_sms($emp_info->phone, $message);
                $data['employee_id'] = $employee_id;
                $data['otp'] = $otp;
                $this->db->insert('otp_control',$data);
                echo 1; */
				
				 $otp = rand(100000,999999);
                $message = "Your%20OTP%20is%20".$otp;
                eng_sms($emp_info->phone, $message);
                $data['employee_id'] = $employee_id;
                $data['otp'] = $otp;
                $this->db->insert('otp_control',$data);
                echo 1; 
            }
        }else{
            echo 0;
        }
    }

    function otp_verify($employee_id,$otp_no){
        $verify = $this->db->where('employee_id',$employee_id)->where('otp',$otp_no)->get('otp_control')->row();

        if(!empty($verify)){
            echo 1;
        }else{
            echo 0;
        }
    }

    function registration_form() {
        $employee_id = $this->input->post('employee_id');
        $otp_no = $this->input->post('otp_no');
        $user_type = $this->input->post('user_type');

        if(($employee_id != '') && ($otp_no != '')){

            if($user_type == '1'){
                $this->data['employee_id'] = $employee_id;
                $this->data['otp_no'] = $otp_no;
                $this->data['user_type'] = $user_type;
                $this->data['main_content'] = 'frontend/register/registration_form';
                $this->load->view('frontend/master',$this->data);
            }else{
                $this->data['employee_id'] = $employee_id;
                $this->data['otp_no'] = $otp_no;
                $this->data['user_type'] = $user_type;
                $this->data['main_content'] = 'frontend/register/registration_form1';
                $this->load->view('frontend/master',$this->data);
            }
            
        }else{
            redirect('welcome/notfound');
        }        
    }

    function registered(){
        $user_type = $this->input->post('user_type');
        $otp_no = $this->input->post('otp_no');
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
		$erp_ref = $this->input->post('erp_ref');
        $erp_ref_date = $this->input->post('erp_ref_date');
        $reg_date = date('Y-m-d');

        $duplicate_check = $this->db->where('registration_id',$reg_no)->get('service_register')->row();

        if(!empty($duplicate_check)){
            $this->toastr->success('Data Already exist');
            echo json_encode(array("status" => "success", "message" => "Data Already exist"));
            redirect('welcome/index');
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
			
			if($erp_ref != ''):
				$data['erp_ref'] = $erp_ref;
				$data['erp_ref_date'] = $erp_ref_date;
            endif;
            $data['date'] = $reg_date;
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
                  $config['max_size'] = '5000';
                  $config['file_name'] = $_FILES['document']['name'][$i];
           
                  $this->load->library('upload',$config); 
            
                  if($this->upload->do_upload('file')){
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
           
                    $upload_file['document'] = 'public/uploads/services/'.$filename;
                    $upload_file['service_regi_id'] = $service_id;
                    $this->db->insert('service_regi_document',$upload_file);
                  }
                }

            }
            $chain_emp_id = '';
            $approval_chain = $this->db->where('service_type_id',$service_type)->where('priority',1)->get('approval_chain')->row();

            if(!empty($approval_chain)){
                $chain_emp_id = $approval_chain->employee_id;
                $chain_priority = $approval_chain->priority;
            }
            $approval_step = array();
            $notification = array();

            $approval_step['service_id'] = $service_id;
            $approval_step['employee_id'] = $chain_emp_id;
            $approval_step['priority'] = $chain_priority;
            $approval_step['status'] = 0;
            $approval_step['created_date'] = date('Y-m-d');

            $notification['service_id'] = $service_id;
            $notification['employee_id'] = $chain_emp_id;
            $notification['status'] = 0;
            $this->db->insert('approval_steps',$approval_step);
            $this->db->insert('notification',$notification);

            $this->db->where('employee_id',$employee_id)->where('otp',$otp_no)->delete('otp_control');

            $service_info = $this->db->where('id',$service_id)->get('service_register')->row();
            $tracking_no = $service_info->registration_id;


            if($user_type == '1'){
                $emp_info = $this->db->where('employee_id',$service_info->employee_id)->get('personal_info')->row();
            }else{
                $emp_info = $this->db->where('phone',$service_info->employee_id)->get('client')->row();
            }
            
            $message = "Your%20registration%20is%20successfull%20for%20service,%20tracking%20number%20is.%20".$tracking_no;
            if(!empty($tracking_no)){
                $this->load->helper('sms_sender_helper');
                eng_sms($emp_info->phone,$message);
            }


            $this->toastr->success('Your registration is successfully completed');
            //echo json_encode(array("status" => "success", "message" => "Your registration is successfully completed"));
            redirect('welcome/index');

        }
    }







    // ajax

    public function get_emp($emp_id){
        $emp_info = $this->db->select('personal_info.employee_name,personal_info.phone,personal_info.email,job_info.current_scale,designation.designation_name,designation.id as desig_id,office.office_name,office.id as office_id')
                    ->join('job_info','job_info.employee_id = personal_info.employee_id','left')
                    ->join('designation','designation.id = job_info.current_desig','left')
                    ->join('office','office.id = job_info.current_office','left')
                    ->where('personal_info.employee_id',$emp_id)
                    ->get('personal_info')->row();
        echo json_encode($emp_info);
    }

    public function get_company($emp_id){
        $emp_info = $this->db->select('*')
                    ->where('client.phone',$emp_id)
                    ->get('client')->row();
        echo json_encode($emp_info);
    }

    public function track_service($tracking_no){
        $data['service_detail'] = $this->db->select('service_register.*,service_type.service_type')
                ->join('service_type','service_type.id = service_register.service_type_id','left')
                ->where('registration_id',$tracking_no)->get('service_register')->row();

        if(!empty($data['service_detail'])){
            $applicant = $this->db->select('personal_info.employee_name')->where('employee_id',$data['service_detail']->employee_id)->get('personal_info')->row();

            if(empty($applicant)){
                $applicant1 = $this->db->select('client.company_name')->where('phone',$data['service_detail']->employee_id)->get('client')->row();
                $data['applicant_name'] = $applicant1->company_name;
            }else{
                 $data['applicant_name'] = $applicant->employee_name;
            }

            if($data['service_detail']->status != 'pending'){
                $data['service_step'] = $this->db->select('personal_info.employee_name,designation.designation_name,approval_steps.*')
                            ->join('personal_info','personal_info.employee_id = approval_steps.employee_id','left')
                            ->join('job_info','personal_info.employee_id = job_info.employee_id','left')
                            ->join('designation','designation.id = job_info.current_desig','left')
                            ->where('service_id',$data['service_detail']->id)
                            ->order_by('approval_steps.id','asc')
                            //->where('approval_steps.status',1)
                            ->get('approval_steps')->result();
            }
        }else{
            $data['failed'] = 1;
        }

        
        
        echo json_encode($data);
    }

    public function get_document_list(){
        $service_type = $this->input->post('service_type');
        $document_list = $this->db->where('service_type_id',$service_type)->get('service_document')->result();
        echo json_encode($document_list);
    }





    public function verify($id=0) {
        $check=$this->Shows->verify_pass($id);
        if($check){
            $data=array(
                'status'=>1
            );

        }else{
            $data=array(
                'status'=>2
            );
        }
        $this->load->view('frontend/verify', $data);
    }

   function logout() {
          $this->dx_auth->logout();
          redirect('siteadmin');
    }

    function angular_logout($token) {
          $this->dx_auth->angular_logout($token);
          redirect('siteadmin');
    }
	
	function post_office(){
		$query = $this->Shows->getValue("","MASTER_POST_OFFICE");
		//echo "<pre>";print_r($query);
		foreach($query as $temp):
		  $disid = $this->Shows->getNameById("ID = '$temp->THANA_ID'","MASTER_THANA","DISTRICT_ID");
		  $data = array(
		    'DISTRICT_ID'=>$disid
		  );
		  $this->Shows->updateValue($data,"MASTER_POST_OFFICE","ID = '$temp->ID'");
		endforeach;
		
	}
	public function table_list(){
		$data ="HR_ACR_EVALUATION_OFFICER+
			HR_ACR_MEDICAL_REPORT+
			HR_ADD_LEAVE+
			HR_ADDRESS+
			HR_CHILDREN+
			HR_CURRENT_JOB_INFO+
			HR_DISCIPLINARY+
			HR_EDUCATION+
			HR_EXTRA_ORDINARY+
			HR_FAMILY+
			HR_FOREIGN_TRAVEL+
			HR_JOINING_JOB_INFO+
			HR_NOC_CERTIFICATE+
			HR_NOMINEE+
			HR_OTHER+
			HR_PERSONALINFO+
			HR_PRIOR+
			HR_PROMOTION+
			HR_REFERENCE+
			HR_REINSTATE+
			HR_SENIORITY_POSITION+
			HR_SUSPEND+
			HR_TRAINING+
			HR_TRANSFER+
		    CPF_FINAL_PAYMENT+
			CPF_LOAN_APPLICATION+
			CPF_LOAN_DEDUCTION+
			CPF_OPENING_BALANCE+
			PAY_GRATUITY_INFO+
			PAY_GRATUITY_DEDUCTION+
			PAY_INCREMENT+
			PAY_LOAN_INSTALLMENT+
			PAY_MONTHLY_SALARY+
			PAY_OT_DETAILS+
			PAY_PF+
			PAY_SALARY_ENTRY+
			PFIX_NATIONAL+
			PFIX_PROMOTIONAL+
			PFIX_SELECTION_GRADE+
			PFIX_TIME_SCALE+
			PFIX_UPPER_GRADE+
			INV_REQUISITION+
			STAFF_APPLICATION+
			STAFF_CANCELLATION+
			STAFF_QUARTER_NOTICE_FORWARD+
			STAFF_UTILITY_BILL+
			ADD_ROLE_EMPLOYEE_ASSIGN+
			AUDIT_OBJ_EMP+
			BIO_ATT_REQUEST+
			BIO_ATTENDANCE+
			BIO_MT_ROSTER+
			BUG_FORWARDED_REQUISITION+
			BUG_OTHER_BILL_FORWARD+
			BUG_OTHERS_BILL+
			CPF_EMPLOYEE_PF+
			EMP_SUBMIT_ACR+			
			INS_LIFE_BILL_PREPARE+
			INS_LIFE_CLAIM_INFO+
			INV_REQUISITION+
			LAW_PETITIONER+
			LAW_RESPONDER+
			MASTER_ASSIGN_HEAD+
			MASTER_LEAVE_OPENING+
			PAY_GRATUITY_DEDUCTION+
			PAY_GRATUITY_INFO+
			PAY_INCREMENT+
			PAY_LOAN_INSTALLMENT+
			PAY_OT_DETAILS+
			PFIX_LEAVE+
			SMS_CONTACT+
			SMS_CUSTOM_SMS+
			STAFF_APPLICATION+
			STAFF_CANCELLATION+
			STAFF_UTILITY_BILL+
			VEH_APPLICATION_TICKET+
			VEH_DESIGNATION_WISE_ALLOT+
			VEH_DRIVER_INFO+
			VEH_REQUISITION_FOR_VEHICLE+
			VEH_ROOT_WISE_ALLOT+
			users
			";
           $a1= explode('+',$data);
         
		   $i = 1;
		  foreach($a1 as $key=>$value){
			  $data = array(
			    'TABLE_NAME'=>trim($value)
			  );
			  $cc = trim($value);
			  $query = $this->Shows->getValue("TABLE_NAME = '$cc'","TABLE_LIST");
			  if(count($query)){
				  
			  }
			  else{
				 $this->Shows->insertData($data,"TABLE_LIST");
				 $i++;
			  }
			  
		  }
		echo $i;  
	}
	
	public function id_change(){
        $this->data['windowTitle'] = $this->siteTitle . 'ID Change';
        $this->data['activeTab'] = 'login';
		if(count($_POST)){			
			$val = $this->form_validation;
            $val->set_rules('old_id', 'Old ID', 'trim|required|xss_clean');
			$val->set_rules('new_id', 'New ID', 'trim|required|xss_clean');
			if ($val->run()){
				$old_id = $this->input->post("old_id");
				$new_id = $this->input->post("new_id");
				$query = $this->Shows->getValue("","TABLE_LIST");
				foreach($query as $temp){
                  if($temp->TABLE_NAME =='users'){					
						$data = array(
						  'USERNAME'=>$new_id
						);
					  $chechuser = $this->Shows->getValue("USERNAME = '$new_id'","users");
					  if(count($chechuser)){}
					  else{
					   $this->Shows->updateValue($data,"users","USERNAME = '$old_id'");	
					  }
				   
				  }
				  else{
					 $data = array(
					  'EMPLOYEE_ID'=>$new_id
					);
				   $this->Shows->updateValue($data,$temp->TABLE_NAME,"EMPLOYEE_ID = '$old_id'");	
				    
					  
				  }
				}
				
				$this->session->set_flashdata('message', '<div id="message">Data Update Successfully</div>');
                redirect('siteadmin/id_change');			
				
			}
		}
		
        $this->data['dynamicView'] = "siteadmin/id_change";        
        $this->_commonPageLayout('viewer');
    }
	
	public function forge_password_view(){
        return $this->load->view('frontend/forget_form');
    }

    public function get_password(){
        $this->load->helper('sms_sender_helper');
        $user_type = $this->input->post("user_type");
        $username = $this->input->post("username");
        $temp_pass = rand(10000000,99999999);
        $message = "Your password has been reset. New Password is {$temp_pass}";
        $update['password'] = crypt($this->dx_auth->_encode($temp_pass),'');

        if(($user_type != '') && ($username != '')){
            $is_valid = $this->db->where('user_type',$user_type)->where('username',$username)->get('users')->row();
            if(!empty($is_valid)){
                if($user_type == '2'){
                    $emp_info = $this->db->select('phone')->where('employee_id',$is_valid->employee_id)->get('personal_info')->row();
                    if(!empty($emp_info)){
                        eng_sms($emp_info->phone,$message);
                        $this->db->where('user_type',$user_type)->where('username',$username)->update('users',$update);
                    }
                }else{
                    eng_sms($is_valid->mobile,$message);
                    $this->db->where('user_type',$user_type)->where('username',$username)->update('users',$update);
                }
            }
            $this->session->set_flashdata('message', '<div id="message">Password is sent to your mobile</div>');
        }else{
            $this->session->set_flashdata('message', '<div id="message">Incorrect information</div>');
        }
    }

	// public function send_otp(){
 //        $mobile = $this->input->post("mobile");
 //        $user=$this->U_model->get_user_by_mobile($mobile);
 //        if($user){
 //            $otp= rand(100000,999999);
 //            $otp_update = array(
 //                'otp'=>1111
 //            );
 //            $id=$user[0]->id;
 //            $con = "id = '$id'";
 //            $this->Shows->updateThisValue($otp_update, "users", $con);
 //            return $this->load->view('frontend/change_pass_form');

 //        }else{
 //            echo false;
 //        }
 //    }
	public function change_forget_password(){
        $message=[];
        $new_password= $this->input->post("new_password");
        $confirm_password= $this->input->post("confirm_password");
        if($new_password==$confirm_password){
            $otp = $this->input->post("otp");
            $user=$this->U_model->get_user_by_otp($otp);
            if($user){
                $update_pass = array(
                    'password' => crypt($this->dx_auth->_encode($this->input->post("new_password")),''),
                    'otp'=>''
                );
                $id=$user[0]->id;
                $con = "id = '$id'";
                $this->Shows->updateThisValue($update_pass, "users", $con);
                $message['status']=true;
                $message['message']='Password successfully chnaged.Please login now.';
            }else{
                $message['status']=false;
                $message['message']='Your otp is incorrect';
            }
        }else{
            $message['status']=false;
            $message['message']='Password and confirm password dosn\'t match.';
        }

        echo json_encode($message);
    }
	


    // protected function _commonPageLayout($viewName, $cacheIt = FALSE) {
    //     $view = $this->layout->view($viewName, $this->data, TRUE);

    //     $replaces = array(
    //         '{SITE_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE),
    //     );
    //     $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    // }
    protected function _commonPageLayout($viewName, $cacheIt = FALSE)
    {
        $view = $this->layout->view($viewName, $this->data, TRUE);
        $replaces = array(
            '{SITE_BACKEND_TOP_HEADER}' => $this->load->view('backend/site_top_header', $this->data, TRUE),
            '{SITE_BACKEND_LEFT_MENU}' => $this->load->view('backend/site_left_menu', NULL, TRUE),
            '{SITE_BACKEND_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE)
        );
        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }

}

?>