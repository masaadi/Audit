<?php
include_once 'BaseController.php';

class Application extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('config', $this->session->userdata('lang_file'));
        $this->lang->load('master', $this->session->userdata('lang_file'));
        $this->lang->load('registration', $this->session->userdata('lang_file'));
        $this->load->model('admin/application_model');
        $this->lang->load('application', $this->session->userdata('lang_file'));
    }
    public function index(){
    }

    public function users()
    {   
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);

        $row = $this->application_model->get_register_user_info();
        $totalRec = ($row!='')?count($row):0;
        $config['target'] = '#postData';
        $config['base_url'] = base_url() . 'admin/users/page_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $this->data['posts'] = $this->application_model->get_register_user_info(array('limit' => $this->total_row));
        $this->data['total_rows'] = $totalRec;
        $this->data['loop_start'] = 0;
        $this->data['count1'] = 0;
        $this->data['offset'] = 0;
        //echo "<pre>";print_r($wings);die();
        $this->data['dynamicView'] = "application/users/index";
        $this->_commonPageLayout('viewer');
    }
    public function users_page_data($page = 0){
        $conditions = array();
        $page = $this->input->post('page');
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }
        $data['offset']=$offset;
        $user_name = $this->input->post('user_name');
        $user_email = $this->input->post('user_email');
        $user_phone = $this->input->post('user_phone');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
       
        if (!empty($user_name)) {
            $conditions['user_name'] = $user_name;
        }
        if (!empty($user_email)) {
            $conditions['user_email'] = $user_email;
        }

        if (!empty($user_phone)) {
            $conditions['user_phone'] = $user_phone;
        }

        if (!empty($start_date)) {
            $conditions['start_date'] = $start_date;
        }

        if (!empty($end_date)) {
            $conditions['end_date'] = $end_date;
        }


        $row = $this->application_model->get_register_user_info($conditions);
        $totalRec = ($row!='')?count($row):0;
        //pagination configuration
        $config['target'] = '#postList';
        $config['base_url'] = base_url() . 'admin/users/page_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;
        $data['posts'] = $this->application_model->get_register_user_info($conditions);
        $data['conditions'] = json_encode($conditions);

        $this->load->view('application/users/all_list_data', $data, false);
    }
    public function user_preview($id=0){
        $data['posts']=$this->application_model->getvalue_row('users','*',array('id'=>$id));
        $html=$this->load->view('application/users/user_view', $data, false);
    }

    public function new()
    {
        // //method for check permissions
        // $user_privileges=$this->session->userdata('user_privileges');
        // checkResult($user_privileges);
        
        $row = $this->application_model->get_new_user_info(array('user_id' => $this->userId, 'office_category_id' => $this->office_category_id, 'office_id' => $this->office_id));
        $totalRec = ($row!='')?count($row):0;
        $config['target'] = '#postData';
        $config['base_url'] = base_url() . 'admin/application/new_pagi';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $this->data['posts'] = $this->application_model->get_new_user_info(array('user_id' => $this->userId, 'office_category_id' => $this->office_category_id, 'office_id' => $this->office_id, 'limit' => $this->total_row));
        $this->data['pending'] = $this->application_model->get_new_pending_user();
        $this->data['fees'] = $this->application_model->getvalue_row('master_payment_configuration','app_form_fees',array('status'=>1));
        //$this->data['process_steps']=$this->reg_model->getvalue_row('process_steps','*' ,array());
        $this->data['types'] = $this->application_model->getvalue_row('industry_type','id,type_name_bn,type_name',array('status'=>1));
        $this->data['total_application'] = $totalRec;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
        $this->data['offset'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "application/new/index";
        $this->_commonPageLayout('viewer');
     
    }
    public function new_page_data($page = 0){
        $conditions = array();
        $page = $this->input->post('page');
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }
        $data['offset']=$offset;
        $app_id = $this->input->post('app_id');
        $app_name = $this->input->post('app_name');
        $app_type = $this->input->post('app_type');
        $app_status = $this->input->post('app_status');
        if (!empty($app_id)) {
            $conditions['app_id'] = $app_id;
        }
        if (!empty($app_name)) {
            $conditions['app_name'] = $app_name;
        }
        if (!empty($app_type)) {
            $conditions['app_type'] = $app_type;
        }
        if (!empty($app_status)) {
            $conditions['app_status'] = $app_status;
        }
        $row = $this->application_model->get_new_user_info($conditions);
        $totalRec = ($row!='')?count($row):0;
        //pagination configuration
        $config['target'] = '#postList';
        $config['base_url'] = base_url() . 'new_application/page_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;
        $data['fees'] = $this->application_model->getvalue_row('master_payment_configuration','app_form_fees',array('status'=>1));
        //$this->data['process_steps']=$this->reg_model->getvalue_row('process_steps','*' ,array());
        $data['types'] = $this->application_model->getvalue_row('industry_type','id,type_name_bn,type_name',array('status'=>1));
        $data['posts'] = $this->application_model->get_new_user_info($conditions);
        $this->load->view('application/new/all_list_data', $data, false);
    }
    
    public function re_new()
    {
        $row = $this->application_model->get_re_new_user_info(array('user_id' => $this->userId, 'office_category_id' => $this->office_category_id, 'office_id' => $this->office_id));
        $totalRec = ($row!='')?count($row):0;
        $config['target'] = '#postData';
        $config['base_url'] = base_url() . 'admin/application/new_pagi';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $this->data['posts'] = $this->application_model->get_re_new_user_info(array('user_id' => $this->userId, 'office_category_id' => $this->office_category_id, 'office_id' => $this->office_id, 'limit' => $this->total_row));
        $this->data['pending'] = $this->application_model->get_re_new_pending_user();
        $this->data['fees'] = $this->application_model->getvalue_row('master_payment_configuration','renew_fees',array('status'=>1));
        //$this->data['process_steps']=$this->reg_model->getvalue_row('process_steps','*' ,array());
        $this->data['types'] = $this->application_model->getvalue_row('industry_type','id,type_name_bn,type_name',array('status'=>1));
        $this->data['total_application'] = $totalRec;
        $this->data['loop_start'] = 0;
        $this->data['count1'] = 0;
        $this->data['offset'] = 0;
        //echo "<pre>";print_r($wings);die();
        $this->data['dynamicView'] = "application/renew/index";
        $this->_commonPageLayout('viewer');
     
    }
    public function renew_page_data($page = 0){
        $conditions = array();
        $page = $this->input->post('page');
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }
        $data['offset']=$offset;
        $app_id = $this->input->post('app_id');
        $app_name = $this->input->post('app_name');
        $app_type = $this->input->post('app_type');
        $app_status = $this->input->post('app_status');
        if (!empty($app_id)) {
            $conditions['app_id'] = $app_id;
        }
        if (!empty($app_name)) {
            $conditions['app_name'] = $app_name;
        }
        if (!empty($app_type)) {
            $conditions['app_type'] = $app_type;
        }
        if (!empty($app_status)) {
            $conditions['app_status'] = $app_status;
        }
        $row =$this->application_model->get_re_new_user_info($conditions);
        $totalRec = ($row!='')?count($row):0;
        //pagination configuration
        $config['target'] = '#postList';
        $config['base_url'] = base_url() . 'renew_application/page_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;
        $data['fees'] = $this->application_model->getvalue_row('master_payment_configuration','renew_fees',array('status'=>1));
        //$this->data['process_steps']=$this->reg_model->getvalue_row('process_steps','*' ,array());
        $data['types'] = $this->application_model->getvalue_row('industry_type','id,type_name_bn,type_name',array('status'=>1));
        $data['posts'] = $this->application_model->get_re_new_user_info($conditions);
        $this->load->view('application/renew/all_list_data', $data, false);
    }

    public function resubmission()
    {
        $row = $this->application_model->get_resubmission_user_info(array('user_id' => $this->userId, 'office_category_id' => $this->office_category_id, 'office_id' => $this->office_id));
        $totalRec = ($row!='')?count($row):0;
        $config['target'] = '#postData';
        $config['base_url'] = base_url() . 'admin/application/new_pagi';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $this->data['posts'] = $this->application_model->get_resubmission_user_info(array('user_id' => $this->userId, 'office_category_id' => $this->office_category_id, 'office_id' => $this->office_id, 'limit' => $this->total_row));
        $this->data['pending'] = $this->application_model->get_resubmission_pending_user();
        $this->data['fees'] = $this->application_model->getvalue_row('master_payment_configuration','app_form_fees',array('status'=>1));
        //$this->data['process_steps']=$this->reg_model->getvalue_row('process_steps','*' ,array());
        $this->data['types'] = $this->application_model->getvalue_row('industry_type','id,type_name_bn,type_name',array('status'=>1));
        $this->data['total_application'] = $totalRec;
        $this->data['loop_start'] = 0;
        $this->data['count1'] = 0;
        $this->data['offset'] = 0;
        //echo "<pre>";print_r($wings);die();
        $this->data['dynamicView'] = "application/resubmission/index";
        $this->_commonPageLayout('viewer');
     
    }
    public function resubmission_page_data($page = 0){
        $conditions = array();
        $page = $this->input->post('page');
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }
        $data['offset']=$offset;
        $app_id = $this->input->post('app_id');
        $app_name = $this->input->post('app_name');
        $app_type = $this->input->post('app_type');
        $app_status = $this->input->post('app_status');
        if (!empty($app_id)) {
            $conditions['app_id'] = $app_id;
        }
        if (!empty($app_name)) {
            $conditions['app_name'] = $app_name;
        }
        if (!empty($app_type)) {
            $conditions['app_type'] = $app_type;
        }
        if (!empty($app_status)) {
            $conditions['app_status'] = $app_status;
        }
        $row =$this->application_model->get_resubmission_user_info($conditions);
        $totalRec = ($row!='')?count($row):0;
        //pagination configuration
        $config['target'] = '#postList';
        $config['base_url'] = base_url() . 'resubmission/page_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;
        $data['fees'] = $this->application_model->getvalue_row('master_payment_configuration','app_form_fees',array('status'=>1));
        //$this->data['process_steps']=$this->reg_model->getvalue_row('process_steps','*' ,array());
        $data['types'] = $this->application_model->getvalue_row('industry_type','id,type_name_bn,type_name',array('status'=>1));
        $data['posts'] = $this->application_model->get_resubmission_user_info($conditions);
        $this->load->view('application/resubmission/all_list_data', $data, false);
    }

    
    public function review_application()
    {
         //method for check permissions
         $user_privileges=$this->session->userdata('user_privileges');
         checkResult($user_privileges);
         
        $row = $this->application_model->get_review_user_info();
        $totalRec = ($row!='')?count($row):0;
        $config['target'] = '#postData';
        $config['base_url'] = base_url() . 'admin/review_app_page_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $this->data['posts'] = $this->application_model->get_review_user_info(array('limit' => $this->total_row));
        //$this->data['process_steps']=$this->reg_model->getvalue_row('process_steps','*' ,array());
        $this->data['types'] = $this->application_model->getvalue_row('industry_type','id,type_name_bn,type_name',array('status'=>1));
        $this->data['total_application'] = $totalRec;
        $this->data['loop_start'] = 0;
        $this->data['count1'] = 0;
        $this->data['offset'] = 0;
        //echo "<pre>";print_r($wings);die();
        $this->data['dynamicView'] = "application/review/index";
        $this->_commonPageLayout('viewer');
     
    }
    public function review_app_page_data($page = 0){
        $conditions = array();
        $page = $this->input->post('page');
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }
        $data['offset']=$offset;
        $app_id = $this->input->post('app_id');
        $app_name = $this->input->post('app_name');
        $app_type = $this->input->post('app_type');
        $app_date = $this->input->post('app_date');
        $ser_business_type = $this->input->post('ser_business_type');
        if (!empty($app_id)) {
            $conditions['app_id'] = $app_id;
        }
        if (!empty($app_name)) {
            $conditions['app_name'] = $app_name;
        }
        if (!empty($app_type)) {
            $conditions['app_type'] = $app_type;
        }
        if (!empty($app_date)) {
            //$dt=explode('/',$app_date);
            //$conditions['app_status'] = $dt[2].'-'.$dt[0].'-'.$dt[1];
            $conditions['app_date']=$app_date;
        }
        if (!empty($ser_business_type)) {
            $conditions['ser_business_type'] = $ser_business_type;
        }
        $row =$this->application_model->get_review_user_info($conditions);
        $totalRec = ($row!='')?count($row):0;
        //pagination configuration
        $config['target'] = '#postList';
        $config['base_url'] = base_url() . 'admin/review_app_page_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;
        //$this->data['process_steps']=$this->reg_model->getvalue_row('process_steps','*' ,array());
        $data['types'] = $this->application_model->getvalue_row('industry_type','id,type_name_bn,type_name',array('status'=>1));
        $data['posts'] = $this->application_model->get_review_user_info($conditions);
        $this->load->view('application/review/all_list_data', $data, false);
    }

    
    public function approved_application()
    {
        $row = $this->application_model->get_approve_user_info();
        $totalRec = ($row!='')?count($row):0;
        $config['target'] = '#postData';
        $config['base_url'] = base_url() . 'admin/approve_app_page_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $this->data['posts'] = $this->application_model->get_approve_user_info(array('limit' => $this->total_row));
        //$this->data['process_steps']=$this->reg_model->getvalue_row('process_steps','*' ,array());
        $this->data['types'] = $this->application_model->getvalue_row('industry_type','id,type_name_bn,type_name',array('status'=>1));
        $this->data['total_application'] = $totalRec;
        $this->data['loop_start'] = 0;
        $this->data['count1'] = 0;
        $this->data['offset'] = 0;
        //echo "<pre>";print_r($wings);die();
        $this->data['dynamicView'] = "application/approve/index";
        $this->_commonPageLayout('viewer');
     
    }
    public function approved_app_page_data($page = 0){
        $conditions = array();
        $page = $this->input->post('page');
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }
        $data['offset']=$offset;
        $app_id = $this->input->post('app_id');
        $app_name = $this->input->post('app_name');
        $app_type = $this->input->post('app_type');
        $app_date = $this->input->post('app_date');
        $ser_business_type = $this->input->post('ser_business_type');
        if (!empty($app_id)) {
            $conditions['app_id'] = $app_id;
        }
        if (!empty($app_name)) {
            $conditions['app_name'] = $app_name;
        }
        if (!empty($app_type)) {
            $conditions['app_type'] = $app_type;
        }
        if (!empty($app_date)) {
            //$dt=explode('/',$app_date);
            //$conditions['app_status'] = $dt[2].'-'.$dt[0].'-'.$dt[1];
            $conditions['app_date']=$app_date;
        }
        if (!empty($ser_business_type)) {
            $conditions['ser_business_type'] = $ser_business_type;
        }
        $row =$this->application_model->get_approve_user_info($conditions);
        $totalRec = ($row!='')?count($row):0;
        //pagination configuration
        $config['target'] = '#postList';
        $config['base_url'] = base_url() . 'admin/approved_app_page_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;
        //$this->data['process_steps']=$this->reg_model->getvalue_row('process_steps','*' ,array());
        $data['types'] = $this->application_model->getvalue_row('industry_type','id,type_name_bn,type_name',array('status'=>1));
        $data['posts'] = $this->application_model->get_approve_user_info($conditions);
        $this->load->view('application/approve/all_list_data', $data, false);
    }

   
   public function preview($id=0){
        $data['posts'] = $this->application_model->get_user_info_by_id($id);
        $data['heading'] = $this->application_model->getvalue_row('master_report_heading','report_heading_name,report_heading_name_bn,address,address_bn,logo_url,right_logo',array());
        if($data['posts']){
            $id_business=$data['posts'][0]['id_business'];
            $id_document=$data['posts'][0]['id_document'];
            $data['document_additional'] = $this->application_model->getvalue_row('en_document_additional','*',array('document_id'=>$id_document));
            $data['business_asset'] = $this->application_model->getvalue_row('en_business_asset','*',array('business_id'=>$id_business));
            $data['business_capital'] = $this->application_model->getvalue_row('en_business_capital','*',array('business_id'=>$id_business));
            $data['business_description'] = $this->application_model->getvalue_row('en_business_description','*',array('business_id'=>$id_business));
            $data['business_raw_materials'] = $this->application_model->getvalue_row('en_business_raw_materials','*',array('business_id'=>$id_business));

            $data['en_business'] = $this->application_model->getvalue_row('en_business','*',array('id'=>$id_business));
            $data['machine_list_local'] = $this->application_model->getvalue_row('en_machineries_list','*',array('contact_id'=>$data['posts'][0]['id'], 'machine_type'=>1));
            $data['machineries_imported'] = $this->application_model->getvalue_row('en_machineries_list','*',array('contact_id'=>$data['posts'][0]['id'], 'machine_type'=>2));

            $data['enterpeneur_info'] = $this->application_model->getvalue_row('en_enterpeneurs','*',array('contact_id'=>$data['posts'][0]['id']));
            $data['management_employee'] = json_decode($data['en_business'][0]['management_employee']);
            $data['skilled_sem_skl_emp'] = json_decode($data['en_business'][0]['skilled_sem_skl_emp']);
            $data['unskilled_employee']  = json_decode($data['en_business'][0]['unskilled_employee']);
        }
        $html=$this->load->view('application/preview', $data, false);
        //print_r($data['posts']);
        //echo json_encode(array("status" => $status, "message" => $html)); 
        
   }
    public function review_new_application(){
        $contact_id = $this->input->post('contact_id');
        $rev_note = $this->input->post('rev_note');
        $rev_type = $this->input->post('rev_type');
        if($rev_type==1){
            $data=array(
                'process_status'=>2,
                'notes'=>$rev_note
            );

            $data_application_status=array(
                'application_status'=> 2,
                'reg_review_date'=> date('Y-m-d H:i:s'),
                'reg_reviewer_note'=> $rev_note
            );
        }else{
            $data=array(
                'process_status'=>9,
                'notes'=>$rev_note
            );

            $data_application_status=array(
                'application_status'=> 9,
                'reg_review_date'=> date('Y-m-d H:i:s'),
                'reg_reviewer_note'=> $rev_note
            );
        }
        $this->Shows->updateThisValue($data, "en_contact",array('id'=>$contact_id));
        // Update Application Status
        $get_max_id = $this->Shows->get_max_id_from_application_status($contact_id);
        $this->Shows->updateThisValue($data_application_status, "application_status",array('id'=>$get_max_id));
        echo '2';
    }
    public function review_enothi(){
        $contact_id = $this->input->post('contact_id');
        $data=array(
            'status'=>6
        );
        $this->Shows->updateThisValue($data, "en_contact",array('id'=>$contact_id));
        echo '2';
    }
    public function inspection(){
        $contact_id = $this->input->post('contact_id');
        $data=array(
            'process_status'=>3
        );

        $application_status_data = array(
            'approche_insp_date' => date('Y-m-d H:i:s'), 
            'application_status' => 3
        );

        $this->Shows->updateThisValue($data, "en_contact",array('id'=>$contact_id));

        $get_max_id = $this->Shows->get_max_id_from_application_status($contact_id);
        $this->Shows->updateThisValue($application_status_data, "application_status",array('id'=>$get_max_id));
        echo '2';
    }

	function added()
    {
        $this->form_validation->set_rules('office_category_id', 'Office Category', 'trim|required|xss_clean');
        $this->form_validation->set_rules('designation_id', 'Designation', 'trim|required|xss_clean');
        $this->form_validation->set_rules('step_id', 'Step', 'trim|required|xss_clean');
		if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {
             $cat = $this->input->post('office_category_id');
			 $step = $this->input->post('step_id');
			 $deg = $this->input->post('designation_id');
			 $check = $this->Shows->getThisValue("office_category_id = '$cat' and step_id = '$step'","approval_step");
			 $check1 = $this->Shows->getThisValue("office_category_id = '$cat' and designation_id = '$deg'","approval_step");
             
			 if(count($check)){
				 echo json_encode(array("status" => "error", "message" => "Step Exists"));            
			 }
			 else if(count($check1)){
				 echo json_encode(array("status" => "error", "message" => "Designation Exists"));            
			 }
			 else{
					 $data = array(
						'office_category_id' => $this->input->post('office_category_id'),
						'designation_id' => $this->input->post('designation_id'),				
						'step_id' => $this->input->post('step_id'),                				
						'created_by' => $this->userId,
						'created_date' => date("Y-m-d")
					);
					$this->Shows->insertData($data, "approval_step");
					$this->toastr->success('Inserted Successfully!');
					echo json_encode(array("status" => "success", "message" => "Data save successfully"));  
			 }			

        }

    }
	
	public function edit($id,$count1)
    {

        $con = "id = '$id'";
		$data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "approval_step");       
        $this->load->view('admin/approval_step/edit', $data);
    }
	
	function update()
    {

        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            
          $this->form_validation->set_rules('office_category_id', 'Office Category', 'trim|required|xss_clean');
          $this->form_validation->set_rules('designation_id', 'Designation', 'trim|required|xss_clean');
          $this->form_validation->set_rules('step_id', 'Step', 'trim|required|xss_clean');
		   if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');
                  $cat = $this->input->post('office_category_id');
			 $step = $this->input->post('step_id');
			 $deg = $this->input->post('designation_id');
			 $check = $this->Shows->getThisValue("office_category_id = '$cat' and step_id = '$step' and id != '$id'","approval_step");
			 $check1 = $this->Shows->getThisValue("office_category_id = '$cat' and designation_id = '$deg' and id != '$id'","approval_step");
             
			 if(count($check)){
				 echo json_encode(array("status" => "error", "message" => "Step Exists"));            
			 }
			 else if(count($check1)){
				 echo json_encode(array("status" => "error", "message" => "Designation Exists"));            
			 }
               else{             
                    $data = array(
                      'office_category_id' => $this->input->post('office_category_id'),
                       'designation_id' => $this->input->post('designation_id'),				
                       'step_id' => $this->input->post('step_id'),     
				     );
                    $con = "id = '$id'";
                    $this->Shows->updateThisValue($data, "approval_step", $con);
                    $this->toastr->success('Updated Successfully!');
					echo json_encode(array("status" => "success","page_num"=>$page_num, "message" => "Data Updated Successfully"));
                 } 
             
            }

        }

    }
	
	function delete($id)
    {

        $con = "id = '$id'";
        $result = $this->Shows->deleteThisValue($con,"approval_step");       
       echo json_encode(array("status" => "success", "message" => "Data Active Successfully!"));
       

    }

