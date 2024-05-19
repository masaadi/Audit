<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome/index';
//$route['default_controller'] = 'siteadmin/login';
// $route['hr/menu/page_data/(:any)'] = "hr/menu/paginate_data/$1";

$route['hr/abc'] = "hr/emp_variety_report";
// $route['hr/emp_variety_report'] = "hr/emp_variety_report/getReport";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/new-application'] = "admin/application/new";
$route['new_application/page_data/(:any)'] = "admin/application/new_page_data/$1";
$route['admin/renew-application'] = "admin/application/re_new";
$route['renew_application/page_data/(:any)'] = "admin/application/renew_page_data/$1";
$route['admin/resubmission'] = "admin/application/resubmission";
$route['resubmission/page_data/(:any)'] = "admin/application/resubmission_page_data/$1";
$route['application/preview/(:any)'] = "admin/application/preview/$1";
$route['admin/application-management'] = "admin/application/review_application";
$route['admin/review_app_page_data/(:any)'] = "admin/application/review_app_page_data/$1";
$route['admin/approved-application'] = "admin/application/approved_application";
$route['admin/approved_app_page_data/(:any)'] = "admin/application/approved_app_page_data/$1";

$route['admin/users'] = "admin/application/users";
$route['admin/users/page_data/(:any)'] = "admin/application/users_page_data/$1";



$route['application/preview-pdf/(:any)'] = "admin/application/generatePreviewPdf/$1";


$route['certificate/preview/(:any)'] = "admin/certificate/preview/$1";
$route['certificate/preview-pdf/(:any)'] = "admin/certificate/generatePreviewPdf/$1";



$route['success/payment'] = "applicant/payment/success";
$route['decline/payment'] = "applicant/payment/decline";
$route['cancel/payment'] = "applicant/payment/cancel";

$route['send_msg'] = "api/sendSingleSMS";






