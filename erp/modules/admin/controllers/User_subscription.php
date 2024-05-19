<?php
include_once 'BaseController.php';

class User_subscription extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
       $this->lang->load('master', $this->session->userdata('lang_file'));
        $this->load->model('admin/user_subscription_model', 'S_model');
    }



    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->S_model->get_subscription_data());
        $config['target'] = '#subscriptionlist';
        $config['base_url'] = base_url() . 'admin/user_subscription/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->S_model->get_subscription_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "user_subscription/index";
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
        $name = $this->input->post('subscriber_name');      
        $email = $this->input->post('subscriber_email');      

        if (!empty($name)) {
            $conditions['search']['subscriber_name'] = $name;
        }

        if (!empty($email)) {
            $conditions['search']['subscriber_email'] = $email;
        }

        $totalRec = @count($this->S_model->get_subscription_data($conditions));

        //pagination configuration
        $config['target'] = '#subscriptionlist';
        $config['base_url'] = base_url() . 'admin/user_subscription/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->S_model->get_subscription_data($conditions);
        $this->load->view('admin/user_subscription/home', $data);

    }
	


	

	
	function delete($id)
    {

        $con = "id = '$id'";

        //user log submit
        $original_value = $this->S_model->checkId($id);
        $log_des="(".$original_value[0]->subscriber_name.")"." Newletter deleted.";
        user_log($log_des,'admin/user_subscription');


        $result = $this->Shows->deleteThisValue($con,"newslatter");       
       echo json_encode(array("status" => "success", "message" => "Data Active Successfully!"));
       

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