//     public function preview_pdf($id=0){
//         $data['posts'] = $this->application_model->get_user_info_by_id($id);
//         if($data['posts']){
//             $id_business=$data['posts'][0]['id_business'];
//             $id_document=$data['posts'][0]['id_document'];
//             $data['document_additional'] = $this->application_model->getvalue_row('en_document_additional','*',array('document_id'=>$id_document));
//             $data['business_asset'] = $this->application_model->getvalue_row('en_business_asset','*',array('business_id'=>$id_business));
//             $data['business_capital'] = $this->application_model->getvalue_row('en_business_capital','*',array('business_id'=>$id_business));
//             $data['business_description'] = $this->application_model->getvalue_row('en_business_description','*',array('business_id'=>$id_business));
//         }
//         $html=$this->load->view('application/preview', $data, false);
//         //print_r($data['posts']);
//         //echo json_encode(array("status" => $status, "message" => $html)); 
        
//    }
    public function generatePreviewPdf($id=0){
        error_reporting('E_NONE');
        $this->load->library('mpdf/mpdf');
        $mpdf = new mPDF('', 'A4-P', 11, 'nikosh');
        $mpdf->showImageErrors = true;             
        $mpdf->AddPage('P');
        
        $data['posts'] = $this->application_model->get_user_info_by_id($id);
        $data['heading'] = $this->application_model->getvalue_row('master_report_heading','report_heading_name,report_heading_name_bn,address,address_bn,logo_url,right_logo',array());
        if($data['posts']){
            $id_business=$data['posts'][0]['id_business'];
            $id_document=$data['posts'][0]['id_document'];
            $data['document_additional'] = $this->application_model->getvalue_row('en_document_additional','*',array('document_id'=>$id_document));
            $data['business_asset'] = $this->application_model->getvalue_row('en_business_asset','*',array('business_id'=>$id_business));
            $data['business_capital'] = $this->application_model->getvalue_row('en_business_capital','*',array('business_id'=>$id_business));
            $data['business_description'] = $this->application_model->getvalue_row('en_business_description','*',array('business_id'=>$id_business));
            $data['business_raw_materials'] = $this->application_model->getvalue_row('en_business_raw_materials','*',array('business_id'=>$id_business));


            $data['en_business'] = $this->application_model->getvalue_row('en_business','*',array('id'=>$id_business));
            $data['machine_list_local'] = $this->application_model->getvalue_row('en_machineries_list','*',array('contact_id'=>$data['posts'][0]['id'], 'machine_type'=>1));
            $data['machineries_imported'] = $this->application_model->getvalue_row('en_machineries_list','*',array('contact_id'=>$data['posts'][0]['id'], 'machine_type'=>2));

            $data['enterpeneur_info'] = $this->application_model->getvalue_row('en_enterpeneurs','*',array('contact_id'=>$data['posts'][0]['id']));
            $data['management_employee'] = json_decode($data['en_business'][0]['management_employee']);
            $data['skilled_sem_skl_emp'] = json_decode($data['en_business'][0]['skilled_sem_skl_emp']);
            $data['unskilled_employee']  = json_decode($data['en_business'][0]['unskilled_employee']);
        }
        
        //user log submit
        $log_des="Application pdf download.";
        user_log($log_des,'admin/application/new');
        
        $html = $this->load->view('application/print_preview', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('Application_preview.pdf', 'D');
        exit;
    }

    public function retisterUserPdf(){
        error_reporting('E_NONE');
        $this->load->library('mpdf/mpdf');
        $mpdf = new mPDF('', 'A4-P', 11, 'nikosh');             
        $mpdf->AddPage('P');
 
        $pdf_conditions = $this->input->post('pdf_conditions');
        $conditions = array();
 
        if($pdf_conditions){
         $conditions = json_decode($pdf_conditions, true);
         unset($conditions["start"]);
         unset($conditions["limit"]);
        } 
        
         $data['posts'] =  $this->application_model->get_register_user_info($conditions);
         $html = $this->load->view('admin/application/users/user_list_pdf', $data, true);
         $mpdf->SetHtmlHeader('');
         $mpdf->WriteHTML($html);
         $mpdf->Output('user_list_pdf.pdf', 'D');
         exit;
    }


    public function change_password_submit($id=0,$new_pass){

        $new_pass = crypt($this->dx_auth->_encode($new_pass), '');
        $con = "id = '$id'";
        $data['password']=$new_pass;
        $this->Shows->updateThisValue($data, "users", $con);

            //user log submit
            $original_value = $this->db->query('Select username from users where id='.$id)->row();
            $log_des="(".text_format($original_value->username,30).")"." User password change.";
            user_log($log_des,'admin/users');
        
        $this->toastr->success('Updated Successfully!');
        echo json_encode(array("status" => "success","message" => "Data Updated Successfully"));

    }
    public function change_pass($id=0){


        $data['posts']=$this->application_model->getvalue_row('users','*',array('id'=>$id));
        $html=$this->load->view('application/users/change_password', $data, false);
    }
    



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
