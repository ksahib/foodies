<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel {
    private $conn;

    public function __construct() {
        // Include database configuration
        require_once __DIR__ . '/../../system/database/DB_config.php';
        $dbInstance = Database::getInstance();
        $this->conn = $dbInstance->getConnection();
    }

    /**
     * Insert a new order into the database.
     *
     * @param array $data Order data to be inserted.
     * @return bool True if the order was inserted successfully, false otherwise.
     */
    public function insertOrder($data) {
        // Remove the id field from the insert statement as it's auto-incremented
        $sql = "INSERT INTO `order` 
                (food, price, qty, total, customer_name, customer_contact, customer_email, customer_address, order_date, status)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";

        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            error_log("Error preparing SQL statement: " . $this->conn->error);
            return false;
        }

        // Correct number of bind parameters (9 variables)
        $stmt->bind_param(
            "isidsssss",
            $data['food_name'],      // string
            $data['price'],          // decimal
            $data['quantity'],       // int
            $data['total_price'],    // decimal
            $data['customer_name'],  // string
            $data['contact'],        // string
            $data['email'],          // string
            $data['address'],        // string
            $data['status']          // string
        );

        $result = $stmt->execute();
        if (!$result) {
            error_log("Error executing SQL query: " . $stmt->error);
        }

        $stmt->close();
        return $result;
    }
}
