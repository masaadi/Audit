<?php
include_once 'BaseController.php';

class User_log extends BaseController
{
    public function __construct()
    {
       parent::__construct();
       // $this->dx_auth->check_uri_permissions();
       if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
       $this->lang->load('master', $this->session->userdata('lang_file'));
       $this->lang->load('config', $this->session->userdata('lang_file'));
       $this->load->model('admin/user_log_model', 'U_model');
    }

    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->U_model->get_user_data(array('user_id' => $this->userId, 'office_category_id' => $this->office_category_id, 'office_id' => $this->office_id)));
        $config['target'] = '#user_logList';
        $config['base_url'] = base_url() . 'admin/user_log/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->U_model->get_user_data(array('user_id' => $this->userId, 'office_category_id' => $this->office_category_id, 'office_id' => $this->office_id,'limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "user_log/index";
        $this->_commonPageLayout('viewer');
     
   }
   
   public function paginate_data()
    {
        $conditions = array();
        //calc offset number
        $page = $this->input->post('page');

        if (!$page) {
            $offset = 0;
            $data['loop_start'] = 0;
			 $data['count1'] = 0;
        } else {
            $offset = $page;
            $data['loop_start'] = $page;
			$data['count1'] = $page ;
        }



        $username = $this->input->post('username');      
        $from_date = $this->input->post('from_date');      
        $to_date = $this->input->post('to_date');      
        $url = $this->input->post('url');      
        $ip_address = $this->input->post('ip_address');      
        $office_id = $this->input->post('office_id');      
        $office_category_id = $this->input->post('office_category_id');      

        if (!empty($username)) {
            $conditions['search']['username'] = $username;
        }

        if (!empty($from_date)) {
            $conditions['search']['from_date'] = $from_date;
        }

        if (!empty($to_date)) {
            $conditions['search']['to_date'] = $to_date;
        }
        if (!empty($ip_address)) {
            $conditions['search']['ip_address'] = $ip_address;
        }
        if (!empty($url)){
            $conditions['search']['url'] = $url;
        }
        if (!empty($office_category_id)){
            $conditions['search']['office_category_id'] = $office_category_id;
        }
        if (!empty($office_id)){
            $conditions['search']['office_id'] = $office_id;
        }
       
        $totalRec = @count($this->U_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#user_logList';
        $config['base_url'] = base_url() . 'admin/user_log/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->U_model->get_user_data($conditions);
        $this->load->view('admin/user_log/home', $data);

    }
	
	
	
	function delete($id,$action)
    {

       //  $con = "id = '$id'";
       //  $result = $this->Shows->deleteThisValue($con,"user_log");       
       // echo json_encode(array("status" => "success", "message" => "Data Active Successfully!"));
        $message = "Data Active Successfully!";
        $con = "id = '$id'";
        if($action==2){
            $data = array(
                'status' => 0                 
            );
        $message = "Data Inactive Successfully!";
        }
        elseif($action==1){
            $data = array(
                'status' => 1                
            );
        }
        $result = $this->Shows->updateThisValue($data, "users_log", $con);
        echo json_encode(array("status" => "success", "message" => $message));
       

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
