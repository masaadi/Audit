<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Certificate_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
        //echo $this->userId;die();
        if (!empty($params['search']['certificate_status']) && $params['search']['certificate_status']=='ready' ) {
            $this->db->select('payments.*,users.full_name,en_contact.*, en_contact.status as status, certificate.id as certificate_id, certificate.certificate_no,payments.id as payment_id,renew_history.certificate_name_pdf as ren_certificate_name_pdf, renew_history.status as certificate_status');

            $this->db->join('renew_history', 'payments.id = renew_history.payment_id');
            //$this->db->join('renew_history', 'certificate.id = renew_history.certificate_id');
            $this->db->join('certificate', 'renew_history.certificate_id = certificate.id');
            
        }else{
            $this->db->select('payments.*,users.full_name,en_contact.*, en_contact.status as status,payments.id as payment_id');
        }
        
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

        if (!empty($params['search']['certificate_status']) && $params['search']['certificate_status']=='ready' ) {
            // $this->db->WHERE('en_contact.process_status',8);
            $this->db->where("(en_contact.process_status=7 OR en_contact.process_status=8 OR en_contact.is_renew=1)");
        }else{
            $this->db->where('en_contact.process_status',6);
        }

        $this->db->WHERE_IN('payments.payment_type', [2,3]);

        if (!empty($params['search']['certificate_status']) && $params['search']['certificate_status']=='ready' ) {
            if (!empty($params['search']['ser_from_date'])) {
                $this->db->where('DATE(renew_history.date) >=',$params['search']['ser_from_date']);
            }
            if (!empty($params['search']['ser_to_date'])) {
                $this->db->where('DATE(renew_history.date) <=',$params['search']['ser_to_date']);
            }
            if (!empty($params['search']['report_for'])) {
                $this->db->where('DATE(certificate.updated_date) <',$params['search']['report_for']);
            }
            if (!empty($params['search']['district_id'])) {
                $this->db->where('en_contact.pro_district',$params['search']['district_id']);
            }
            if (!empty($params['search']['upazila_id'])) {
                $this->db->where('en_contact.pro_upazila',$params['search']['upazila_id']);
            }
            $this->db->WHERE_IN('payments.status',[1,2]);
        }else{
            if (!empty($params['search']['ser_from_date'])) {
                $this->db->where('DATE(payments.created_date) >=',$params['search']['ser_from_date']);
            }
            if (!empty($params['search']['ser_to_date'])) {
                $this->db->where('DATE(payments.created_date) <=',$params['search']['ser_to_date']);
            }
            $this->db->WHERE('payments.status',1);
        }
        
        

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }


        $query = $this->db->get(); //echo $this->db->last_query(); exit;
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


   

   
	
	
	public function checkId($con)
    {
        return $this->db->query("select * from certificate where " . $con)->result();
    }
	public function getCertificate($id)
    {
        $result = $this->db->query("select * from certificate where payment_id = " . $id)->result();
        if($result){
            return $result[0]->id;
        } else {
            return false;
        }
    }

}