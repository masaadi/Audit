<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Assign_designation_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('assign_designation.*,office.office_name,designation.designation_name');
        $this->db->from('assign_designation');
        $this->db->join('office','office.id = assign_designation.office_id','left');
        $this->db->join('designation','designation.id = assign_designation.designation_id','left');
          
        $this->db->order_by("assign_designation.id", "desc");
		
		if (!empty($params['search']['office_id'])) {
           
           $this->db->WHERE('assign_designation.office_id', $params['search']['office_id']);           
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
        return $this->db->query("select * from assign_designation where id = " . $id)->result();
    }


}