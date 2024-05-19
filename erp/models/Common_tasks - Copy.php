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




	function listOfficeCategory()
	{
		
		$this->db->from($this->_prefix . 'office_category');
		
			return $this->db->generateList("", 'id', 0, NULL, 'id', 'office_category_name');
		

	}

	
  

}

?>
