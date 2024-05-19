<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Approval_step_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('approval_step.*,office_category.office_category_name,
		office_category.office_category_name_bn,designation.designation_name,designation.designation_name_bn');
        $this->db->from('approval_step');
        $this->db->join('office_category', 'approval_step.office_category_id = office_category.id', 'left');  
        $this->db->join('designation', 'approval_step.designation_id = designation.id', 'left');  
		$this->db->order_by("approval_step.id", "desc");
		
		if (!empty($params['search']['step_name'])) {
           
                $this->db->WHERE('approval_step.step_id', $params['search']['step_name']);
				//$this->db->or_WHERE('approval_step.approval_step_name_bn', $params['search']['off_name']);
           
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
        return $this->db->query("select * from approval_step where id = " . $id)->result();
    }


}