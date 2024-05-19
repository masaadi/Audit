<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Personal_info_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
        $user_id = $this->session->userdata('DX_user_id');
        $user_info = $this->db->select('users.employee_id')->where('users.id',$user_id)->get('users')->row();
        $employee_id = $user_info->employee_id;

        $this->db->select('personal_info.*');
        $this->db->from('personal_info');
        $this->db->where("personal_info.employee_id", $employee_id);
        $this->db->order_by("personal_info.id", "desc");
		
		if (!empty($params['search']['emp_name'])) {           
            $this->db->like('personal_info.employee_name', $params['search']['emp_name']);
        }
        if (!empty($params['search']['emp_id'])) {           
            $this->db->like('personal_info.employee_id', $params['search']['emp_id']);
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

   
	
	
	public function checkId($id)
    {
        return $this->db->query("select * from blog where id = " . $id)->result();
    }


}