<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Blog_model extends CI_Model
{

    protected $table='blog';
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }


    public function get_count() {
        return $this->db->count_all($this->table);
    }

    public function get_data($limit, $start) {

        $this->db->select('blog.*,blogtopic.topic_name,blogtopic.topic_name_bn');
        $this->db->from('blog');
        $this->db->join('blogtopic', 'blog.topic_id = blogtopic.id', 'left');

        $this->db->WHERE('blogtopic.status', 1);
        $this->db->WHERE('blog.status', 1);
        $this->db->order_by("blog.id", "desc");


       $query = $this->db->limit($limit, $start)->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }






    public function get_user_data($params = array()){

        $this->db->select('blog.*,blogtopic.topic_name,blogtopic.topic_name_bn');
        $this->db->from('blog');
        $this->db->join('blogtopic', 'blog.topic_id = blogtopic.id', 'left');
        $this->db->order_by("blog.id", "desc");
		
		if (!empty($params['search']['div_name'])) {
            $language = $this->session->userdata("lang_file");
           
            if($language =="bn"){
                $this->db->like('blog.post_title_bn', $params['search']['div_name']);
            }else{
                $this->db->like('blog.post_title', $params['search']['div_name']);
            }
        }
        $this->db->WHERE('blogtopic.status', 1);

        $this->db->WHERE('blog.status', 1);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result() : FALSE;
    }


   
    public function singleBlog($id)
    {
        $this->db->select('blog.*,blogtopic.topic_name,blogtopic.topic_name_bn,users.username,users.full_name,users.full_name_bn');
        $this->db->from('blog');
        $this->db->join('blogtopic', 'blog.topic_id = blogtopic.id', 'left');
        $this->db->join('users', 'blog.created_by = users.id', 'left');
        $this->db->WHERE('blog.id', $id);

        return $this->db->get()->result();
    }

   
	
	
	public function checkId($id)
    {
        return $this->db->query("select * from blog where id = " . $id)->result();
    }


}