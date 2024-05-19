<?php
include_once 'BaseController.php';

class Change_password extends BaseController {
	// Used for registering and changing password form validation
	var $min_username = 4;
	var $max_username = 20;
	var $min_password = 4;
	var $max_password = 20;

	public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
       $this->lang->load('basic', $this->session->userdata('lang_file'));
       // $this->load->model('applicant/change_password_model', 'D_model');
    }



    public function index()
    {
		$this->data['dynamicView'] 	= 'applicant/change_password_form';
        $this->_commonPageLayout('viewer');
   }
   

	function change_password()
	{




		$val = $this->form_validation;
			// Set form validation
		$val->set_rules('old_password', 'Old Password', 'trim|required|xss_clean|min_length['.$this->min_password.']|max_length['.$this->max_password.']');
		$val->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->min_password.']|max_length['.$this->max_password.']|matches[confirm_new_password]');
		$val->set_rules('confirm_new_password', 'Confirm New Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {
			
			$old_password = $this->input->post("old_password");
			$new_password = $this->input->post("new_password");

			if($val->run() AND $this->dx_auth->change_password($old_password, $new_password))
			{
				echo json_encode(array("status" => "success", "message" => "Password successfully changed."));           
			}
			else
			{
                echo json_encode(array("status" => "error", "message" => "Your old password is incorrect."));           

			}
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
?>