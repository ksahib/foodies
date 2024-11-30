<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {
    private $auth_model;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        require_once __DIR__ . '/../models/auth-model.php';
        $this->auth_model = new Auth_model();
    }

    public function login() {
        // If already logged in, redirect to appropriate page
        if ($this->auth_model->is_logged_in()) {
            $role = $this->auth_model->get_user_role();
            header("Location: " . ($role === 'admin' ? 'admin/add-food' : 'menu'));
            exit();
        }

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                $error = "Please fill in all fields";
            } else {
                $result = $this->auth_model->login($username, $password);

                if ($result['status']) {
                    $_SESSION['user_id'] = $result['user_data']['id'] ?? $result['user_data']['customer_email'];
                    $_SESSION['username'] = $result['user_data']['username'] ?? $result['user_data']['customer_name'];
                    $_SESSION['user_role'] = $result['role'];

                    header("Location: " . ($result['role'] === 'admin' ? 'admin/add-food' : 'menu'));
                    exit();
                } else {
                    $error = "Invalid username or password";
                }
            }
        }

        // Load the login view
        require_once __DIR__ . '/../views/auth/login.php';
    }

    public function logout() {
        session_destroy();
        header("Location: login");
        exit();
    }
}