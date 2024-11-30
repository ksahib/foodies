<?php
// Define BASEPATH to allow direct script access
define('BASEPATH', true);

session_start();
require_once 'application/config/config.php';
require_once 'system/database/DB_config.php';

// Get the requested URL
$request = $_SERVER['REQUEST_URI'];
$base_path = '/FoodieGo/';
$request = str_replace($base_path, '', $request);

// Basic routing
switch ($request) {
    case '':
    case '/':
        require 'application/controllers/food.php';
        $controller = new Food();
        $controller->menu();
        break;
    
    case 'login':
        require 'application/controllers/auth.php';
        $controller = new Auth();
        $controller->login();
        break;
        
    case 'logout':
        require 'application/controllers/auth.php';
        $controller = new Auth();
        $controller->logout();
        break;
        
    default:
        http_response_code(404);
        require 'application/views/404.php';
        break;
}