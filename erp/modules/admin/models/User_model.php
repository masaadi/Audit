<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();
        $this->db->select('user_id');
        $this->db->from('profile');
        $profile_query = $this->db->get();
        $profile_users = array_map("current", $profile_query->result_array());
        
        if(empty($profile_users)){
            $profile_users = array(0);
        }

        $this->db->select('users.*, roles.name as role_name,
            GROUP_CONCAT( menu.menu_name SEPARATOR ", ") as user_privilege,
            ');
        $this->db->from('users');
        $this->db->join('roles', 'users.role_id = roles.id');  
        $this->db->join('user_privilege', 'users.id = user_privilege.user_id','left');  
        $this->db->join('menu', 'menu.id = user_privilege.menu_id','left');  
        $this->db->order_by("users.id", "desc");
        $this->db->group_by("users.id");

        $this->db->where_not_in('users.id', $profile_users);
        if (!empty($params['search']['ser_name'])) {
            $this->db->like('LOWER(users.full_name)', strtolower($params['search']['ser_name']));
        }

        if (!empty($params['search']['ser_username'])) {
            $this->db->like('LOWER(users.username)', strtolower($params['search']['ser_username']));
        }

        if (!empty($params['search']['ser_email'])) {
            $this->db->like('LOWER(users.email)', strtolower($params['search']['ser_email']));
        }

        if (!empty($params['search']['ser_roel_id'])) {
            $this->db->where('users.role_id', $params['search']['ser_roel_id']);
        }

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

	public function checkId($id=0)
    {
        if($id){
            return $this->db->query("select * from users where id = " . $id)->result();
        }
    }

    public function get_all_privileges(){
        $this->db->select('menu.*, module.module_name as module_name, module.module_name_bn as module_name_bn');
        $this->db->from('menu');
        $this->db->join('module', 'menu.module_id = module.id','left');  
        $this->db->order_by("module.sorting_order", "asc");
        $this->db->order_by("menu.sorting_order", "asc");
        $this->db->where('module.status', 1);
        $this->db->where('menu.status', 1);

        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function updated_user_privilege($id){
        $this->db->select('menu_id');
        $this->db->from('user_privilege');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        $menu = array_map("current", $query->result_array());


        $this->db->select('module_id');
        $this->db->from('user_privilege');
        $this->db->where('user_id', $id);
        $query1 = $this->db->get();
        $module = array_map("current", $query1->result_array());

        $data = array(
            'menu' => $menu,
            'module' => $module
        );
        return $data;
    }

    public function get_user_wise_privilege($user_id){
        if($user_id != 1){
            $this->db->select('menu.*, module.module_name as module_name, module.module_name_bn as module_name_bn, module.icon as module_icon');
            $this->db->from('user_privilege');
            $this->db->join('menu', 'menu.id = user_privilege.menu_id');
            $this->db->join('module', 'user_privilege.module_id = module.id','left');
            $this->db->order_by("module.sorting_order", "asc");
            $this->db->order_by("menu.sorting_order", "asc");
            $this->db->where('user_privilege.user_id', $user_id);
            $this->db->where('module.status', 1);
            $this->db->where('menu.status', 1);
        }else{
            $this->db->select('menu.*, module.module_name as module_name, module.module_name_bn as module_name_bn, module.icon as module_icon');
            $this->db->from('menu');
            $this->db->join('module', 'menu.module_id = module.id','left');
            $this->db->order_by("module.sorting_order", "asc");
            $this->db->order_by("menu.sorting_order", "asc");
            $this->db->where('module.status', 1);
            $this->db->where('menu.status', 1);
        }
        

        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function check_permission($user_id, $url){
        $this->db->select('menu.*');
        $this->db->from('user_privilege');
        $this->db->join('menu', 'menu.id = user_privilege.menu_id');
        $this->db->join('module', 'user_privilege.module_id = module.id','left');
        $this->db->where('user_privilege.user_id', $user_id);
        $this->db->where('menu.url', $url);

        $query = $this->db->get();
        return ($query->num_rows() > 0) ? TRUE : FALSE;
    }

    public function single_profile($id){

        $this->db->select(
        'profile.id,profile.office_category_id,profile.office_id,users.username,users.full_name,users.full_name_bn,profile.image,profile.gender,profile.birth_date,profile.religion,profile.contact_no,profile.email,profile.address,profile.address_bn,
         office_category.office_category_name,office_category.office_category_name_bn,
         office.office_name,office.office_name_bn,
         department.department_name,department.department_name_bn,
         designation.designation_name,designation.designation_name_bn,
         division.division_name,division.division_name_bn,
         district.district_name,district.district_name_bn,
         upazila.upazila_name,upazila.upazila_name_bn,
         ');
        $this->db->from('profile');
        $this->db->join('users', 'users.id=profile.user_id');
        $this->db->join('office_category', 'profile.office_category_id=office_category.id','left');
        $this->db->join('office', 'profile.office_id=office.id','left');
        $this->db->join('department', 'profile.department_id=department.id','left');
        $this->db->join('designation', 'profile.designation_id=designation.id','left');
        $this->db->join('division', 'profile.division_id=division.id','left');
        $this->db->join('district', 'profile.district_id = district.id', 'left');
        $this->db->join('upazila', 'profile.upazila_id = upazila.id', 'left');
        $this->db->WHERE('profile.user_id', $id);

        
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }


}