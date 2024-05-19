<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Qualification_info_model extends CI_Model
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

        $this->db->select('qualification_info.*,personal_info.employee_name');
        $this->db->from('qualification_info');
        $this->db->join('personal_info','personal_info.employee_id = qualification_info.employee_id');
        $this->db->where("qualification_info.employee_id", $employee_id);
        $this->db->order_by("qualification_info.id", "desc");  
        $this->db->group_by("qualification_info.employee_id");  
		
        if (!empty($params['search']['emp_id'])) {           
            $this->db->like('qualification_info.employee_id', $params['search']['emp_id']);
        }       

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    


}