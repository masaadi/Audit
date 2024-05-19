<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Family_info_model extends CI_Model
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

        $this->db->select('family_info.*,child_info.child_name,child_info.gender as child_gender,child_info.date_of_birth,personal_info.employee_name,sum(child_info.row_count) as total_child');
        $this->db->from('family_info');
        $this->db->join('child_info','child_info.employee_id = family_info.employee_id');
        $this->db->join('personal_info','personal_info.employee_id = family_info.employee_id','left');
        $this->db->where("family_info.employee_id", $employee_id);
        $this->db->order_by("family_info.id", "desc");  
        $this->db->group_by("child_info.employee_id");	
		
        if (!empty($params['search']['emp_id'])) {           
            $this->db->like('family_info.employee_id', $params['search']['emp_id']);
        }       

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function get_spouse_info($id){
        $this->db->select('family_info.*,personal_info.employee_name,personal_info.emp_photo,personal_info.email,personal_info.phone');
        $this->db->from('family_info');
        $this->db->join('personal_info','personal_info.employee_id = family_info.employee_id','left');
        $this->db->where('family_info.id',$id);
        return $this->db->get()->row();
    }

    public function get_child_info($employee_id){
        $this->db->select('*');
        $this->db->from('child_info');
        $this->db->where('child_info.employee_id',$employee_id);
        return $this->db->get()->result();
    }


}