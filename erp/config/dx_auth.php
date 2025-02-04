<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/*
 ************************************************************************************************************
 *																											*
 * 		Authentication library for Code Igniter.															*
 * 		@File Type		DX Auth Config																		*
 * 		@Author			Kazi Sanchoy Ahmed	(B.Sc in CSE)					                             	*
 * 		@Email			sanchoy7@gmail.com			                                                        *
 *		@Profession		Web Application Developer & Programmer												*
 * 		@Based on		CL Auth by Jason Ashdown (http://http://www.jasonashdown.co.uk/)					*
 *																											*
 ************************************************************************************************************
*/

/*
|--------------------------------------------------------------------------
| Website details
|--------------------------------------------------------------------------
|
| These details are used in email sent by DX Auth library.
|
*/


/*
|--------------------------------------------------------------------------
| Database table
|--------------------------------------------------------------------------
|
| Determines table that used by DX Auth.
|
| 'DX_table_prefix' allows you to specify table prefix that will be use by the rest of the table. 
|
| For example specifying 'DX_' in 'DX_table_prefix' and 'users' in 'DX_users_table',
| will make DX Auth user 'DX_users' as users table.
|
*/
/// User, Admin & Super Admin COntrol Tables
$config['DX_table_prefix'] 			= '';
$config['DX_users_table'] 			= 'users';
$config['DX_user_profile_table'] 	= 'user_profile';
$config['DX_user_temp_table'] 		= 'user_temp';
$config['DX_user_autologin'] 		= 'user_autologin';
$config['DX_roles_table'] 			= 'roles';
$config['DX_permissions_table'] 	= 'permissions';
$config['DX_login_attempts_table'] 	= 'login_attempts';

//Wing Office ID
$config['FinanceOffice'] 	= '5';

//Office ID
$config['FinanceOfficeId'] 	= '3';
$config['AccountsDivision'] = '2';
$config['gmDesiId'] 	= '7';
$config['fertilizerWing'] 	= '2';


/*
|--------------------------------------------------------------------------
| Password salt
|--------------------------------------------------------------------------
|
| You can add major salt to be hashed with password. 
| For example, you can get salt from here: https://www.grc.com/passwords.htm
|
| Note: 
|
| Keep in mind that if you change the salt value after user registered, 
| user that previously registered cannot login anymore.
|
*/

$config['DX_salt'] = '';
$config['DX_per_page'] = 20;

/*
|--------------------------------------------------------------------------
| Registration related settings
|--------------------------------------------------------------------------
|
| 'DX_email_activation' = Requires user to activate their account using email after registration.
| 'DX_email_activation_expire' = Time before users who don't activate their account getting deleted from database. Default is 48 Hours (60*60*24*2).
| 'DX_email_account_details' =  Email account details after registration, only if 'DX_email_activation' is FALSE.
|
*/
 
$config['DX_email_activation'] 	  	  = FALSE; 
$config['DX_email_activation_expire'] = 60*60*24*200; 
$config['DX_email_account_details']   = FALSE; 

/*
|--------------------------------------------------------------------------
| Login settings
|--------------------------------------------------------------------------
|
| 'DX_login_using_username' = Determine if user can use username in username field to login.
| 'DX_login_using_email' = Determine if user can use email in username field to login.
|
| You have to set at least one of settings above to TRUE. 
|
| 'DX_login_record_ip' = Determine if user IP address should be recorded in database when user login.
| 'DX_login_record_time' = Determine if time should be recorded in database when user login.
|
*/

$config['DX_login_using_username'] = TRUE;
$config['DX_login_using_email']    = TRUE;
$config['DX_login_record_ip'] 	   = TRUE;
$config['DX_login_record_time']    = TRUE;

/*
|--------------------------------------------------------------------------
| Auto login settings
|--------------------------------------------------------------------------
| 'DX_autologin_cookie_name' = Determine auto login cookie name.
| 'DX_autologin_cookie_life' = Determine auto login cookie life before expired. Default is 2 months (60*60*24*31*2).
*/

$config['DX_autologin_cookie_name'] = 'autologin';
$config['DX_autologin_cookie_life'] = 60*60*24*31*2;

/*
|--------------------------------------------------------------------------
| Login attempts
|--------------------------------------------------------------------------
|
| 'DX_count_login_attempts' = Determine if DX Auth should count login attempt when user failed to login.
| 'DX_max_login_attempts' =  Determine max login attempt before function is_login_attempt_exceeded() returning TRUE.
|
*/

$config['DX_count_login_attempts'] = TRUE;
$config['DX_max_login_attempts']   = 50; 

/*
|--------------------------------------------------------------------------
| Forgot password settings
|--------------------------------------------------------------------------
|
| 'DX_forgot_password_expire' = Time before forgot password key become invalid. Default is 15 minutes (900 seconds).
|
*/

$config['DX_forgot_password_expire'] = 900;

