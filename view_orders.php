<?php
header("Content-Type: application/json");

// Read and display orders
$file = "orders.json";
if (file_exists($file)) {
    echo file_get_contents($file);
} else {
    echo json_encode(["message" => "No orders found"]);
}
?>
