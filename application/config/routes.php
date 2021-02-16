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
$route['default_controller'] = 'main_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// routing
// (untuk meng-hide controller-name)

$route[''] = 'main_controller/index';

$route['nama_event'] = 'main_controller/redirect_register';

$route['visitor'] = 'main_controller/index_visitor';
$route['visitor/register'] = 'main_controller/page_register_visitor';
$route['visitor/logout'] = 'main_controller/visitor_logout';

$route['staff_only'] = 'main_controller/index_staff';
$route['staff_only/login'] = 'main_controller/page_login_staff';
$route['staff_only/admin/home'] = 'staff_controller/page_admin_dashboard';
$route['staff_only/admin/tracking'] = 'staff_controller/page_admin_tracking';
$route['staff_only/admin/report'] = 'staff_controller/page_admin_report';
$route['staff_only/admin/daftar_event'] = 'staff_controller/page_admin_event_management';
$route['staff_only/admin/daftar_staff'] = 'staff_controller/page_admin_daftar_staff';
$route['staff_only/admin/data_list'] = 'staff_controller/page_admin_data_list';
$route['staff_only/admin/logout'] = 'staff_controller/logout';

$route['staff_only/admin/aktivasi_event_otomatis'] = 'staff_controller/event_aktivasi_otomatis';

$route['staff_only/petugas/scan'] = 'staff_controller/page_petugas_scan';
$route['staff_only/petugas/logout'] = 'staff_controller/logout';

$route['staff_only/admin/crud_staff/(:any)/(:any)'] = 'staff_controller/crud_staff/$1/$2';
$route['staff_only/admin/crud_event/(:any)/(:any)'] = 'staff_controller/crud_event/$1/$2';
$route['staff_only/admin/tambah_staff'] = 'staff_controller/tambah_staff';
// $route['staff_only/admin/hapus_staff'] = 'staff_controller/hapus_staff/';

$route['staff_only/petugas/scan/(:any)/(:any)'] = 'staff_controller/petugas_scan/$1/$2';

