<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Upazila_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();


        $this->db->select('upazila.*,division.division_name,
		division.division_name_bn,district.district_name,
		district.district_name_bn');
        $this->db->from('upazila');
        $this->db->join('division', 'upazila.division_id = division.id', 'left');
        $this->db->join('district', 'upazila.district_id = district.id', 'left');

          
        $this->db->order_by("upazila.id", "desc");
		
		if (!empty($params['search']['div_name'])) {
           
                $this->db->like('upazila.upazila_name', $params['search']['div_name']);
                $this->db->or_like('upazila.upazila_name_bn', $params['search']['div_name']);
           
        }

        if (!empty($params['search']['district_id'])) {
            $this->db->WHERE('upazila.district_id', $params['search']['district_id']);
        }
        if (!empty($params['search']['division_id'])) {
            $this->db->WHERE('upazila.division_id', $params['search']['division_id']);
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
        return $this->db->query("select * from upazila where id = " . $id)->result();
    }


    public function get_division(){
        $this->db->select('*');
        $this->db->from('division');          
        $this->db->order_by("division.id", "desc");
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


}