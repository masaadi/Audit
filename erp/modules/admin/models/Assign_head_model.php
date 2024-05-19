<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Assign_head_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('ADD_OFFICE_HEAD.*,HR_PERSONALINFO.EMPLOYEE_NAME,HR_PERSONALINFO.EMPLOYEE_NAME_BN,
		MASTER_WING.WING_NAME_BN,MASTER_WING.WING_NAME,MASTER_OFFICE_TYPE.OFFICE_TYPE_NAME_BN,
		MASTER_OFFICE_TYPE.OFFICE_TYPE_NAME,MASTER_OFFICE.OFFICE_NAME_BN,
		MASTER_OFFICE.OFFICE_NAME');
        $this->db->from('ADD_OFFICE_HEAD');
        $this->db->join('HR_PERSONALINFO', 'HR_PERSONALINFO.EMPLOYEE_ID = ADD_OFFICE_HEAD.EMPLOYEE_ID', 'left');
		 $this->db->join('MASTER_OFFICE', 'MASTER_OFFICE.ID = ADD_OFFICE_HEAD.OFFICE_ID', 'left');
        $this->db->join('MASTER_WING', 'MASTER_WING.ID = MASTER_OFFICE.WING_ID', 'left');
        $this->db->join('MASTER_OFFICE_TYPE', 'MASTER_OFFICE_TYPE.ID = MASTER_OFFICE.OFFICE_TYPE_ID', 'left'); 
      
        $this->db->order_by("ADD_OFFICE_HEAD.STATUS", "DESC");
		
		if (array_key_exists("office_id", $params)) {
			if($params['office_id']>0){
			 $a =$params['office_id'];			
			 $this->db->where("ADD_OFFICE_HEAD.OFFICE_ID IN (SELECT MASTER_OFFICE_MAPING.CHILD_OFFICE_ID FROM MASTER_OFFICE_MAPING WHERE PARENT_OFFICE_ID = '$a' )") ;
					
		   }			
		}
		
        /*$this->db->select('*');
        $this->db->from('ADD_OFFICE_HEAD');
        $this->db->order_by("ADD_OFFICE_HEAD.ID", "desc");*/

       /* if (!empty($params['search']['name'])) {
            $language = $this->session->userdata('lang_file');
            if ($language == "bn") {
                $this->db->like('MASTER_DISTRICT.DISTRICT_NAME_BN', $params['search']['name']);
            } else {
                $this->db->like('MASTER_DISTRICT.DISTRICT_NAME', $params['search']['name']);
            }
        }*/
        // if (!empty($params['search']['name_bn'])) {
        //     $this->db->like('MASTER_WING.WING_NAME_BN', $params['search']['name_bn']);
        // }

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


    public function checkUnique($fields = array(), $id = null)
    {

        foreach ($fields as $field_name => $field_value) {
            if (!empty($id)) {
                $row = $this->db->select($field_name)->where('ID !=', $id)->where($field_name, $field_value)->get('ADD_OFFICE_HEAD');
            } else {
                $row = $this->db->select($field_name)->where($field_name, $field_value)->get('ADD_OFFICE_HEAD');
            }
            $result = $row->result();
            if ($result) {
                return 'false';
            } else {
                return 'true';
            }

        }
    }

    public function checkId($id)
    {
        return $this->db->query("SELECT * FROM ADD_OFFICE_HEAD WHERE ID = " . $id)->result();
    }

        public function get_employee_name($id){
        return $this->db->query("SELECT * FROM HR_PERSONALINFO WHERE EMPLOYEE_ID = " . $id)->result();
    }
	
	function getOffice($office_id){
		$this->db->select('MASTER_OFFICE.ID,MASTER_OFFICE.OFFICE_NAME,MASTER_OFFICE.OFFICE_NAME_BN');
        $this->db->from('MASTER_OFFICE_MAPING');
        $this->db->join('MASTER_OFFICE', 'MASTER_OFFICE.ID = MASTER_OFFICE_MAPING.CHILD_OFFICE_ID', 'INNER'); 
		$this->db->where('PARENT_OFFICE_ID', $office_id);
        $this->db->order_by("MASTER_OFFICE.OFFICE_NAME", "ASC");
		$query=$this->db->get();
		return $query->result();
		
	}


}