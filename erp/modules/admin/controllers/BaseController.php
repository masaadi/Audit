<?php 
/**
 * Base Controller
 * Common tasks of all controllers are done here
 * Must be inherited, no direct instance allowed (abstract)   
*/

abstract class BaseController extends MX_Controller
{	
	protected $data     = array();
    public $office_category_id;
    public $office_id;

	function __construct()
	{
        parent::__construct();
        
		 $this->userId   =  $this->session->userdata('DX_user_id');
         $this->userName   = $this->session->userdata('DX_username');
         $this->lang->load('registration', $this->session->userdata('lang_file'));
		
		$this->siteTitle = 'BISCIC| ';
		$this->load->library('layout');
		$this->layout->setLayout('backend');
		$this->p_config = array();		
        $this->total_row = 30;

        $this->load->model('admin/user_model');
        $profile_info = $this->user_model->single_profile($this->userId);
        $user = $this->user_model->checkId($this->userId);
        if($profile_info){
            $this->office_category_id   =  $profile_info->office_category_id;
            $this->office_id   =  $profile_info->office_id;
        }
        if($user && $user[0]->role_id == 2 || $user[0]->role_id == 3){
            check_applicant('admin');
            check_applicant('inspector');
        }
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