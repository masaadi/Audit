<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Module_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('*');
        $this->db->from('module');
          
        $this->db->order_by("module.id", "desc");
		
		if (!empty($params['search']['mod_name'])) {
                $name = strtolower($params['search']['mod_name']);
                $this->db->like('LOWER(module.module_name)', $name);

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
        return $this->db->query("select * from module where id = " . $id)->result();
    }


}