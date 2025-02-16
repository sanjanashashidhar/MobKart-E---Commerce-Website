<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Read incoming JSON data
$orderData = json_decode(file_get_contents("php://input"), true);

if ($orderData) {
    // File to store orders
    $file = "orders.json";

    // Check if file exists, else create an empty array
    if (!file_exists($file)) {
        file_put_contents($file, json_encode([]));
    }

    // Read existing orders
    $existingOrders = json_decode(file_get_contents($file), true);

    // Append new order
    $existingOrders[] = $orderData;

    // Save updated order list
    file_put_contents($file, json_encode($existingOrders, JSON_PRETTY_PRINT));

    // Send success response
    echo json_encode(["message" => "Order placed successfully!"]);
} else {
    echo json_encode(["message" => "Invalid data received"]);
}
?>
