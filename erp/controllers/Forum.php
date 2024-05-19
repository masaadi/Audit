<?php
include_once 'BaseController.php';

class Forum extends BaseController {

   public function __construct() {
        parent::__construct();
        $this->lang->load('default', $this->session->userdata('lang_file'));
        $this->load->model('forum_model', 'D_model');
        $this->load->helper("url"); 
        $this->load->library('pagination');

    }
  

	public function forums()
	{

        $config["base_url"] = base_url() . "forum/forums";
        $config["total_rows"] = $this->D_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);

        

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item disabled">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';
        $config['attributes'] = array('class' => 'page-link');







        $this->pagination->initialize($config);
    
        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
        $data["results"] = $this->D_model
            ->get_data($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $data['wings'] = $this->D_model->get_data($config["per_page"], $page);
		
        $data['main_content'] = 'frontend/forum/forum_page';
        $this->load->view('frontend/master',$data);


	}

    
    public function paginate_data()
    {
        $conditions = array();
      
        $name = $this->input->post('div_name');      

        
        if (!empty($name)) {
            $conditions['search']['div_name'] = $name;
        }

        //pagination configuration
        $config['target'] = '#forumList';
        $config['base_url'] = base_url() . 'forum/paginate_data';
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

      
        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('frontend/forum/forums', $data);

    }


	
	public function post($id)
    { 
     $data = $this->D_model->singleforum($id);


     $now_view= $data[0]->views+1;
     
     $con= 'id='.$id;
     $updateData['views']=$now_view;
     $this->Shows->updateThisValue($updateData,'forum',$con);

    
      $data['data'] = $data;
	  $data['main_content'] = 'frontend/forum/forum';
      $this->load->view('frontend/master',$data);
    }

    public function create()
    { 
        return $this->load->view('frontend/forum/entry');
    }
    function added()
    {
        // echo "<pre>";
        // print_r($_FILES);
        // print_r($_POST);
        // echo "</pre>";
        // die();

       



        $this->form_validation->set_rules('post_title', 'Post Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('post_content', 'Post Content', 'trim|required|xss_clean');

        

        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $data = array(
                'post_title' => $this->input->post('post_title'),    
                'post_title_bn' => $this->input->post('post_title_bn'),
                'post_content' => $this->input->post('post_content'),    
                'post_content_bn' => $this->input->post('post_content_bn'),
                'post_datetime' => date("F, d, Y h:i:s a"),    
                'created_by' => $this->userId,
				'created_date' => date("Y-m-d"),
                'status' => 0
            );
            $this->Shows->insertData($data, "forum");
            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }

    }
	






    public function comment()
    {
        if($_POST){
            $this->form_validation->set_rules('comment', 'Comment', 'trim|required|xss_clean');
        }



        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $comment=$this->input->post('comment');
            $post_id=$this->input->post('post_id');
           
              
           
            $data = array(
                'post_id' => $post_id,    
                'comment' => $comment,
                'reply_id' => '',
                'datetime' => date("Y-m-d , h:i:s a"),    
                'created_by' => $this->userId,
				'created_date' => date("Y-m-d"),
                'status' => 1   
            );
            
           
            $this->Shows->insertData($data, "forum_comment");

            $post['post_id']=$post_id;
            return $this->load->view('frontend/forum/comments',$post);
         
        }

       
    }
    public function reply()
    {
       

            $comment=$this->input->post('comment');
            $post_id=$this->input->post('post_id');
            $reply_id=$this->input->post('reply_id');
           
              
           
            $data = array(
                'comment' => $comment,
                'reply_id' => $reply_id,
                'datetime' => date("Y-m-d , h:i:s a"),    
                'created_by' =>$this->userId,
				'created_date' => date("Y-m-d"),
                'status' => 1  ,
                'post_id' => $post_id,    

            );
            
           
            $this->Shows->insertData($data, "forum_comment");
            echo json_encode(array("status" => "success", "message" => "Comment Successfully"));
         
        

       
    }

}
