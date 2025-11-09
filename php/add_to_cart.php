<?php
session_start();

// Initialize cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Check if data sent
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
    $product_price = isset($_POST['product_price']) ? floatval($_POST['product_price']) : 0;
    $product_image = isset($_POST['product_image']) ? $_POST['product_image'] : '';
    
    // Check if product already exists in cart
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity']++;
            $found = true;
            break;
        }
    }
    
    // If not found, add new item
    if (!$found) {
        $_SESSION['cart'][] = array(
            'id' => $product_id,
            'name' => $product_name,
            'price' => $product_price,
            'image' => $product_image,
            'quantity' => 1
        );
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode(array(
        'success' => true,
        'cart_count' => count($_SESSION['cart']),
        'message' => 'Product added to cart!'
    ));
    exit();
}

// If accessed directly, redirect
header('Location: ../products.php');
exit();
?>