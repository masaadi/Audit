<?php 
/**
 * Base Controller
 * Common tasks of all controllers are done here
 * Must be inherited, no direct instance allowed (abstract)   
*/

abstract class BaseController extends MX_Controller
{	
	protected $data     = array();

	function __construct()
	{
		parent::__construct();
		
		 $this->userId   =  $this->session->userdata('DX_user_id');
         $this->userName   = $this->session->userdata('DX_username');
         if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
       	$this->lang->load('basic', $this->session->userdata('lang_file'));
       	$this->lang->load('registration', $this->session->userdata('lang_file'));
       	//$this->load->model('applicant/registration_model', 'reg_model');
		
		
		
		
		$this->siteTitle = 'BISCIC| ';
		$this->load->library('layout');
		$this->layout->setLayout('backend');
		$this->p_config = array();		
        $this->total_row = 10;
		       
		
		
		
		
	}
	
	
    protected function _setupFirePHP()
    {
        $this->load->config('fireignition');
        if ($this->config->item('fireignition_enabled'))
        {
            if (floor(phpversion()) < 5)
            {
                log_message('error', 'PHP 5 is required to run fireignition');
            } else {
                $this->load->library('firephp');
            }
        }
        else 
        {
            $this->load->library('firephp_fake');
            $this->firephp =& $this->firephp_fake;
        }
    }
}