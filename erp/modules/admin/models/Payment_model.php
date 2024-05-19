<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Payment_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('payments.*,users.full_name,en_contact.*, en_contact.status as status, payments.created_date as created_date');
        $this->db->join('en_contact', 'payments.contact_id = en_contact.id');
        $this->db->from('payments');
        $this->db->join('users','payments.user_id=users.id');
        $this->db->where('payments.pay_status','success');
        $this->db->order_by("payments.id", "desc");

        #Added for get value permission wise
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            if($params['office_category_id'] == 1){
                $sub_result = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.district_id")->result_array());
                if(count($sub_result) < 1){
                    $sub_result = array(0);
                }
                
                $this->db->where_in('en_contact.pro_district', $sub_result);
            }
            else{
                //$this->db->join('en_contact', 'payments.contact_id = en_contact.id');
                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        #End for get value permission wise
        //$this->db->where_in('en_contact.process_status', [6,7,8]);
		if (!empty($params['search']['user_id'])) {
            $this->db->like('en_contact.application_id', $params['search']['user_id']);
        }
        if (!empty($params['search']['office_category_id_ser']) AND empty($params['search']['office_id_ser'])) {
            if($params['search']['office_category_id_ser'] == 1){
                $offices = array_map("current", $this->db->query("
                                    select office.district_id from office 
                                    JOIN region_wise_office ON office.id=region_wise_office.office_id 
                                    GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
            elseif($params['search']['office_category_id_ser'] == 3){
                $offices = array_map("current", $this->db->query("
                                    select office.district_id from office
                                    where office.office_category_id=3  
                                    GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
            elseif($params['search']['office_category_id_ser'] == 4 OR $params['search']['office_category_id_ser'] == 5){
                $offices = array_map("current", $this->db->query("
                                    select office.district_id from office
                                    where office.office_category_id=3  
                                    GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
        }
        if (!empty($params['search']['office_id_ser'])) {
            if($params['search']['office_category_id_ser'] == 1){
                $offices = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['search']['office_id_ser']." GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
            elseif($params['search']['office_category_id_ser'] == 3 OR $params['search']['office_category_id_ser'] == 4 OR $params['search']['office_category_id_ser'] == 5 OR $params['office_category_id'] == 1){

                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['search']['office_id_ser']);
            }
        }
		if (!empty($params['search']['fiscal_year'])) {
            $this->db->WHERE('payments.payment_configaration_id', $params['search']['fiscal_year']);
        }
        
        if (!empty($params['search']['fee_status'])) {
            $this->db->WHERE('payments.payment_type', $params['search']['fee_status']);
        }else{
            $this->db->WHERE('payments.payment_type', 1);
        }

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function get_form_fee_total_amount($params = array()){
        //echo $this->userId;die();

        $this->db->select('SUM(payments.amount) as total_amount');
        $this->db->join('en_contact', 'payments.contact_id = en_contact.id');
        $this->db->from('payments');
        $this->db->join('users','payments.user_id=users.id');
        $this->db->where('payments.pay_status','success');
        $this->db->order_by("payments.id", "desc");

        #Added for get value permission wise
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            if($params['office_category_id'] == 1){
                $sub_result = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.district_id")->result_array());
                if(count($sub_result) < 1){
                    $sub_result = array(0);
                }
                
                $this->db->where_in('en_contact.pro_district', $sub_result);
            }
            else{
                //$this->db->join('en_contact', 'payments.contact_id = en_contact.id');
                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        #End for get value permission wise
        //$this->db->where_in('en_contact.process_status', [6,7,8]);
        if (!empty($params['search']['user_id'])) {
            $this->db->like('en_contact.application_id', $params['search']['user_id']);
        }
        if (!empty($params['search']['office_category_id_ser']) AND empty($params['search']['office_id_ser'])) {
            if($params['search']['office_category_id_ser'] == 1){
                $offices = array_map("current", $this->db->query("
                                    select office.district_id from office 
                                    JOIN region_wise_office ON office.id=region_wise_office.office_id 
                                    GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
            elseif($params['search']['office_category_id_ser'] == 3){
                $offices = array_map("current", $this->db->query("
                                    select office.district_id from office
                                    where office.office_category_id=3  
                                    GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
            elseif($params['search']['office_category_id_ser'] == 4 OR $params['search']['office_category_id_ser'] == 5){
                $offices = array_map("current", $this->db->query("
                                    select office.district_id from office
                                    where office.office_category_id=3  
                                    GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
        }
        if (!empty($params['search']['office_id_ser'])) {
            if($params['search']['office_category_id_ser'] == 1){
                $offices = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['search']['office_id_ser']." GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
            elseif($params['search']['office_category_id_ser'] == 3 OR $params['search']['office_category_id_ser'] == 4 OR $params['search']['office_category_id_ser'] == 5 OR $params['office_category_id'] == 1){

                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['search']['office_id_ser']);
            }
        }
        if (!empty($params['search']['fiscal_year'])) {
            $this->db->WHERE('payments.payment_configaration_id', $params['search']['fiscal_year']);
        }
        $this->db->WHERE('payments.payment_type', 1);

        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }

    public function get_registration_fee_total_amount($params = array()){
        //echo $this->userId;die();

        $this->db->select('SUM(payments.amount) as total_amount');
        $this->db->join('en_contact', 'payments.contact_id = en_contact.id');
        $this->db->from('payments');
        $this->db->join('users','payments.user_id=users.id');
        $this->db->where('payments.pay_status','success');

        $this->db->order_by("payments.id", "desc");

        #Added for get value permission wise
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            if($params['office_category_id'] == 1){
                $sub_result = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.district_id")->result_array());
                if(count($sub_result) < 1){
                    $sub_result = array(0);
                }
                
                $this->db->where_in('en_contact.pro_district', $sub_result);
            }
            else{
                //$this->db->join('en_contact', 'payments.contact_id = en_contact.id');
                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        #End for get value permission wise
        //$this->db->where_in('en_contact.process_status', [6,7,8]);
        if (!empty($params['search']['user_id'])) {
            $this->db->like('en_contact.application_id', $params['search']['user_id']);
        }
        if (!empty($params['search']['office_category_id_ser']) AND empty($params['search']['office_id_ser'])) {
            if($params['search']['office_category_id_ser'] == 1){
                $offices = array_map("current", $this->db->query("
                                    select office.district_id from office 
                                    JOIN region_wise_office ON office.id=region_wise_office.office_id 
                                    GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
            elseif($params['search']['office_category_id_ser'] == 3){
                $offices = array_map("current", $this->db->query("
                                    select office.district_id from office
                                    where office.office_category_id=3  
                                    GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
            elseif($params['search']['office_category_id_ser'] == 4 OR $params['search']['office_category_id_ser'] == 5){
                $offices = array_map("current", $this->db->query("
                                    select office.district_id from office
                                    where office.office_category_id=3  
                                    GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
        }
        if (!empty($params['search']['office_id_ser'])) {
            if($params['search']['office_category_id_ser'] == 1){
                $offices = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['search']['office_id_ser']." GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
            elseif($params['search']['office_category_id_ser'] == 3 OR $params['search']['office_category_id_ser'] == 4 OR $params['search']['office_category_id_ser'] == 5 OR $params['office_category_id'] == 1){

                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['search']['office_id_ser']);
            }
        }
        if (!empty($params['search']['fiscal_year'])) {
            $this->db->WHERE('payments.payment_configaration_id', $params['search']['fiscal_year']);
        }
        $this->db->WHERE('payments.payment_type', 2);

        $query = $this->db->get(); 
        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }

    public function get_renew_fee_total_amount($params = array()){
        //echo $this->userId;die();

        $this->db->select('SUM(payments.amount) as total_amount');
        $this->db->join('en_contact', 'payments.contact_id = en_contact.id');
        $this->db->from('payments');
        $this->db->where('payments.pay_status','success');
        $this->db->join('users','payments.user_id=users.id');
          
        $this->db->order_by("payments.id", "desc");

        #Added for get value permission wise
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            if($params['office_category_id'] == 1){
                $sub_result = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.district_id")->result_array());
                if(count($sub_result) < 1){
                    $sub_result = array(0);
                }
                
                $this->db->where_in('en_contact.pro_district', $sub_result);
            }
            else{
                //$this->db->join('en_contact', 'payments.contact_id = en_contact.id');
                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        #End for get value permission wise
        //$this->db->where_in('en_contact.process_status', [6,7,8]);
        if (!empty($params['search']['user_id'])) {
            $this->db->like('en_contact.application_id', $params['search']['user_id']);
        }
        if (!empty($params['search']['office_category_id_ser']) AND empty($params['search']['office_id_ser'])) {
            if($params['search']['office_category_id_ser'] == 1){
                $offices = array_map("current", $this->db->query("
                                    select office.district_id from office 
                                    JOIN region_wise_office ON office.id=region_wise_office.office_id 
                                    GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
            elseif($params['search']['office_category_id_ser'] == 3){
                $offices = array_map("current", $this->db->query("
                                    select office.district_id from office
                                    where office.office_category_id=3  
                                    GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
            elseif($params['search']['office_category_id_ser'] == 4 OR $params['search']['office_category_id_ser'] == 5){
                $offices = array_map("current", $this->db->query("
                                    select office.district_id from office
                                    where office.office_category_id=3  
                                    GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
        }
        if (!empty($params['search']['office_id_ser'])) {
            if($params['search']['office_category_id_ser'] == 1){
                $offices = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['search']['office_id_ser']." GROUP BY office.district_id")->result_array());
                if(count($offices) < 1){
                    $offices = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $offices);
            }
            elseif($params['search']['office_category_id_ser'] == 3 OR $params['search']['office_category_id_ser'] == 4 OR $params['search']['office_category_id_ser'] == 5 OR $params['office_category_id'] == 1){

                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['search']['office_id_ser']);
            }
        }
        if (!empty($params['search']['fiscal_year'])) {
            $this->db->WHERE('payments.payment_configaration_id', $params['search']['fiscal_year']);
        }
        $this->db->WHERE('payments.payment_type', 3);

        $query = $this->db->get(); 
        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }

    public function region_wise_office($region_id){
        $result = $this->db->query("
                                    select office.* from office 
                                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                                    where region_wise_office.region_id = ".$region_id." 
                                    GROUP BY office.district_id
                                    ")->result();
        return $result;
    }
   
	
	public function checkId($id)
    {
        return $this->db->query("select * from payment where id = " . $id)->result();
    }
}