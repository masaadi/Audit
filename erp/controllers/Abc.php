<?php
include_once 'BaseController.php';

class Abc extends BaseController {


   public function Abc()
    {
        parent::__construct();
        
        $this->load->model('abc_model', 'a_model');
        
    }

	public function index(){

    $this->load->view('user_view');
 
  }

  // Call this method from AngularJS $http request
  public function getUsers(){
    // get data
    $data = $this->a_model->getRecords();
	//echo "<pre>";print_r($data);die();
    echo json_encode($data);
  }
	
	
}
