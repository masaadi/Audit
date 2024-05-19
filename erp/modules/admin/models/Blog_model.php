<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Blog_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

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
		
       

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


   
    public function singleBlog($id)
    {
        $this->db->select('blog.*,blogtopic.topic_name,blogtopic.topic_name_bn');
        $this->db->from('blog');
        $this->db->join('blogtopic', 'blog.topic_id = blogtopic.id', 'left');
        $this->db->WHERE('blog.id', $id);

        return $this->db->get()->result();
    }

    public function get_contact($office_id, $office_category_id){
        $this->db->select('office.*,office_category.office_category_name,
        office_category.office_category_name_bn, region_wise_office.region_id, 
        district.district_name, district.district_name_bn');
        $this->db->from('office');
        $this->db->join('office_category', 'office.office_category_id = office_category.id', 'left');  
        $this->db->join('region_wise_office', 'region_wise_office.office_id = office.id', 'left');  
        $this->db->join('district', 'district.id = office.district_id', 'left');  
        $this->db->where('office.office_category_id', $office_category_id);
        $this->db->where('office.id', $office_id);
        
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result() : FALSE;
    }

   
	
	
	public function checkId($id)
    {
        return $this->db->query("select * from blog where id = " . $id)->result();
    }


}