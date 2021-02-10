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
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['konsumen'] = 'konsumen/overview';
$route['bengkel'] = 'bengkel/overview';
$route['admin'] = 'admin/overview';
//
$route['konsumen/service/(:any)']           = 'konsumen/kendaraan/getService/$1';
$route['konsumen/lokasi_service/(:any)']    = 'konsumen/kendaraan/getLokasi/$1';
$route['konsumen/add_service']              = 'konsumen/kendaraan/store';
$route['konsumen/daftar_bengkel']           = 'konsumen/kendaraan/daftarBengkel';
$route['konsumen/detail_bengkel/(:any)']    = 'konsumen/kendaraan/detailBengkel/$1';
$route['konsumen/add_bengkel']              = 'konsumen/kendaraan/storeBengkel';
$route['konsumen/input_keluhan']            = 'konsumen/kendaraan/keluhan';
//
$route['konsumen/order']                    = 'konsumen/order/store';
//
$route['konsumen/servis/data_servis']              = 'konsumen/order/index';
$route['konsumen/servis/detail_servis/(:any)']     = 'konsumen/order/getDetail/$1';
$route['konsumen/servis/review/(:any)']            = 'konsumen/order/review/$1';
$route['konsumen/servis/add_review']                  = 'konsumen/Order/addReview';
//bengkel
$route['bengkel/servis/data_servis']                = 'bengkel/ServisController/index';
$route['bengkel/servis/proses_servis/(:any)']        = 'bengkel/ServisController/verifikasiServis/$1';
$route['bengkel/servis/selesai_servis/(:any)']       = 'bengkel/ServisController/selesaiService/$1';
$route['bengkel/servis/review/(:any)']               = 'bengkel/ServisController/review/$1';
$route['bengkel/servis/detail_servis/(:any)']       = 'bengkel/ServisController/getDetail/$1';
$route['bengkel/servis/update_mesin']       = 'bengkel/ServisController/mesin';
