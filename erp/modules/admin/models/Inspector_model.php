<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Inspector_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		
        $this->db->select('inspector.*,profile.employee_id as profile_employee_id,profile.contact_no as contact_no,
		office_category.office_category_name,
		office_category.office_category_name_bn ,office.office_name,
		office.office_name_bn, GROUP_CONCAT(business_type.type_name) business_type_name, GROUP_CONCAT(business_type.type_name_bn) business_type_name_bn');
        $this->db->from('inspector');
        $this->db->join('profile', 'profile.id = inspector.profile_id');
        //$this->db->join('business_type', 'business_type.id = inspector.business_type_id');
        $this->db->join('business_type', 'FIND_IN_SET(business_type.id, inspector.business_type_id)');
        $this->db->join('office_category', 'office_category.id = profile.office_category_id');
        $this->db->join('office', 'office.id = profile.office_id');
        $this->db->join('department', 'department.id = profile.department_id');
        $this->db->join('designation', 'designation.id = profile.designation_id');
        $this->db->join('district', 'profile.district_id = district.id');
        $this->db->join('upazila', 'profile.upazila_id = upazila.id');
        
        $this->db->order_by("inspector.id", "desc");
        $this->db->group_by("inspector.id");

		if (!empty($params['search']['ser_profile_id'])) {
            // $this->db->like('profile.employee_id', $params['search']['ser_profile_id']);
            $this->db->like('LOWER(profile.employee_id)', strtolower($params['search']['ser_profile_id']));
        }
        if (!empty($params['search']['ser_contact_no'])) {
            $this->db->like('profile.contact_no', $params['search']['ser_contact_no']);
        }
        if (!empty($params['search']['ser_off_cat_id'])) {
            $this->db->WHERE('profile.office_category_id', $params['search']['ser_off_cat_id']);
        }
        if (!empty($params['search']['ser_office_id'])) {
            $this->db->WHERE('profile.office_id', $params['search']['ser_office_id']);
        }
        if (!empty($params['search']['ser_business_type'])) {
            $this->db->WHERE('business_type.id', $params['search']['ser_business_type']);
        }
		
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function get_profile_id($profile_id){
        // return $this->db->query("select * from profile where employee_id ='".$profile_id."' ")->row();
        return $this->db->query("select * from profile where id ='".$profile_id."' ")->row();
    }

    public function get_profile_info($id){
        return $this->db->query("select * from profile where id ='".$id."' ")->row();
    }

	public function checkId($id)
    {
        return $this->db->query("select * from inspector where profile_id = " . $id)->row();
    }

    public function inspector_list($search_text)
    {
        $this->db->select('profile.*,users.username');
        $this->db->from('profile');
        $this->db->join('users', 'profile.user_id=users.id');
        $this->db->where('users.role_id', 4);
        $this->db->where("(LOWER(profile.employee_id) LIKE '%".strtolower($search_text)."%' OR LOWER(users.username) LIKE '%".strtolower($search_text)."%')", NULL, FALSE);
        $query = $this->db->get();
        return $query->result();
    }

}