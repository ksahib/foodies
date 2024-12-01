<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/FoodieGo/system/database/DB_config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbInstance = Database::getInstance();
$conn = $dbInstance->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $food_id = isset($_POST['food_id']) ? mysqli_real_escape_string($conn, $_POST['food_id']) : '';
    $food_name = isset($_POST['food']) ? mysqli_real_escape_string($conn, $_POST['food']) : '';
    $price = isset($_POST['price']) ? mysqli_real_escape_string($conn, $_POST['price']) : '';
    $quantity = isset($_POST['qty']) ? mysqli_real_escape_string($conn, $_POST['qty']) : '';
    $total_price = $price * $quantity; // Calculate total price
    $customer_name = isset($_POST['full_name']) ? mysqli_real_escape_string($conn, $_POST['full_name']) : '';
    $contact = isset($_POST['contact']) ? mysqli_real_escape_string($conn, $_POST['contact']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';

    if (empty($food_id) || empty($food_name) || empty($price) || empty($quantity) || empty($customer_name) || empty($contact) || empty($email) || empty($address)) {
        echo "All fields are required!";
        exit();
    }

    $sql = "INSERT INTO `order` (id, food, price, qty, total, customer_name, customer_contact, customer_email, customer_address, order_date, status) 
            VALUES ('$food_id', '$food_name', '$price', '$quantity', '$total_price', '$customer_name', '$contact', '$email', '$address', NOW(), 'Pending')";

    if (mysqli_query($conn, $sql)) {
        echo "Order placed successfully!";
        // Redirect
        header('Location: ' . SITEURL . 'menu.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header('Location: ' . SITEURL);
    exit();
}
?>
