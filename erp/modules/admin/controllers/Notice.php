<?php
include_once 'BaseController.php';

class Notice extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('master', $this->session->userdata('lang_file'));
        $this->load->model('admin/notice_model', 'D_model');
    }


    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#checkList';
        $config['base_url'] = base_url() . 'admin/notice/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "notice/index";
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
        $title = $this->input->post('title');      

        if (!empty($title)) {
            $conditions['search']['title'] = $title;
        }
        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#noticeList';
        $config['base_url'] = base_url() . 'admin/notice/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/notice/home', $data);

    }
	
	public function add()
    {
       
        $this->load->view('admin/notice/entry');

    }
	
	function added()
    {
        date_default_timezone_set ("Asia/Dhaka");

        $document_name = '';
        $user_document = $_FILES['document']['name'];
        if ($user_document != '') {
            $document_name = $this->now_upload('document', $user_document);
        }



        $this->form_validation->set_rules('notice_title', 'notice Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('notice_content', 'notice Content', 'trim|required|xss_clean');     

        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

           $data = array(
                'notice_title' => $this->input->post('notice_title'),    
                'notice_content' => $this->input->post('notice_content'),    
                'document' => $document_name,             
				'created_date' => date("Y-m-d H:i:s"),
                'status' => 1
            );
            $notice_id=$this->Shows->insertData($data, "notice");
           

            foreach($this->input->post('roles') as $key=>$val){

                $role_id=$this->input->post('roles')[$key];
                 $data_role=[
                    'role_id'=>$role_id,
                    'notice_id'=>$notice_id
                 ];
                 $this->Shows->insertData($data_role, "notice_user");
                $users= $this->D_model->get_user_by_role($role_id);
             
                foreach($users as $user){
                        $data_send_user = array(
                            'notice_id' => $notice_id,    
                            'user_id' => $user->id,               
                            'status' => 0,
                            'created_date' => date("Y-m-d")
                        );
                        $this->Shows->insertData($data_send_user, "notice_seen_unseen");
                    }
                }

                
            }


            //user log submit
            $log_des='('. text_format($this->input->post('notice_title'),30)  .')'. "  Notice created.";
            user_log($log_des,'admin/notice');


            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        

    }
	
	public function edit($id,$count1)
    {

        $con = "id = '$id'";
		$data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "notice");       
        $this->load->view('admin/notice/edit', $data);
    }

    public function see($id,$count1)
    {
		$data['count1'] = $count1;
        $data['array'] = $this->D_model->singlenotice($id); 
        $this->load->view('admin/notice/see', $data);
    }
	
	function update()
    {
        

        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            
            $this->form_validation->set_rules('notice_title', 'Post Title', 'trim|required|xss_clean');

            $this->form_validation->set_rules('notice_content', 'Post Content', 'trim|required|xss_clean');


           if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $document_name = '';
                $user_document = $_FILES['document']['name'];
                if ($user_document != '') {
                    $document_name = $this->now_upload('document', $user_document);
                }

                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');
                  
                if(empty($document_name)){
                     $data = array(
                        'notice_title' => $this->input->post('notice_title'),    
                        'notice_content' => $this->input->post('notice_content'),    
                    );
                }else{
                    $data = array(
                        'notice_title' => $this->input->post('notice_title'),    
                        'notice_content' => $this->input->post('notice_content'),    
                        'document' => $document_name,    
                    );
                }
                //user log submit
                $log_des='('. text_format($this->input->post('notice_title'),30)  .')'. "  Notice updated.";
                user_log($log_des,'admin/notice');

                $this->db->query("delete  from notice_user where notice_id = " . $id);
                $this->db->query("delete  from notice_seen_unseen where notice_id = " . $id);

                foreach($this->input->post('roles') as $key=>$val){

                    $data2=[
                       'role_id'=>$this->input->post('roles')[$key],
                       'notice_id'=>$id
                    ];
                   $this->Shows->insertData($data2, "notice_user");



                    $role_id=$this->input->post('roles')[$key];
                    $users= $this->D_model->get_user_by_role($role_id);
               
                    foreach($users as $user){
                          $data_send_user = array(
                              'notice_id' => $id,    
                              'user_id' => $user->id,               
                              'status' => 0,
                              'created_date' => date("Y-m-d")
                          );
                          $this->Shows->insertData($data_send_user, "notice_seen_unseen");
                      
                  }

                }


                
                $con = "id = '$id'";
                $this->Shows->updateThisValue($data, "notice", $con);
                 $this->toastr->success('Updated Successfully!');
				  echo json_encode(array("status" => "success","page_num"=>$page_num, "message" => "Data Updated Successfully"));             
            }

        }

    }
	
	function delete($id)
    {

        $con = "id = '$id'";
        $result = $this->Shows->deleteThisValue($con,"notice");       
       echo json_encode(array("status" => "success", "message" => "Data Active Successfully!"));
       

    }

    protected function now_upload($data, $file)
    {
        $nfile = explode(".", $file);
        $fileExt = array_pop($nfile);
        $file_name = date('d-m-Y') . '_' . time() . "." . $fileExt;
        $config['upload_path'] = './public/uploads/notice/';
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

    public function active_inactive($id,$count1)
    {
        $single_data=$this->db->query("select * from notice where id = " . $id)->result();

        if($single_data[0]->status==1){
            $status=0;
            $status_text='inactived';
        }else{
            $status=1;
            $status_text='actived';
        }
            $data = array(
                'status' => $status,    
            );
        $con = "id = '$id'";
        $this->Shows->updateThisValue($data, "notice", $con);

         //user log submit
         $original_value = $this->D_model->checkId($id);
         $log_des="(".text_format($original_value[0]->notice_title,30).")"." Notice ".$status_text.".";
         user_log($log_des,'admin/notice');

        echo json_encode(array("status" => "success","page_num"=>$count1, "message" => "Notice $status_text  Successfully"));

    }

    public function publish($id,$count1)
    {
        $single_data=$this->db->query("select * from notice where id = " . $id)->result();

            $status=1;
       
            $data = array(
                'publish_status' => $status,    
            );
        $con = "id = '$id'";


         //user log submit
         $original_value = $this->D_model->checkId($id);
         $log_des="(".text_format($original_value[0]->notice_title,30).")"." Notice publish.";
         user_log($log_des,'admin/notice');


        $this->Shows->updateThisValue($data, "notice", $con);
        echo json_encode(array("status" => "success","page_num"=>$count1, "message" => "Notice published  Successfully"));


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
