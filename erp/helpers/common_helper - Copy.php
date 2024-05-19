<?php
/*
  +-------------------------------------------------------------------------------------------------------+
  |																			  	  						|
 * 		@Author			Nur Ahmed				                               		*
 * 		@Email			nur2510@gmail.com		                                                         	*
  |																			      						|
  +-------------------------------------------------------------------------------------------------------+
 */
//helper for dropdown list creation
  function office_category()
  {
   $ci = &get_instance();
   $ci->load->model('Common_Tasks');
   return $ci->Common_Tasks->listOfficeCategory();
}

function defaultOption()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listCommon();
}



/*******************************************************************************/
                            //irrigation module functions
                            //irrigation module functions
                            //irrigation module functions
/*******************************************************************************/



//end
