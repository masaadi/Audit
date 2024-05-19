<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Training_info_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
        $user_id = $this->session->userdata('DX_user_id');

        $this->db->select('training_info.*,personal_info.employee_name');
        $this->db->from('training_info');
        $this->db->join('personal_info','personal_info.employee_id = training_info.employee_id');
        $this->db->order_by("training_info.id", "desc");
		
        if (!empty($params['search']['emp_id'])) {           
            $this->db->like('training_info.employee_id', $params['search']['emp_id']);
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
        return $this->db->query("select * from blog where id = " . $id)->result();
    }


}