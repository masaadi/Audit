<?php 
/**
 * Base Controller
 * Common tasks of all controllers are done here
 * Must be inherited, no direct instance allowed (abstract)   
*/
abstract class BaseController extends CI_Controller
{	
	protected $data     = array();
	public $module_id;
	public $sub_module_id;
	public $menu_id;

	function __construct()
	{
		parent::__construct();
		
		$this->siteTitle = 'Department of Telecommunication';
		$this->load->library('layout');
		$this->layout->setLayout('backend');
		$this->p_config = array(); 
		$this->_setupFirePHP();
		$this->total_row = 3;




		//$this->tokenNo   =  $this->session->userdata('DX_token_no');
		$this->userId   =  $this->session->userdata('DX_user_id');
		$this->userName   = $this->session->userdata('DX_username');
		//$this->office_id =$this->session->userdata('DX_office_id'); 
		//$this->wing_id = $this->session->userdata('DX_wing_id'); 
		//$this->division_head = $this->session->userdata('DX_division_head');
		//$this->office_head = $this->session->userdata('DX_office_head'); 
		//$this->pay_fixation_id = $this->session->userdata('DX_pay_fixation_id');
		//$this->e_role_id = $this->Shows->getNameById("EMPLOYEE_ID = '$this->userName' ","ADD_ROLE_EMPLOYEE_ASSIGN","ROLE_ID");
		
		/* $this->company_name = "";
		$this->company_name_bn = "";
		$array_2 = $this->Shows->getThisValue("","MASTER_COMPANY");
		if(count($array_2)) {
			$this->company_name = $array_2[0]->COMPANY_NAME;
			$this->company_name_bn = $array_2[0]->COMPANY_NAME_BN;            
		}	  */
		
	
		
		
		
		/* $language = $this->session->userdata('lang_file');
		if ($language == "bn"){
			$this->menu_title = $menu_title_bn;
		}
		else{
			$this->menu_title = $menu_title;
			
		} */
		
		date_default_timezone_set('Asia/Dhaka');

	}
	
	
	
	protected function _setupFirePHP()
	{
		$this->load->config('fireignition');
		if ($this->config->item('fireignition_enabled'))
		{
			if (floor(phpversion()) < 7)
			{
				log_message('error', 'PHP 5 is required to run fireignition');
			} else {
				//$this->load->library('firephp');
			}
		}
		else 
		{
			$this->load->library('firephp_fake');
			$this->firephp =& $this->firephp_fake;
		}
	}
}