<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Site URL
define('SITEURL', 'http://localhost/FoodieGo/');

// Base URL
$config['base_url'] = SITEURL;

// Index File
$config['index_page'] = '';

// Session Variables
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'foodiego_session';
$config['sess_expiration'] = 7200;

// Upload Paths
$config['upload_path'] = './assets/images/food/';
$config['allowed_types'] = 'gif|jpg|png';
$config['max_size'] = 2048;

// Error Reporting
$config['log_threshold'] = 1;
$config['log_path'] = '';
$config['log_file_extension'] = '';

// Security
$config['encryption_key'] = 'your-secret-key';
$config['csrf_protection'] = TRUE;
$config['csrf_token_name'] = 'csrf_token';
$config['csrf_cookie_name'] = 'csrf_cookie';
?>