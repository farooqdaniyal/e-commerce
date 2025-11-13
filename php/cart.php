<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
    $_SESSION['cart_count'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    switch ($action) {
        case 'get_cart':
            echo json_encode([
                'cart' => $_SESSION['cart'],
                'cart_count' => $_SESSION['cart_count']
            ]);
            break;
            
        case 'add':
            $productId = $_POST['product_id'];
            $productName = $_POST['product_name'];
            $productPrice = floatval($_POST['product_price']);
            $productImage = $_POST['product_image'];
            
            // Check if product already in cart
            $found = false;
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == $productId) {
                    $item['quantity'] += 1;
                    $found = true;
                    break;
                }
            }
            
            if (!$found) {
                $_SESSION['cart'][] = [
                    'id' => $productId,
                    'name' => $productName,
                    'price' => $productPrice,
                    'image' => $productImage,
                    'quantity' => 1
                ];
            }
            
            $_SESSION['cart_count'] = array_sum(array_column($_SESSION['cart'], 'quantity'));
            
            echo json_encode([
                'success' => true,
                'cart_count' => $_SESSION['cart_count']
            ]);
            break;
            
        case 'remove':
            $productId = $_POST['product_id'];
            
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $productId) {
                    $_SESSION['cart_count'] -= $item['quantity'];
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    break;
                }
            }
            
            echo json_encode([
                'success' => true,
                'cart_count' => $_SESSION['cart_count']
            ]);
            break;
            
        case 'update_quantity':
            $productId = $_POST['product_id'];
            $change = intval($_POST['change']);
            
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == $productId) {
                    $item['quantity'] += $change;
                    $_SESSION['cart_count'] += $change;
                    break;
                }
            }
            
            echo json_encode([
                'success' => true,
                'cart_count' => $_SESSION['cart_count']
            ]);
            break;
            
        case 'clear_cart':
            $_SESSION['cart'] = [];
            $_SESSION['cart_count'] = 0;
            echo json_encode(['success' => true]);
            break;
            
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
}
?>