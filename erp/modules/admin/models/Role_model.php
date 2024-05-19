<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Role_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('roles.*');
        $this->db->from('roles');
        //$this->db->join('office_category_wise_roles', 'office_category_wise_roles.id = roles.parent_id');
        $this->db->order_by("roles.id", "desc");
		
        // if (!empty($params['search']['s_parent_id'])) {
        //     $this->db->like('roles.parent_id', $params['search']['s_parent_id']);
        // }

		if (!empty($params['search']['r_name'])) {
            $r_name = strtolower($params['search']['r_name']);
            $this->db->like('LOWER(roles.name)', $r_name);
            $this->db->or_like('LOWER(roles.name_bn)', $r_name);
        }
		
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


   

   
	
	
	public function checkId($id)
    {
        return $this->db->query("select * from menu where id = " . $id)->result();
    }


}