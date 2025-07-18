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
$route['default_controller'] = 'user';
$route['query'] = 'home/user_query';
$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;

//User Routes
$route['item/add'] = 'home/add_item';
$route['item/list'] = 'home/list_item';
$route['user/add'] = 'user/add_user';
$route['user/list'] = 'user/list_users';
$route['vendor/add'] = 'vendor/add_vendor';
$route['vendor/list'] = 'vendor/list_vendors';
$route['cash/list/entries'] = 'cash/list_entries';
$route['user/disabled/list'] = 'user/list_disabled_users';
$route['item/edit/(:any)'] = 'home/edit_item/$1';
$route['cash/entry/edit/(:any)'] = 'cash/edit_entry/$1';
$route['user/edit/(:any)'] = 'user/edit_user/$1';
$route['vendor/entries/(:any)'] = 'vendor/list_vendors_entries/$1';
$route['vendor/disabled'] = 'vendor/list_disabled_vendor';
$route['vendor/edit/(:any)'] = 'vendor/edit_vendor/$1';
$route['logout'] = 'user/logout';
$route['login'] = 'user';
$route['loggedout'] = 'user/logged_out';
$route['changePassword'] = 'user/change_password';
$route['dashboard'] = 'home';


//invoices 
$route['Add/Invoice'] = 'invoices/view_invoice_entry';
$route['view/Seller/Invoice'] = 'invoices/list_invoice';
$route['view/Buyer/Invoice'] = 'invoices/list_invoice';
$route['view/Pending/Invoice'] = 'invoices/list_pending_invoices';
$route['Invoice/Edit/(:any)'] = 'invoices/view_edit_invoice_entry/$1';
$route['Invoice/Generate/(:any)'] = 'invoices/generate_invoice_by_hashval/$1';

//Reports
$route['Report/Cash'] = 'report/view_cash_report_by_dates';
$route['Report/Invoice'] = 'report/view_invoice_report_by_dates';
