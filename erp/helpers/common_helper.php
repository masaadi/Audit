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

  function check_applicant($key)
  {
     $uri = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";;
     $is_admin = preg_match("/https?:\/{2}\S+\/$key\/\S+/", $uri);
     if($is_admin){
        redirect('/welcome/notfound');
    }
  }

  function checkResult($user_privileges=''){
      return true;
    $link_url= ltrim($_SERVER['PATH_INFO'],'/');
    if(check_permissions($user_privileges,$link_url) != true){
        redirect('/welcome/notfound');
    }else{
        return true;
    }
  }


  function check_permissions($user_privileges,$link_url)
  {
    foreach ($user_privileges as $value){
        foreach($value as $val){
            if($link_url == 'admin/home' || $val['url'] == $link_url){
               return true;
            }
        }
    }
  }


  function pdf_path()
  {
     return '/var/www/e-registration.bscic.gov.bd/public_html/public/uploads/';
     //   return 'http://localhost/bscic/public/uploads/';

  }

  function user_log($description,$url)
  {

    $data=[
        'ip_address'=>$_SERVER['REMOTE_ADDR'],
        'description'=>$description,
        'url'=>base_url().$url
    ];


    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->insertLog($data,'users_log');



  }

  function office()
  {
   $ci = &get_instance();
   $ci->load->model('Common_tasks');
   return $ci->Common_tasks->listOffice();
  }

  function section()
  {
   $ci = &get_instance();
   $ci->load->model('Common_tasks');
   return $ci->Common_tasks->listSection();
  }

  function emp_type()
  {
   $ci = &get_instance();
   $ci->load->model('Common_tasks');
   return $ci->Common_tasks->emp_type_list();
  }

  function office_category()
  {
   $ci = &get_instance();
   $ci->load->model('Common_tasks');
   return $ci->Common_tasks->listOfficeCategory();
  }

  function officeByCat($id)
  {
   $ci = &get_instance();
   $ci->load->model('Common_tasks');
   return $ci->Common_tasks->listOfficeByTypeId($id);
  }


function defaultOption()
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listCommon();
}

function divisionOption(){
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listDivision();
}

function districtOption(){
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listDistrict();
}

function upazilaOption(){
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listUpazila();
}

function getOptionDistrictbyDivision($div)
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listDistrictbydiv($div);
}
function getUpazilaByDivisionDistrict($div,$dis)
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listUpazilaByDivDis($div,$dis);
}

//Thana master
function getOptionthana($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listThana($id);
}

function getOfficeByTypeId($id){
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listOfficeByTypeId($id);
}

function getOptiontModule()
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listModule();
}

function fiscal_year(){
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listFiscalyear();
}


function getOptionDepartment()
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listDepartment();
}

function getOptionDesignation()
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listDesignation();
}

function getOptionBusinessType()
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listBusinessType();
}


function getOptionIndustryType()
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listIndustryType();
}

function getOptionIndustryTypeBangla()
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listIndustryTypeBangla();
}

function getOptionIndustryTypeEnglish()
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listIndustryTypeEnglish();
}



function getInspectorList()
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listInspector();
}

function getRoles()
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listRoles();
}

function getRegionName($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->regionName($id);
}


function topic()
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listBlogTopic();
}

function getServiceType(){
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->listServiceType();
}

function month($withTitle = false)
{
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn") {
        $array = array(
            ' ' => '----- নির্বাচন করুন -----',
            '01' => 'জানুয়ারী',
            '02' => 'ফেব্রুয়ারী',
            '03' => 'মার্চ',
            '04' => 'এপ্রিল',
            '05' => 'মে',
            '06' => 'জুন',
            '07' => 'জুলাই',
            '08' => 'আগস্ট',
            '09' => 'সেপ্টেম্বর',
            '10' => 'অক্টোবর',
            '11' => 'নভেম্বর',
            '12' => 'ডিসেম্বর'
        );
    }else{
        $array = array(
            ' ' => '----- Select -----',
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        );
    }
    return $array;
}

