<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Information_dessimination_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('office.*,office_category.office_category_name,
		office_category.office_category_name_bn, region_wise_office.region_id, 
        district.district_name, district.district_name_bn');
        $this->db->from('office');
        $this->db->join('office_category', 'office.office_category_id = office_category.id', 'left');  
        $this->db->join('region_wise_office', 'region_wise_office.office_id = office.id', 'left');  
        $this->db->join('district', 'district.id = office.district_id', 'left');
        $this->db->order_by("office.id", "desc");
		
		
		if (!empty($params['search']['off_cat'])) {
           
            $this->db->WHERE('office.office_category_id', $params['search']['off_cat']);
           
        }
		
       

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


    public function get_office_categories(){
        $this->db->select('*');
        $this->db->from('office_category');
          
        $this->db->order_by("office_category.id", "desc");
		
	
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

   

   
	
	
	public function checkId($id)
    {
        return $this->db->query("select * from office where id = " . $id)->result();
    }


}