<?php
session_start();
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

// Get POST data
$input = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Start transaction
        $conn->beginTransaction();
        
        // Insert customer information
        $customerStmt = $conn->prepare("
            INSERT INTO customers (first_name, last_name, email, phone, address, city, state, pincode, country)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        
        $customerStmt->execute([
            $input['customer']['firstName'],
            $input['customer']['lastName'],
            $input['customer']['email'],
            $input['customer']['phone'],
            $input['customer']['address'],
            $input['customer']['city'],
            $input['customer']['state'],
            $input['customer']['pincode'],
            $input['customer']['country']
        ]);
        
        $customerId = $conn->lastInsertId();
        
        // Insert order
        $orderStmt = $conn->prepare("
            INSERT INTO orders (order_id, customer_id, total_amount, payment_method, order_date, status)
            VALUES (?, ?, ?, ?, ?, 'pending')
        ");
        
        $orderStmt->execute([
            $input['order']['orderId'],
            $customerId,
            $input['order']['total'],
            $input['payment']['method'],
            $input['order']['orderDate']
        ]);
        
        $orderId = $conn->lastInsertId();
        
        // Insert order items
        $itemStmt = $conn->prepare("
            INSERT INTO order_items (order_id, product_id, product_name, quantity, price)
            VALUES (?, ?, ?, ?, ?)
        ");
        
        foreach ($input['order']['items'] as $item) {
            $itemStmt->execute([
                $orderId,
                $item['id'],
                $item['name'],
                $item['quantity'],
                $item['price']
            ]);
        }
        
        // Commit transaction
        $conn->commit();
        
        // Clear cart session
        unset($_SESSION['cart']);
        
        echo json_encode([
            'success' => true,
            'orderId' => $input['order']['orderId'],
            'message' => 'Order placed successfully'
        ]);
        
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollBack();
        echo json_encode([
            'success' => false,
            'message' => 'Order failed: ' . $e->getMessage()
        ]);
    }
}
?>