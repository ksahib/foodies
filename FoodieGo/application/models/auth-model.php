<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function login($username, $password) {
        // Sanitize inputs
        $username = mysqli_real_escape_string($this->db, $username);
        $password = mysqli_real_escape_string($this->db, $password);

        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($this->db, $query);

        if (mysqli_num_rows($result) > 0) {
            $admin = mysqli_fetch_assoc($result);
            return [
                'status' => true,
                'user_data' => $admin,
                'role' => 'admin'
            ];
        }

        // Check in orders table for customer login (using email)
        $query = "SELECT DISTINCT customer_name, customer_email FROM `order` 
                 WHERE customer_email = '$username'";
        $result = mysqli_query($this->db, $query);

        if (mysqli_num_rows($result) > 0) {
            $customer = mysqli_fetch_assoc($result);
            return [
                'status' => true,
                'user_data' => $customer,
                'role' => 'customer'
            ];
        }

        return ['status' => false];
    }

    public function is_logged_in() {
        return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
    }

    public function get_user_role() {
        return $_SESSION['user_role'] ?? null;
    }
}