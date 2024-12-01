<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order {
    private $db;
    
    public function __construct() {
        // Get database connection using singleton pattern
        $database = Database::getInstance();
        $this->db = $database->getConnection();
    }
    
    public function cancel() {
        // Database query for active food items
        // $sql = "SELECT f.*, c.title as category_name 
        // FROM food f 
        // LEFT JOIN category c ON f.category_id = c.id 
        // WHERE f.active='Yes'";
        // $result = mysqli_query($this->db, $sql);
        
        // // Prepare data for the view
        // $food_items = [];
        // if ($result) {
        //     while ($row = mysqli_fetch_assoc($result)) {
        //         $food_items[] = $row;
        //     }
        // }
        
        // // Load the view with data
        // $data['food_items'] = $food_items;
        // $data['siteurl'] = SITEURL;
        // extract($data); // This makes variables available to the view
        require_once 'application/views/order/cancel.php';
    }
    
    public function details($id) {
        $id = mysqli_real_escape_string($this->db, $id);
        $sql = "SELECT f.*, c.title as category_name 
        FROM food f 
        LEFT JOIN category c ON f.category_id = c.id 
        WHERE f.id='$id' AND f.active='Yes'";        $result = mysqli_query($this->db, $sql);
        $food_item = mysqli_fetch_assoc($result);
        
        if (!$food_item) {
            header("Location: " . SITEURL . "404");
            exit;
        }
        
        $data['food_item'] = $food_item;
        $data['siteurl'] = SITEURL;
        extract($data); // This makes variables available to the view
        require_once 'application/views/order/details.php';
    }
}