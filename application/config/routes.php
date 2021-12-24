<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['products/add']['GET'] = 'Frontend/ProductController/create';
$route['products/add']['POST'] = 'Frontend/ProductController/store';

$route['products/index']['GET'] = 'Frontend/ProductController/visible';

$route['products/add-category']['GET'] = 'Frontend/CategoryController/make';
$route['products/add-category']['POST'] = 'Frontend/CategoryController/addCategory';

$route['products/edit/(:any)'] = 'Frontend/ProductController/edit/$1';

$route['products/delete/(:any)']['GET'] = 'Frontend/ProductController/delete/$1';
$route['products/buyed/(:any)']['GET'] = 'Frontend/ProductController/buyed/$1';


