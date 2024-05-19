<?php
include_once 'BaseController.php';

class Forum extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
       $this->lang->load('infoservice', $this->session->userdata('lang_file'));
       $this->lang->load('basic', $this->session->userdata('lang_file'));
       $this->load->model('admin/forum_model', 'D_model');
    }


    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#forumList';
        $config['base_url'] = base_url() . 'admin/forum/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "forum/index";
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
        $config['target'] = '#forumList';
        $config['base_url'] = base_url() . 'admin/forum/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/forum/home', $data);

    }
	
	public function add()
    {
       
        $this->load->view('admin/forum/entry');

    }
    
    
	public function activeInactive($id,$count1)
    {
       
        $single_data=$this->db->query("select * from forum where id = " . $id)->result();

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
        $this->Shows->updateThisValue($data, "forum", $con);
        //user log submit
        $log_des='('. text_format($single_data[0]->post_title,30)  .')'. "  Forum $message";
        user_log($log_des,'admin/forum');

        echo json_encode(array("status" => "success","page_num"=>$count1, "message" => "Forum $message  Successfully"));

    }
    
    
	function added()
    {
        // echo "<pre>";
        // print_r($_FILES);
        // print_r($_POST);
        // echo "</pre>";
        // die();

        $post_img_name = '';
        $user_post_img = $_FILES['post_img']['name'];
        if ($user_post_img != '') {
            $post_img_name = $this->now_upload('post_img', $user_post_img);
        }



        $this->form_validation->set_rules('post_title', 'Post Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('post_title_bn', 'Post Title (Bangla)', 'trim|required|xss_clean');
        $this->form_validation->set_rules('post_content', 'Post Content', 'trim|required|xss_clean');
        $this->form_validation->set_rules('post_content_bn', 'Post Content (Bangla)', 'trim|required|xss_clean');

        

        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $data = array(
                'post_title' => $this->input->post('post_title'),    
                'post_title_bn' => $this->input->post('post_title_bn'),
                'post_content' => $this->input->post('post_content'),    
                'post_content_bn' => $this->input->post('post_content_bn'),
                'post_datetime' => date("F, d Y h:i:s a"),    
                'post_img' => $post_img_name,               
                'created_by' => $this->userId,
				'created_date' => date("Y-m-d"),
                'status' => 1
            );
            $this->Shows->insertData($data, "forum");
            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }

    }
	
	public function edit($id,$count1)
    {

        $con = "id = '$id'";
		$data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "forum");       
        $this->load->view('admin/forum/edit', $data);
    }

    public function see($id,$count1)
    {

        $con = "id = '$id'";
        $data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "forum");       
        $this->load->view('admin/forum/see', $data);
    }
	
	function update()
    {



        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            $original_value = $this->D_model->checkId($id);
            
            $this->form_validation->set_rules('post_title', 'Post Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('post_title_bn', 'Post Title (Bangla)', 'trim|required|xss_clean');

            $this->form_validation->set_rules('post_content', 'Post Content', 'trim|required|xss_clean');
            $this->form_validation->set_rules('post_content_bn', 'Post Content (Bangla)', 'trim|required|xss_clean');


           if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $post_img_name = '';
                $user_post_img = $_FILES['post_img']['name'];
                if ($user_post_img != '') {
                    $post_img_name = $this->now_upload('post_img', $user_post_img);
                }

                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');
                  
                if(empty($post_img_name)){
                     $data = array(
                        'post_title' => $this->input->post('post_title'),    
                        'post_title_bn' => $this->input->post('post_title_bn'),
                        'post_content' => $this->input->post('post_content'),    
                        'post_content_bn' => $this->input->post('post_content_bn'),
                    );
                }else{
                    $data = array(
                        'post_title' => $this->input->post('post_title'),    
                        'post_title_bn' => $this->input->post('post_title_bn'),
                        'post_content' => $this->input->post('post_content'),    
                        'post_content_bn' => $this->input->post('post_content_bn'),
                        'post_img' => $post_img_name,    
                    );
                }
               

                $con = "id = '$id'";
                $this->Shows->updateThisValue($data, "forum", $con);
                 $this->toastr->success('Updated Successfully!');
				  echo json_encode(array("status" => "success","page_num"=>$page_num, "message" => "Data Updated Successfully"));
               // echo json_encode(array("status" => "success", "message" => "Data Updated Successfully"));
             
            }

        }

    }
	
	function delete($id)
    {

        $con = "id = '$id'";
        $result = $this->Shows->deleteThisValue($con,"forum");       
       echo json_encode(array("status" => "success", "message" => "Data Active Successfully!"));
       

    }

    protected function now_upload($data, $file)
    {
        $nfile = explode(".", $file);
        $fileExt = array_pop($nfile);
        $file_name = date('d-m-Y') . '_' . time() . "." . $fileExt;
        $config['upload_path'] = './public/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_size'] = 100000;
        $config['max_width'] = 102400;
        $config['max_height'] = 100000;
        $config['encrypt_name'] = true;
        $config['file_name'] = $file_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($data)) {
            return $this->upload->display_errors();
        } else {
            return $recipe_file = $this->upload->data('file_name');
            // $file = $config['file_name'];
            // return $file;
        }
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
