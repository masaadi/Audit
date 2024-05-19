<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Union_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();


        $this->db->select('master_union.*,division.division_name,
		division.division_name_bn,district.district_name,
		district.district_name_bn,upazila.upazila_name,
		upazila.upazila_name_bn');
        $this->db->from('master_union');
        $this->db->join('division', 'master_union.division_id = division.id', 'left');
        $this->db->join('district', 'master_union.district_id = district.id', 'left');
        $this->db->join('upazila', 'master_union.upazila_id = upazila.id', 'left');

          
        $this->db->order_by("master_union.id", "desc");


  



		if (!empty($params['search']['union_name'])) {
            $this->db->like('master_union.union_name', $params['search']['union_name']);
            $this->db->or_like('master_union.union_name_bn', $params['search']['union_name']);
        }
        if (!empty($params['search']['upazila_id'])) {
            $this->db->WHERE('master_union.upazila_id', $params['search']['upazila_id']);
        }
        if (!empty($params['search']['district_id'])) {
            $this->db->WHERE('master_union.district_id', $params['search']['district_id']);
        }
        if (!empty($params['search']['division_id'])) {
            $this->db->WHERE('master_union.division_id', $params['search']['division_id']);
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
        return $this->db->query("select * from master_union where id = " . $id)->result();
    }

}