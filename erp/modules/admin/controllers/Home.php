<?php
include_once 'BaseController.php';

class Home extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('basic', $this->session->userdata('lang_file'));
        //$this->load->model('super/user_info_model', 'M_Model');
        $this->load->model('admin/dashboard_model', 'D_model');
    }



    public function index(){
            //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        $this->data['array'] = $this->D_model->total_application(array('user_id' => $this->userId, 'office_category_id' => $this->office_category_id, 'office_id' => $this->office_id));

        $this->data['complete_service'] = $this->db->select('COUNT(id) as total')->where('status','completed')->get('service_register')->row();

        $this->data['process_service'] = $this->db->select('COUNT(id) as total')->where('status','processing')->get('service_register')->row();

        $this->data['pending_service'] = $this->db->select('COUNT(id) as total')->where('status','pending')->get('service_register')->row();

        $this->data['total_emp'] = $this->db->select('COUNT(employee_id) as total')->get('job_info')->row();

        $this->data['total_company'] = $this->db->select('COUNT(id) as total')->where('status',1)->get('client')->row();

        $this->data['dynamicView'] = "admin/dashboard";
        $this->_commonPageLayout('viewer');
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
