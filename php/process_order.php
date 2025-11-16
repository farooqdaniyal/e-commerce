<?php
session_start();
include "db.php";

// Check if cart exists
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: ../products.php");
    exit();
}

// Get form data
$customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
$customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
$customer_phone = mysqli_real_escape_string($conn, $_POST['customer_phone']);
$customer_city = mysqli_real_escape_string($conn, $_POST['customer_city']);
$customer_address = mysqli_real_escape_string($conn, $_POST['customer_address']);
$order_notes = mysqli_real_escape_string($conn, $_POST['order_notes']);

// Calculate total
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
$total += 200; // Add shipping

// Get user ID if logged in
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;

// Start transaction
mysqli_begin_transaction($conn);

try {
    // Insert order into orders table
    $order_sql = "INSERT INTO orders (user_id, customer_name, customer_email, customer_phone, customer_address, total_amount, order_status, created_at) 
                  VALUES (?, ?, ?, ?, ?, ?, 'pending', NOW())";
    
    $stmt = mysqli_prepare($conn, $order_sql);
    
    $full_address = $customer_address . ", " . $customer_city;
    if (!empty($order_notes)) {
        $full_address .= " | Notes: " . $order_notes;
    }
    
    mysqli_stmt_bind_param($stmt, "issssd", $user_id, $customer_name, $customer_email, $customer_phone, $full_address, $total);
    mysqli_stmt_execute($stmt);
    
    // Get the order ID
    $order_id = mysqli_insert_id($conn);
    
    // Insert order items
    $item_sql = "INSERT INTO order_items (order_id, product_id, product_name, product_price, product_image, quantity) 
                 VALUES (?, ?, ?, ?, ?, ?)";
    
    $item_stmt = mysqli_prepare($conn, $item_sql);
    
    foreach ($_SESSION['cart'] as $item) {
        mysqli_stmt_bind_param($item_stmt, "iisdsi", 
            $order_id, 
            $item['id'], 
            $item['name'], 
            $item['price'], 
            $item['image'], 
            $item['quantity']
        );
        mysqli_stmt_execute($item_stmt);
    }
    
    // Commit transaction
    mysqli_commit($conn);
    
    // Clear cart
    $_SESSION['cart'] = [];
    
    // Redirect to success page
    header("Location: order_success.php?order_id=" . $order_id);
    exit();
    
} catch (Exception $e) {
    // Rollback on error
    mysqli_rollback($conn);
    
    // Redirect back with error
    header("Location: checkout.php?error=1");
    exit();
}

mysqli_close($conn);
?>