<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Pagination Class
 *
 * @package   CodeIgniter
 * @link      http://codeigniter.com/user_guide/libraries/pagination.html
 * 
 * Modified by CodexWorld.com
 * @Ajax pagination functionality has added with this library. 
 * @It will helps to integrate Ajax pagination with loading image in CodeIgniter application.
 * @TutorialLink http://www.codexworld.com/ajax-pagination-in-codeigniter-framework/
 */
class Converter {
  public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", ",", ".");
    public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", ",", ".");
    
    public static function bn_to_en($number) {
        return str_replace(self::$bn, self::$en, $number);
    }
    
    public static function en_to_bn($number) {
        return str_replace(self::$en, self::$bn, $number);
    }

    public static function convert_number($number, $language) {
        if($language == 'bn'){
            return str_replace(self::$en, self::$bn, $number);
        }
        else {
            return $number;
        }
    }

    public static function convert_column_name($column_name, $language) {
        if($language == 'bn'){
            return $column_name.'_BN';
        }
        else {
            return $column_name;
        }
    }
	
	public static function dateConvert($date){
		if($date==""){
			return false;
		}
		else{
			
		//date_default_timezone_set("UTC");
		//$dateInteger = strtotime($date);
		@$explode = explode("-",$date);
		$new_date = $explode[2]."/".$explode[1]."/".$explode[0];
		//$newDate = date("d-m-Y",$dateInteger);
		return $new_date;
		}
		
	}

    
}


