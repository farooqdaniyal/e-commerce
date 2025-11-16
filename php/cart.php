<?php
session_start();
include 'db.php';

// Initialize cart in session if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Get action from POST request
$action = isset($_POST['action']) ? $_POST['action'] : '';

// Response array
$response = ['success' => false];

switch ($action) {
    case 'add':
        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
        $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
        $product_price = isset($_POST['product_price']) ? floatval($_POST['product_price']) : 0;
        $product_image = isset($_POST['product_image']) ? $_POST['product_image'] : '';
        
        if ($product_id > 0) {
            // Check if product already exists in cart
            $found = false;
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == $product_id) {
                    $item['quantity'] += 1;
                    $found = true;
                    break;
                }
            }
            
            // If not found, add new item
            if (!$found) {
                $_SESSION['cart'][] = [
                    'id' => $product_id,
                    'name' => $product_name,
                    'price' => $product_price,
                    'image' => $product_image,
                    'quantity' => 1
                ];
            }
            
            // Calculate total cart count
            $cart_count = 0;
            foreach ($_SESSION['cart'] as $item) {
                $cart_count += $item['quantity'];
            }
            
            $response['success'] = true;
            $response['cart_count'] = $cart_count;
            $response['message'] = 'Product added to cart';
        }
        break;
        
    case 'remove':
        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
        
        if ($product_id > 0) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $product_id) {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
                    break;
                }
            }
            
            // Calculate total cart count
            $cart_count = 0;
            foreach ($_SESSION['cart'] as $item) {
                $cart_count += $item['quantity'];
            }
            
            $response['success'] = true;
            $response['cart_count'] = $cart_count;
            $response['message'] = 'Product removed from cart';
        }
        break;
        
    case 'update_quantity':
        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
        $change = isset($_POST['change']) ? intval($_POST['change']) : 0;
        
        if ($product_id > 0) {
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == $product_id) {
                    $item['quantity'] += $change;
                    if ($item['quantity'] < 1) {
                        $item['quantity'] = 1;
                    }
                    break;
                }
            }
            
            // Calculate total cart count
            $cart_count = 0;
            foreach ($_SESSION['cart'] as $item) {
                $cart_count += $item['quantity'];
            }
            
            $response['success'] = true;
            $response['cart_count'] = $cart_count;
            $response['message'] = 'Quantity updated';
        }
        break;
        
    case 'get_cart':
        // Calculate total cart count
        $cart_count = 0;
        foreach ($_SESSION['cart'] as $item) {
            $cart_count += $item['quantity'];
        }
        
        $response['success'] = true;
        $response['cart'] = $_SESSION['cart'];
        $response['cart_count'] = $cart_count;
        break;
        
    case 'clear_cart':
        $_SESSION['cart'] = [];
        $response['success'] = true;
        $response['cart_count'] = 0;
        $response['message'] = 'Cart cleared';
        break;
        
    default:
        $response['message'] = 'Invalid action';
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>