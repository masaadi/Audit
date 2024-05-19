<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Excel_import_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }
    public function get_user_data($params = array()){

        $this->db->select('*');
        $this->db->from('import_log');
          
        $this->db->order_by("import_log.id", "desc");

       

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
	public function checkUserExits($mobile)
    {
		$reselt = $this->db->query("select * from users where mobile = " .$mobile)->result();
		if(count($reselt) > 0){
			throw new Exception('User Already Exits. ('. $mobile .' )');
            return ;
		} else {
            return true;
		}
    }
}