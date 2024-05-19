<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Office_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('office.*, 
        district.district_name, district.district_name_bn');
        $this->db->from('office');
        $this->db->join('district', 'district.id = office.district_id', 'left');  
        $this->db->order_by("office.id", "desc");
		
		if (!empty($params['search']['off_name'])) {
           
            $this->db->WHERE('office.office_name', $params['search']['off_name']);
           
        }	
       

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


   public function region_name_list(){
        $language = $this->session->userdata('lang_file');
        $this->db->from('office');

        $this->db->where('office_category_id', 1);
        if($language == 'bn'){
            return $this->db->generateList("", 'id', 0, NULL, 'id', 'office_name_bn');
        }else{
           return $this->db->generateList("", 'id', 0, NULL, 'id', 'office_name'); 
       }
        
    }

    public function get_region_data($id){
        return $this->db->query("select * from region_wise_office where office_id = " . $id)->row();
    }
	
	public function checkId($id)
    {
        return $this->db->query("select * from office where id = " . $id)->result();
    }

    public function duplicate_check_category_wise($office_name,$id=null){
        $this->db->select('*');
        $this->db->from('office');
        $this->db->where('office_name', $office_name);
        if($id){
            $this->db->where('id !=', $id);
        }
        
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
   }


}