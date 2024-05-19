<?php
include_once 'BaseController.php';

class Blog extends BaseController {

   public function __construct() {
        parent::__construct();
        $this->lang->load('default', $this->session->userdata('lang_file'));
        $this->load->model('blog_model', 'D_model');
    }
  

    public function blogs()
	{

        $config["base_url"] = base_url() . "blog/blogs";
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
		
	    $data['main_content'] = 'frontend/blog/blog';
        $this->load->view('frontend/master',$data);


	}




	

	public function paginate_data()
    {
        $conditions = array();
        $name = $this->input->post('div_name');      
        if (!empty($name)) {
            $conditions['search']['div_name'] = $name;
        }
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'blog/paginate_data';
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
      
        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('frontend/blog/posts', $data);

    }

	
	public function posts($id)
    {
        $data = $this->D_model->singleBlog($id);
		
        $data['data'] = $data;
	  $data['main_content'] = 'frontend/blog/post';
      $this->load->view('frontend/master',$data);
    }



}