/*
|--------------------------------------------------------------------------
| Captcha
|--------------------------------------------------------------------------
|
| You can set catpcha that created by DX Auth library in here.
| 'DX_captcha_directory' = Directory where the catpcha will be created. 
| 'DX_captcha_fonts_path' = Font in this directory will be used when creating captcha.
| 'DX_captcha_font_size' = Font size when writing text to captcha. Leave blank for random font size.
| 'DX_captcha_grid' = Show grid in created captcha.
| 'DX_captcha_expire' = Life time of created captcha before expired, default is 3 minutes (180 seconds).
| 'DX_captcha_expire' = Determine captcha case sensitive or not.
|
*/

$config['DX_captcha_path'] 			 = './captcha/';
$config['DX_captcha_fonts_path'] 	 = $config['DX_captcha_path'].'fonts'; 
$config['DX_captcha_width'] 		 = 210;
$config['DX_captcha_height'] 		 = 40;
$config['DX_captcha_font_size'] 	 = ''; 
$config['DX_captcha_grid'] 			 = TRUE;
$config['DX_captcha_expire'] 		 = 180; 
$config['DX_captcha_case_sensitive'] = TRUE; 

/*
|--------------------------------------------------------------------------
| reCAPTCHA
|--------------------------------------------------------------------------
|
| If you are planning to use reCAPTCHA function, you have to set reCAPTCHA key here
| You can get the key by registering at http://recaptcha.net
|
*/

$config['DX_recaptcha_public_key']  = ''; 
$config['DX_recaptcha_private_key'] = '';


/*
|--------------------------------------------------------------------------
| URI
|--------------------------------------------------------------------------
|
| Determines URI that used for redirecting in DX Auth library.
| 'DX_deny_uri' = Forbidden access URI.
| 'DX_login_uri' = Login form URI.
| 'DX_activate_uri' = Activate user URI.
| 'DX_reset_password_uri' = Reset user password URI.
|
| These value can be accessed from DX Auth library variable, by removing 'DX_' string.
| For example you can access 'DX_deny_uri' by using $this->dx_auth->deny_uri in controller.
|
*/
// URI Locations
$config['DX_deny_uri'] 			 	= 'auth/deny/';
$config['DX_login_uri'] 		 	= 'home/';
$config['DX_banned_uri'] 		 	= 'home/';
$config['DX_activate_uri'] 		 	= 'auth/activate/';
$config['DX_logout_uri'] 		  	= 'auth/logout/';
$config['DX_register_uri'] 		  	= 'auth/register/';
$config['DX_seeker_register_uri'] 	= 'auth/seeker_register/';
$config['DX_admin_reg_uri'] 	  	= 'auth/admin_reg/';
$config['DX_forgot_password_uri'] 	= 'auth/forgot_password/';
$config['DX_reset_password_uri']  	= 'auth/reset_password/';
/*
|--------------------------------------------------------------------------
| Helper configuration
|--------------------------------------------------------------------------
|
| Configuration below is actually not used in function in DX_Auth library.
|	They just used to help you coding more easily in controller.
|	You can set it to blank if you don't need it, or even delete it.
|
| However they can be accessed from DX Auth library variable, by removing 'DX_' string.
| For example you can access 'DX_register_uri' by using $this->dx_auth->register_uri in controller.
|
*/

// Registration
$config['DX_allow_registration']   		= TRUE; 
$config['DX_captcha_registration'] 		= FALSE;

// Login
$config['DX_captcha_login'] 			= FALSE;

// Message Notifiers Page..View
$config['DX_general_notification_view'] = 'auth/general_message';
$config['DX_student_home_uri'] 			= 'student/backend/';
$config['DX_visitor_home_uri'] 			= 'visitor/backend/';

$config['DX_admin_home_uri'] 			= 'welcome/dashboard';
$config['DX_superadmin_home_uri'] 		= 'super/backend/';
$config['DX_teacher_home_uri'] 		    = 'teacher/backend/';
$config['DX_job_post_home_uri']		    = 'job_post/backend/';
$config['DX_bidders_home_uri'] 		    = 'bidder/backend/';
$config['DX_inventory_home_uri'] 		= 'inventory/backend/';
$config['DX_journal_home_uri'] 		    = 'journal/backend/';
$config['DX_officer_home_uri'] 		    = 'officer/backend/';
$config['DX_coordinator_home_uri'] 		= 'teacher/backend/';

$config['DX_log_uri'] 		= 'http://www.softdemo.net/security_soft/soft_connect';
// Forms view
$config['DX_shome_view']   		   		= 'pages/home';
$config['DX_login_view']   		   		= 'auth/login_form';
$config['DX_register_view'] 	   		= 'auth/register_form';
$config['DX_seeker_register_view'] 	   	= 'auth/seeker_register_form';

$config['DX_admin_reg_view'] 	   		= 'auth/admin_reg_form';
$config['DX_reg_recaptcha_view']   		= 'auth/register_recaptcha_form';
$config['DX_forgot_password_view'] 		= 'auth/forgot_password_form';



?>