<?php

/*
 * ***********************************************************************************************************
 * 																											*
 * 		Authentication library for Code Igniter.															*
 * 		@File Type		Model Public Class																	*
 * 		@Author			Nur Ahmed													*
 * 		@Email			nur2510@gmail.com	                                    						*
 * 		@Profession		Web Application Developer & Programmer												*
 * 		@Based on		CL Auth by Jason Ashdown (http://http://www.jasonashdown.co.uk/)					*
 * 																											*
 * ***********************************************************************************************************
 */

class Common_tasks extends CI_Model
{

	//generateList($conditions = null, $order = 'id ASC', $start = 0, $limit = NULL, $key = null, $value = null)

	function __construct()
	{
		parent::__construct();
		$this->_prefix = $this->config->item('DX_table_prefix');
	}
   function listCommon()
	{
		$language = $this->session->userdata('lang_file');
		if ($language == "bn") {
			return $array = array(
				'' => '----- "সিলেক্ট" -----'
			);

		} else {
			return $array = array(
				'' => '----- Select -----'
			);

		}
	}
	function listOfficeCategory()
	{
		
		$this->db->from('office_category');
		$language = $this->session->userdata('lang_file');
        if ($language == "bn") {
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'office_category_name_bn');
		}else{
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'office_category_name');
		}
			

	}

	function listOffice(){
		$this->db->from('office');
		$language = $this->session->userdata('lang_file');
        if ($language == "bn") {
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'office_name_bn');
		}else{
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'office_name');
		}
	}

	function listSection(){
		$this->db->from('section');
        return $this->db->generateList("", 'id', 0, NULL, 'id', 'section_name');
	}

	function listServiceType(){
		$this->db->from('service_type');
        return $this->db->generateList("status = 1", 'id', 0, NULL, 'id', 'service_type');
	}

	function emp_type_list(){
		$this->db->from('employee_type');
        return $this->db->generateList("", 'id', 0, NULL, 'id', 'type_name');
	}

	function listOfficeByTypeId($dis_id){
        $language = $this->session->userdata('lang_file');
        $this->db->from('office');
        if ($language == "bn") {
            return $this->db->generateList("office_category_id = '$dis_id'", 'office_name_bn', 0, NULL, 'ID', 'office_name_bn', $language);

        } else {
            return $this->db->generateList("office_category_id = '$dis_id'", 'office_name', 0, NULL, 'ID', 'office_name', $language);

        }
    }

	function listDivision(){
		// $this->_prefix . 
		$this->db->from('division');

		$language = $this->session->userdata('lang_file');
        if ($language == "bn") {
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'division_name_bn');
		}else{
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'division_name');
		}
	}

	function listDistrict(){
		// $this->_prefix . 
		$this->db->from('district');
		$language = $this->session->userdata('lang_file');
		
		if ($language == "bn") {
			return $this->db->generateList("", 'district_name_bn asc', 0, NULL, 'id', 'district_name_bn');
		}else{
			return $this->db->generateList("", 'district_name asc', 0, NULL, 'id', 'district_name');
		}
	}

	function listUpazila(){
		// $this->_prefix . 
		$language = $this->session->userdata('lang_file');
		$this->db->from('upazila');
		if ($language == "bn") {
			return $this->db->generateList("", 'upazila_name_bn asc', 0, NULL, 'id', 'upazila_name_bn');
		}else{
			return $this->db->generateList("", 'upazila_name asc', 0, NULL, 'id', 'upazila_name');
		}
	}

	function listDistrictbydiv($division_id_pre)
	{
		$language = $this->session->userdata('lang_file');
		// $this->_prefix . 
		$this->db->from('district');
		$this->db->where('division_id', $division_id_pre);
		if ($language == "bn") {
			return $this->db->generateList("", 'district_name_bn asc', 0, NULL, 'ID', 'district_name_bn', $language);

		} else {
			return $this->db->generateList("", 'district_name asc', 0, NULL, 'ID', 'district_name', $language);

		}
	}
	function listUpazilaByDivDis($div,$dis)
	{
		$language = $this->session->userdata('lang_file');
		// $this->_prefix . 
		$this->db->from('upazila');
		$this->db->where('division_id', $div);
		$this->db->where('district_id', $dis);
		if ($language == "bn") {
			return $this->db->generateList("", 'upazila_name_bn asc', 0, NULL, 'id', 'upazila_name_bn', $language);

		} else {
			return $this->db->generateList("", 'upazila_name asc', 0, NULL, 'id', 'upazila_name', $language);

		}
	}

	function listThana($dis_id)
	{
		$language = $this->session->userdata('lang_file');
		// $this->_prefix . 
		$this->db->from('upazila');
		if ($language == "bn") {
			return $this->db->generateList("district_id = '$dis_id'", 'upazila_name_bn asc', 0, NULL, 'ID', 'upazila_name_bn', $language);

		} else {
			return $this->db->generateList("district_id = '$dis_id'", 'upazila_name asc', 0, NULL, 'ID', 'upazila_name', $language);

		}
	}
	
	function listModule()
	{
		
		$this->db->from($this->_prefix . 'module');
		
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'module_name');
		

	}

	function listFiscalyear(){
		$language = $this->session->userdata('lang_file');
		// $this->_prefix . 
		$this->db->from('master_fiscal_year');
		if ($language == "bn") {
			return $this->db->generateList("", 'fiscal_year_bn', 0, NULL, 'ID', 'fiscal_year_bn', $language);

		} else {
			return $this->db->generateList("", 'fiscal_year', 0, NULL, 'ID', 'fiscal_year', $language);

		}
	}
	
	
  
	function listBlogTopic()
	{
		
		$this->db->from('blogtopic');
		$this->db->where('status',1);
		$language = $this->session->userdata('lang_file');
        if ($language == "bn") {
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'topic_name_bn');
		}else{
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'topic_name');
		}
			

	}


	function listDepartment(){
		// $this->_prefix . 
		$language = $this->session->userdata('lang_file');
		$this->db->from('department');
		if ($language == "bn") {
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'department_name_bn');
		}else{
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'department_name');
		}
	}

	function listDesignation(){
		// $this->_prefix . 
		$language = $this->session->userdata('lang_file');
		$this->db->from('designation');
		if ($language == "bn") {
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'designation_name_bn');
		}else{
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'designation_name');
		}
	}

	function listBusinessType(){
		// $this->_prefix . 
		$language = $this->session->userdata('lang_file');
		$this->db->from('business_type');
		if ($language == "bn") {
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'type_name_bn');
		}else{
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'type_name');
		}
	}

	function listIndustryType(){
		// $this->_prefix . 
		$language = $this->session->userdata('lang_file');
		$this->db->from('industry_type');
		if ($language == "bn") {
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'type_name_bn');
		}else{
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'type_name');
		}
	}
	function listIndustryTypeBangla(){
		// $this->_prefix . 
		$language = $this->session->userdata('lang_file');
		$this->db->from('industry_type');
		return $this->db->generateList("", 'id', 0, NULL, 'id', 'type_name_bn');
		
	}

	function listIndustryTypeEnglish(){
			// $this->_prefix . 
			$language = $this->session->userdata('lang_file');
			$this->db->from('industry_type');
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'type_name');
			
		}

	function listInspector(){
		// $this->_prefix . 
		$language = $this->session->userdata('lang_file');
        $this->db->from('inspector');
        
		if ($language == "bn") {
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'inspector_name_id');
		}else{
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'inspector_name_id');
		}
	}

	function regionName($id){
		// $this->_prefix . 
		$language = $this->session->userdata('lang_file');
        $this->db->from('office');
        if($language == 'bn'){
        	return $this->db->query("select office_name_bn from office where id = " . $id)->row()->office_name_bn;
        }else{
        	return $this->db->query("select office_name from office where id = " . $id)->row()->office_name;
        }

	}
	function getDistrictName($id=0){
		$language = $this->session->userdata('lang_file');
		$this->db->where('id',$id);
        $query = $this->db->get('district');
        if($query->num_rows() > 0){
        	$data=$query->result_array();
        	$language = $this->session->userdata('lang_file');
        	if ($language == "bn") {
				return $data[0]['district_name_bn'];
			}else{
				return $data[0]['district_name'];
			}
        	
        }else{
        	return FALSE;
        }
        
	}

	function getAdditionalDocuments($id=0){
		return $this->db->query("select * from en_document_additional where document_id = " . $id)->result();
	}


	function getFeesData($contact_id=0){
		return $this->db->query("select * from payments where payment_type = 1 and contact_id = " . $contact_id ." order by id desc")->result();
	}
	   
	function insertLog($data,$table){
		date_default_timezone_set('Asia/Dhaka');
        $user_id=$this->session->userdata('DX_user_id');
		$data['user_id']=  $user_id;
		$data['date_time']= date('Y-m-d h:i:s');
		$this->Shows->insertData($data,$table);
		return true;
	}









}

?>
