<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Menu_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('menu.*,module.module_name');
        $this->db->from('menu');
        $this->db->join('module', 'menu.module_id = module.id', 'left');  
        $this->db->order_by("menu.sorting_order", "desc");
		
        if (!empty($params['search']['module_id'])) {
            $this->db->like('menu.module_id', $params['search']['module_id']);
        }

		if (!empty($params['search']['m_name'])) {
            $m_name = strtolower($params['search']['m_name']);
            $this->db->like('LOWER(menu.menu_name)', $params['search']['m_name']);
        }
		

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


   public function moduel_list(){

        $this->db->select('*');
        $this->db->from('module');
        $this->db->where('status',1);
        
        return $this->db->generateList("", 'id', 0, NULL, 'id', 'module_name');
    
   }

   public function duplicate_check_module_soart($module_id, $sorting_order, $id=null){
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('module_id', $module_id);
        $this->db->where('sorting_order', $sorting_order);
        if($id){
            $this->db->where('id !=', $id);
        }
        
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
   }

   
	
	
	public function checkId($id)
    {
        return $this->db->query("select * from menu where id = " . $id)->result();
    }


}