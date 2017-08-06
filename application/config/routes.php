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
$route['default_controller'] = 'student';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Admin Pages
$route['admin'] = 'admin/login';
$route['admin/index.php'] = 'admin/login';
$route['admin/profile/update'] = 'admin/update';
$route['admin/establishment/view/(:any)'] = 'admin/view_establishment/$1';
$route['admin/establishment/view/(:any)/edit'] = 'admin/edit_establishment/$1';
$route['admin/establishment/view/(:any)/delete'] = 'admin/delete_establishmentInfo/$1';
$route['admin/announcements/view/(:any)'] = 'admin/view_announcement/$1';
$route['admin/announcements/view/(:any)/edit'] = 'admin/edit_announcement/$1';
$route['admin/announcements/view/(:any)/delete'] = 'admin/delete_announcement/$1';
$route['admin/announcements/add'] = 'admin/add_announcement';
$route['admin/announcements/types'] = 'admin/announcement_type';
$route['admin/announcements/types/add'] = 'admin/add_announcementType';
$route['admin/announcements/types/edit/(:any)'] = 'admin/edit_announcementType/$1';
$route['admin/announcements/types/delete/(:any)'] = 'admin/delete_announcementType/$1';
$route['admin/settings/change_password'] = 'admin/change_password';

//Students and Visitors Pages
$route['map_directory'] = 'student/maps';
$route['ajaxPaginationData'] = 'student/ajaxPaginationData';
$route['announcement_main'] = 'student/announcement_main';
