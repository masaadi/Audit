<?php
include_once 'BaseController.php';

class Review extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
       $this->lang->load('review', $this->session->userdata('lang_file'));
       $this->lang->load('config', $this->session->userdata('lang_file'));
       $this->lang->load('master', $this->session->userdata('lang_file'));
       $this->load->model('admin/review_model', 'D_model');
    }


    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#reviewList';
        $config['base_url'] = base_url() . 'admin/review/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "review/index";
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
        $name = $this->input->post('div_name');      

        if (!empty($name)) {
            $conditions['search']['div_name'] = $name;
        }
        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#reviewList';
        $config['base_url'] = base_url() . 'admin/review/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/review/home', $data);

    }
	
	
    public function activeInactive($id,$count1)
    {
        $single_data=$this->db->query("select * from review where id = " . $id)->result();
        if($single_data[0]->status==1){
            $status=0;
            $message='inactive';
        }else{
            $status=1;
            $message='active';
        }
            $data = array(
                'status' => $status,    
            );
        $con = "id = '$id'";
        $this->Shows->updateThisValue($data, "review", $con);

        $log_des="(".$single_data[0]->review_content.")"." Review ".$message.".";
        user_log($log_des,'admin/review');

        echo json_encode(array("status" => "success","page_num"=>$count1, "message" => "Review $message  Successfully"));

    }

    public function see($id,$count1)
    {
		$data['count1'] = $count1;
        $data['array'] = $this->D_model->singlereview($id); 
        $this->load->view('admin/review/see', $data);
    }

	public function feedback($id,$count1)
    {

		$data['id'] = $id;
		$data['count1'] = $count1;
        $this->load->view('admin/review/feedback', $data);
    }


    function feedbackSave()
    {

        $this->form_validation->set_rules('reply', 'Reply', 'trim|required');
          if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $data = array(
                'feedback_message' => $this->input->post('reply'),    
                'review_id' =>$this->input->post('id'),    
				'user_id' => $this->userId,
				'status' => 1,
				'created_date' => date("Y-m-d")
            );

            $this->Shows->insertData($data, "review_feedback");

           //user log submit
           $log_des='('. text_format($this->input->post('reply'),30)  .')'. " . Feedback send.";
           user_log($log_des,'admin/review');


            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }

    }
	
	
	
	function delete($id)
    {

        $con = "id = '$id'";
        $result = $this->Shows->deleteThisValue($con,"review");       
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
