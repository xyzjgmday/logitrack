<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'login';
$route['404_override'] = 'errors';
$route['translate_uri_dashes'] = FALSE;

//data-users
$route['data-users/(:any)/(:any)'] = "master/user/$1/$2";
$route['data-users/([^/]+)'] = "master/user/$1";
$route['data-users'] = "master/user";

//patients
$route['patients/(:any)/(:any)'] = "pasien/$1/$2";
$route['patients/([^/]+)'] = "pasien/$1";
$route['patients'] = "pasien";

//pharmacy
$route['pharmacy/drugs(:any)/(:any)'] = "apotek/$1/$2";
$route['pharmacy/drugs/insert'] = "apotek/insert";
$route['pharmacy/drugs'] = "apotek";

//poliumum
$route['appointment/general/([^/]+)'] = "rawat_jalan/index_general/$1";
$route['appointment/general'] = "rawat_jalan/index_general";


//poligigi
$route['appointment/dentistry/([^/]+)'] = "rawat_jalan/index_dentistry/$1";
$route['appointment/dentistry'] = "rawat_jalan/index_dentistry";

//registrasi
$route['appointment/registration'] = "rawat_jalan/registration";

//medical-record
$route['medical-record/resume/([^/]+)'] = "rekam_medis/index/$1";
$route['medical-record/resume'] = "rekam_medis/index";
$route['medical-record/create/([^/]+)'] = "rekam_medis/create/$1";
$route['medical-record/submit'] = "rekam_medis/submit";

//rekam-medic
$route['medical-record/vital-sign'] = "rekam_medis/kajian_awal";