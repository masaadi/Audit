<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Office_category_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('*');
        $this->db->from('office_category');
          
        $this->db->order_by("office_category.id", "desc");
		
		if (!empty($params['search']['off_cat_name'])) {
           
           $this->db->WHERE('office_category.office_category_name', $params['search']['off_cat_name']);
		   $this->db->or_WHERE('office_category.office_category_name_bn', $params['search']['off_cat_name']);
           
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
        return $this->db->query("select * from office_category where id = " . $id)->result();
    }


}