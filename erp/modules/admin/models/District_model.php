<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class District_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();


        $this->db->select('district.*,division.division_name,
		division.division_name_bn');
        $this->db->from('district');
        $this->db->join('division', 'district.division_id = division.id', 'left');

    
        $this->db->order_by("district.id", "desc");
		
		if (!empty($params['search']['div_name'])) {
           
                $this->db->WHERE('district.district_name', $params['search']['div_name']);
           
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
        return $this->db->query("select * from district where id = " . $id)->result();
    }




}