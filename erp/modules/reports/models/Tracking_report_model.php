<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Tracking_report_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
        $user_id = $this->session->userdata('DX_user_id');

        $this->db->select('service_register.*,service_type.service_type,personal_info.employee_name');
        $this->db->from('service_register');
        $this->db->join('personal_info','personal_info.employee_id = service_register.employee_id','left');
        $this->db->join('service_type','service_type.id = service_register.service_type_id','left');
        $this->db->order_by("service_register.id", "desc");
        
        if (!empty($params['search']['service_type'])) {           
            $this->db->where('service_register.service_type_id', $params['search']['service_type']);
        }
        if (!empty($params['search']['reg_no'])) {           
            $this->db->where('service_register.registration_id', $params['search']['reg_no']);
        }
        if (!empty($params['search']['status'])) {           
            $this->db->where('service_register.status', $params['search']['status']);
        }
        
        if ((!empty($params['search']['start_date'])) && (!empty($params['search']['end_date']))) {           
            $this->db->where('service_register.created_date >=', $params['search']['start_date']);
            $this->db->where('service_register.created_date <=', $params['search']['end_date']);
        }
        elseif (!empty($params['search']['start_date'])) {           
            $this->db->where('service_register.created_date', $params['search']['start_date']);
        }
       

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function get_user_data_two($params = array()){
        $user_id = $this->session->userdata('DX_user_id');

        $this->db->select('approval_steps.created_date,personal_info.employee_name,service_register.registration_id');

        $this->db->from('approval_steps');
        $this->db->join('personal_info','personal_info.employee_id = approval_steps.employee_id','left');
        $this->db->join('service_register','service_register.id = approval_steps.service_id','left');
        $this->db->join('service_type','service_type.id = service_register.service_type_id','left');
        $this->db->where("approval_steps.status", "0");
        // $this->db->order_by("approval_steps.id", "desc");
        
        if (!empty($params['search']['service_type'])) {           
            $this->db->where('service_register.service_type_id', $params['search']['service_type']);
        }
        if (!empty($params['search']['reg_no'])) {           
            $this->db->where('service_register.registration_id', $params['search']['reg_no']);
        }
        
        if ((!empty($params['search']['start_date'])) && (!empty($params['search']['end_date']))) {           
            $this->db->where('service_register.created_date >=', $params['search']['start_date']);
            $this->db->where('service_register.created_date <=', $params['search']['end_date']);
        }
        elseif (!empty($params['search']['start_date'])) {           
            $this->db->where('service_register.created_date', $params['search']['start_date']);
        }
       

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function get_service_data ($params = array()) {

        $this->db->select('service_register.id,service_register.registration_id,service_register.status,service_register.created_date,service_type.service_type,personal_info.employee_name');
        $this->db->from('service_register');
        $this->db->join('personal_info','personal_info.employee_id = service_register.employee_id','left');
        $this->db->join('service_type','service_type.id = service_register.service_type_id','left');
        $this->db->order_by("service_register.id", "desc");
        
        if (!empty($params['search']['service_type'])) {           
            $this->db->where('service_register.service_type_id', $params['search']['service_type']);
        }
        if (!empty($params['search']['reg_no'])) {           
            $this->db->where('service_register.registration_id', $params['search']['reg_no']);
        }
        if (!empty($params['search']['status'])) {           
            $this->db->where('service_register.status', $params['search']['status']);
        }
        
        if ((!empty($params['search']['start_date'])) && (!empty($params['search']['end_date']))) {           
            $this->db->where('service_register.created_date >=', $params['search']['start_date']);
            $this->db->where('service_register.created_date <=', $params['search']['end_date']);
        }
        elseif (!empty($params['search']['start_date'])) {           
            $this->db->where('service_register.created_date', $params['search']['start_date']);
        }
       

        return $this->db->get()->result();
    }


}