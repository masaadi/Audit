<?php
include_once 'BaseController.php';

class Language extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }
	
	public function seturi()
    {
       
		$module_id = $this->input->post('module_id');
        $sub_module_id = $this->input->post('sub_module_id');
        $menu_id = $this->input->post('menu_id');

        $data = array(
            'USER_ID'=>$this->userId,
            'MODULE_ID'=>$module_id,
            'SUB_MODULE_ID'=>$sub_module_id,
            'MENU_ID'=>$menu_id
         );
		$this->Shows->deleteThisValue("USER_ID = '$this->userId'","MENU_SELECTION");
        $this->Shows->insertData($data,"MENU_SELECTION");
       // $this->session->set_userdata('module_id', $module_id);
       // $this->session->set_userdata('sub_module_id', $sub_module_id);
        //$this->session->set_userdata('menu_id', $menu_id);
    }

    public function pppseturi()
    {
        // $this->session->unset_userdata('module_id');
        //$this->session->unset_userdata('sub_module_id');
        //$this->session->unset_userdata('menu_id');
	   
		$module_id = $this->input->post('module_id');
        $sub_module_id = $this->input->post('sub_module_id');
        $menu_id = $this->input->post('menu_id');

        
        $this->session->set_userdata('module_id', $module_id);
        $this->session->set_userdata('sub_module_id', $sub_module_id);
        $this->session->set_userdata('menu_id', $menu_id);
    }
	

    public function unseturi()
    {
        $this->session->unset_userdata('module_id');
        $this->session->unset_userdata('sub_module_id');
        $this->session->unset_userdata('menu_id');
    }


    public function set($id)
    {

        if ($id == "bn") {
            $this->session->set_userdata('lang', 'bn');
            $this->session->set_userdata('lang_file', 'bn');
        }
        if ($id == "en") {
            $this->session->set_userdata('lang', 'en');
            $this->session->set_userdata('lang_file', 'english');
        }

        redirect($_SERVER['HTTP_REFERER']);

    }
}