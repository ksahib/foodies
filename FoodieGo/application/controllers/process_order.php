<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ . '/../models/order-model.php';

class ProcessOrder {
    private $order_model;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->order_model = new OrderModel();
    }

    public function order() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collect and validate POST data
            $food_id = $_POST['food_id'] ?? '';
            $food_name = $_POST['food'] ?? '';
            $price = $_POST['price'] ?? '';
            $quantity = $_POST['qty'] ?? '';
            $customer_name = $_POST['full_name'] ?? '';
            $contact = $_POST['contact'] ?? '';
            $email = $_POST['email'] ?? '';
            $address = $_POST['address'] ?? '';
            
            if (
                empty($food_id) || empty($food_name) || empty($price) ||
                empty($quantity) || empty($customer_name) || 
                empty($contact) || empty($email) || empty($address)
            ) {
                echo "All fields are required!";
                exit();
            }

            // Calculate total price
            $total_price = $price * $quantity;

            // Insert order using the model
            $result = $this->order_model->insertOrder([
                'food_id' => $food_id,
                'food_name' => $food_name,
                'price' => $price,
                'quantity' => $quantity,
                'total_price' => $total_price,
                'customer_name' => $customer_name,
                'contact' => $contact,
                'email' => $email,
                'address' => $address,
                'status' => 'Pending'
            ]);

            if ($result) {
                echo "Order placed successfully!";
                header('Location: ' . SITEURL . '/');
                exit();
            } else {
                echo "Failed to place order. Please try again.";
            }
        } else {
            header("Location: " . SITEURL.'/');
            exit();
        }
    }
}
