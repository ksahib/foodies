<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'DB_config.php';

class Order {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Place an order
    public function placeOrder($userId, $menuItems) {
        $query = "INSERT INTO orders (user_id, order_date, status) VALUES (?, NOW(), 'pending')";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userId);

        if ($stmt->execute()) {
            $orderId = $this->db->insert_id;

            foreach ($menuItems as $item) {
                $query = "INSERT INTO order_items (order_id, menu_item_id, quantity) VALUES (?, ?, ?)";
                $stmt = $this->db->prepare($query);
                $stmt->bind_param("iii", $orderId, $item['menu_item_id'], $item['quantity']);
                $stmt->execute();
            }
            return json_encode(["success" => true, "message" => "Order placed successfully!", "order_id" => $orderId]);
        } else {
            return json_encode(["success" => false, "message" => "Failed to place order: " . $this->db->error]);
        }
    }

    // Cancel an order
    public function cancelOrder($orderId, $userId) {
        $query = "UPDATE orders SET status = 'cancelled' WHERE id = ? AND user_id = ? AND status = 'pending'";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $orderId, $userId);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                return json_encode(["success" => true, "message" => "Order cancelled successfully."]);
            } else {
                return json_encode(["success" => false, "message" => "Order cannot be cancelled (might already be processed or invalid order)."]);
            }
        } else {
            return json_encode(["success" => false, "message" => "Failed to cancel order: " . $this->db->error]);
        }
    }
}
?>
