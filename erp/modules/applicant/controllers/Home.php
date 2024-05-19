<?php
include_once 'BaseController.php';

class Home extends BaseController
{
    public function User_info()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('basic', $this->session->userdata('lang_file'));
    }



    public function index()
    {   
        $this->data['main_menu'] = "dashboard";
        $this->data['sub_menu'] = "";
        $this->data['dynamicView'] = "dashboard";
        $this->_commonPageLayout('viewer');
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
