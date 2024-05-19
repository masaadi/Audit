<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



/*

 ************************************************************************************************************

 *																											*

 * 		Authentication library for Code Igniter.															*

 * 		@File Type		DX Auth Public Class																*
 * 		@Author			Kazi Sanchoy Ahmed (B.Sc in CSE)	    											*
 * 		@Email			sanchoy7@gmail.com		                                    						*

 *		@Profession		Web Application Developer & Programmer												*

 *																											*

 ************************************************************************************************************

*/

 

class Dup_Check

{

	// Private

	var $_banned;

	var $_ban_reason;

	var $_auth_error;	// Contain user error when login

	var $_captcha_image;

	

	function Dup_Check()

	{

		$this->ci =& get_instance();


	}

   // country Available
    function is_country_available($country_name) {
        // Load Models
        $this->ci->load->model('admin/dup_checks', 'countries');
        $countries = $this->ci->countries->check_country_name($country_name);
        return $countries->num_rows() == 0;
    }

    //Custom function 			
    function is_hospital_available($hospital_name) { 
        // Load Models
        $this->ci->load->model('admin/dup_checks', 'users');
        $users = $this->ci->users->check_hospital_name($hospital_name);
        return $users->num_rows() == 0;
    }

    function is_main_area_available($main_area_name) { 
        // Load Models
        $this->ci->load->model('admin/dup_checks', 'users');
        $users = $this->ci->users->check_main_area($main_area_name);
        return $users->num_rows() == 0;
    }

    function check_main_area_availability($main_area_name, $id) {
        // Load Models
        $this->ci->load->model('admin/dup_checks', 'users');
        $users = $this->ci->users->check_mainArea($main_area_name, $id);
        return $users->num_rows() == 0;
    }

    function is_city_available($city_name) {
        // Load Models
        $this->ci->load->model('admin/dup_checks', 'users');
        $users = $this->ci->users->check_city($city_name);
        return $users->num_rows() == 0;
    }

    function is_Hospital_category_available($category_name) {
        // Load Models
        $this->ci->load->model('admin/dup_checks', 'users');
        $users = $this->ci->users->check_category($category_name);
        return $users->num_rows() == 0;
    }

    function is_category_available($category_name, $id) {
        $this->ci->load->model('admin/dup_checks', 'users');
        $users = $this->ci->users->check_hospital_category($category_name, $id);
        return $users->num_rows() == 0;
    }
     function is_area_available($area_name,$city) {
	     // Load Models
        $this->ci->load->model('admin/dup_checks', 'users');
        $users = $this->ci->users->check_area($area_name,$city);
        return $users->num_rows() == 0;
    }
   function  check_area_availability($area_name,$conData){
	   // Load Models
        $this->ci->load->model('admin/dup_checks', 'users');
        $users = $this->ci->users->check_area_availability($area_name,$conData);
        return $users->num_rows() == 0;
	
	}
	function check_city_availability($city_name, $conData){
	  // Load Models
        $this->ci->load->model('admin/dup_checks', 'users');
        $users = $this->ci->users->city_availability($city_name,$conData);
        return $users->num_rows() == 0;
	
	}
    function is_sub_category_available($sub_category_name,$category){
	    $this->ci->load->model('admin/dup_checks', 'users');
        $users = $this->ci->users->check_sub_category($sub_category_name,$category);
        return $users->num_rows() == 0;
	
	}
	function check_sub_category_availability($sub_category_name,$conData){
	    $this->ci->load->model('admin/dup_checks', 'users');
        $users = $this->ci->users->check_sub_category_availability($sub_category_name,$conData);
        return $users->num_rows() == 0;
	}
	function check_hospital_available($hospital_name,$id){
	   $this->ci->load->model('admin/dup_checks', 'users');
        $users = $this->ci->users->check_hospital_available($hospital_name,$id);
        return $users->num_rows() == 0;
	
	}

}

?>