<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Payment_configuration_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('master_payment_configuration.*, master_fiscal_year.fiscal_year as ms_fiscal_year,industry_type.type_name as industry_type_name,industry_type.type_name_bn as industry_type_name_bn');
        $this->db->from('master_payment_configuration');
        $this->db->join('master_fiscal_year', 'master_payment_configuration.fiscal_year = master_fiscal_year.id'); 
        $this->db->join('industry_type', 'master_payment_configuration.industry_type_id = industry_type.id','left'); 
          
        $this->db->order_by("master_payment_configuration.id", "desc");
		
		if (!empty($params['search']['div_name'])) {
           
                $this->db->WHERE('master_payment_configuration.fiscal_year', $params['search']['div_name']);
           
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
        return $this->db->query("select * from master_payment_configuration where id = " . $id)->result();
    }


}