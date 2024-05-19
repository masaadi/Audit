<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Service_request_model extends CI_Model
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

        $this->db->select('service_register.*,service_type.service_type,personal_info.employee_name,approval_steps.id as step_id');
        $this->db->from('users');
        $this->db->join('approval_steps','approval_steps.employee_id = users.employee_id','left');
        $this->db->join('service_register','service_register.id = approval_steps.service_id','left');
        $this->db->join('personal_info','personal_info.employee_id = service_register.employee_id','left');
        $this->db->join('service_type','service_type.id = service_register.service_type_id','left');


        $this->db->order_by("service_register.id", "desc");
        $this->db->group_by("service_register.id");
        $this->db->where("approval_steps.employee_id",$employee_id);
        $this->db->where("approval_steps.status",0);
		
		if (!empty($params['search']['emp_id'])) {           
            $this->db->like('service_register.employee_id', $params['search']['emp_id']);
        }
        if (!empty($params['search']['regi_no'])) {           
            $this->db->like('service_register.registration_id', $params['search']['regi_no']);
        }
        if (!empty($params['search']['service_type'])) {           
            $this->db->like('service_register.service_type_id', $params['search']['service_type']);
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