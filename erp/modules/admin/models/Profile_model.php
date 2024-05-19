<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Profile_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){

        $this->db->select('users.*,office.office_name,designation.designation_name,');
        $this->db->from('users');
        $this->db->join('office', 'users.office_id=office.id','left');
        $this->db->join('designation', 'users.designation_id=designation.id','left');
          
        $this->db->order_by("users.id", "desc");
        $this->db->WHERE('users.user_type', 1);
		
		if (!empty($params['search']['div_name'])) {
            $this->db->like('users.full_name', $params['search']['div_name']);
        }

        
        if (!empty($params['search']['designation_id'])) {
           
            $this->db->like('users.designation_id', $params['search']['designation_id']);
        }
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


   
    public function single_profile($id){

        $this->db->select('users.*,office.office_name,designation.designation_name');
        $this->db->from('users');
        $this->db->join('office', 'users.office_id=office.id','left');
        $this->db->join('designation', 'users.designation_id=designation.id','left');
        $this->db->WHERE('users.id', $id);        
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result() : FALSE;
    }
   
	
	
	public function checkId($id)
    {
        $this->db->select('users.*');
        $this->db->from('users');
        $this->db->WHERE('users.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user($id)
    {
        return $this->db->query("select * from users where id = " . $id)->result();
    }

    public function get_latest_user_name_id($role_id)
    {
        $this->db->from('users');
        $this->db->where('role_id', $role_id);
        $this->db->order_by("id", "desc");

        $query = $this->db->get();
        return $query->row();
    }

    public function role_name(){

        $language = $this->session->userdata('lang_file');
        $this->db->from('roles');
        $this->db->where('name !=','Applicant');
        $this->db->where('name !=','Entrepreneur');

        return $this->db->generateList("", 'id', 0, NULL, 'id', 'name');

    }

    public function get_selected_business_ids($profile_id){
        return array_map("current", $this->db->query("select business_type_id from inspector_wise_business_type where profile_id = " . $profile_id)->result_array());
    }


}