function monthBangla($withTitle = false)
{
    $ci = &get_instance();
        $array = array(
            '' => '----- নির্বাচন করুন -----',
            '01' => 'জানুয়ারী',
            '02' => 'ফেব্রুয়ারী',
            '03' => 'মার্চ',
            '04' => 'এপ্রিল',
            '05' => 'মে',
            '06' => 'জুন',
            '07' => 'জুলাই',
            '08' => 'আগস্ট',
            '09' => 'সেপ্টেম্বর',
            '10' => 'অক্টোবর',
            '11' => 'নভেম্বর',
            '12' => 'ডিসেম্বর'
        );
   
    return $array;
}

function monthEnglish($withTitle = false)
{
    $ci = &get_instance();
         $array = array(
            ' ' => '----- Select -----',
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        );
    return $array;
}

function number_format_short( $n, $precision = 1 ) {
    if ($n < 900) {
        // 0 - 900
        $n_format = number_format($n, $precision);
        $suffix = '';
    } else if ($n < 900000) {
        // 0.9k-850k
        $n_format = number_format($n / 1000, $precision);
        $suffix = 'K';
    } else if ($n < 900000000) {
        // 0.9m-850m
        $n_format = number_format($n / 1000000, $precision);
        $suffix = 'M';
    } else if ($n < 900000000000) {
        // 0.9b-850b
        $n_format = number_format($n / 1000000000, $precision);
        $suffix = 'B';
    } else {
        // 0.9t+
        $n_format = number_format($n / 1000000000000, $precision);
        $suffix = 'T';
    }

  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
    if ( $precision > 0 ) {
        $dotzero = '.' . str_repeat( '0', $precision );
        $n_format = str_replace( $dotzero, '', $n_format );
    }

    return $n_format . $suffix;
}       


if ( ! function_exists('file_url'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function file_url($uri = '', $protocol = NULL)
	{
		return get_instance()->config->site_url('public/uploads/'.$uri, $protocol);
	}
}

if ( ! function_exists('text_format'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function text_format($user_string = '', $total_lenght)
	{
        $str_length=strlen($user_string);
        if( $str_length>$total_lenght){
            $stringCut = substr($user_string, 0, $total_lenght);
            $endPoint = strrpos($stringCut, ' ');
        
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            return  $string .' ......';
        }else{
            return $user_string;
        }

        
	}
}

if ( ! function_exists('time_ago'))
{
    function time_ago($date) {
        date_default_timezone_set ("Asia/Dhaka");

            $timestamp = strtotime($date);
            $difference = time() - $timestamp;
            $periods = array("sec", "min", "hour", "day", "week", "month", "year", "decade");
            $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
    
            if ($difference > 0) { // this was in the past time
                $ending = "ago";
            } else { // this was in the future time
                $difference = -$difference;
                $ending = "to go";
            }
            
            for ($j = 0; $difference >= $lengths[$j]; $j++)
                $difference /= $lengths[$j];
            
            $difference = round($difference);
            
            if ($difference > 1)
                $periods[$j].= "s";
            
            $text = "$difference $periods[$j] $ending";
            
            return $text;
       
    }
}


if ( ! function_exists('getDistrictName'))
{
    function getDistrictName($id)
    {
        $ci = &get_instance();
        $ci->load->model('Common_tasks');
        return $ci->Common_tasks->getDistrictName($id);
    }
}
if ( ! function_exists('niceDate'))
{
    function niceDate($id)
    {
        return $id;
    }
}

function getAdditionalDocument($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->getAdditionalDocuments($id);
}

function getFees($contact_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_tasks');
    return $ci->Common_tasks->getFeesData($contact_id);
}



/*******************************************************************************/
                            //irrigation module functions
                            //irrigation module functions
                            //irrigation module functions
/*******************************************************************************/



//end
