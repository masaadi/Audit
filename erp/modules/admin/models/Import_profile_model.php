<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Import_profile_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }
    public function get_user_data($params = array()){

        $this->db->select('*');
        $this->db->from('import_log_profile');
          
        $this->db->order_by("import_log_profile.id", "desc");

       

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

	public function getId($table,$condition)
    {
		$reselt = $this->db->query("select * from ".$table." where " . $condition)->result();
		if($reselt){
			return $reselt[0]->id;
		} else {
            throw new Exception($table." id not found. (".$condition.").");
            return ;
		}

    }


}