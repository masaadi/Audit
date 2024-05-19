<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Employee_type_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('*');
        $this->db->from('employee_type');
          
        $this->db->order_by("employee_type.id", "desc");
		
		if (!empty($params['search']['type_name'])) {
           
           $this->db->WHERE('employee_type.type_name', $params['search']['type_name']);          
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
        return $this->db->query("select * from employee_type where id = " . $id)->result();
    }


}