<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	= 'home';
$route['admin']					='admin/dashboard';
$route['admin/logout']			='login/logout';
$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;
