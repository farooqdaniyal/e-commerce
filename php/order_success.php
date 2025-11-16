<?php
session_start();
include "db.php";

// Get order ID from URL
$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

if ($order_id == 0) {
    header("Location: ../products.php");
    exit();
}

// Get order details
$order_sql = "SELECT * FROM orders WHERE id = ?";
$stmt = mysqli_prepare($conn, $order_sql);
mysqli_stmt_bind_param($stmt, "i", $order_id);
mysqli_stmt_execute($stmt);
$order_result = mysqli_stmt_get_result($stmt);
$order = mysqli_fetch_assoc($order_result);

if (!$order) {
    header("Location: ../products.php");
    exit();
}

// Get order items
$items_sql = "SELECT * FROM order_items WHERE order_id = ?";
$items_stmt = mysqli_prepare($conn, $items_sql);
mysqli_stmt_bind_param($items_stmt, "i", $order_id);
mysqli_stmt_execute($items_stmt);
$items_result = mysqli_stmt_get_result($items_stmt);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Fashion Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }
        .success-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        .success-card {
            background: white;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .success-icon {
            font-size: 80px;
            color: #28a745;
            margin-bottom: 20px;
        }
        .success-title {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }
        .success-message {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }
        .order-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 30px 0;
            text-align: left;
        }
        .order-info-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #dee2e6;
        }
        .order-info-row:last-child {
            border-bottom: none;
        }
        .order-info-label {
            font-weight: 600;
            color: #333;
        }
        .order-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
            gap: 15px;
            text-align: left;
        }
        .order-item:last-child {
            border-bottom: none;
        }
        .order-item-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        .order-item-details {
            flex: 1;
        }
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }
        .btn-primary-custom {
            padding: 12px 30px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s ease;
        }
        .btn-primary-custom:hover {
            background: #0056b3;
            color: white;
        }
        .btn-secondary-custom {
            padding: 12px 30px;
            background: #6c757d;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s ease;
        }
        .btn-secondary-custom:hover {
            background: #5a6268;
            color: white;
        }
    </style>
</head>
<body>

<div class="success-container">
    <div class="success-card">
        <div class="success-icon">
            <i class="fa-solid fa-check-circle"></i>
        </div>
        <h1 class="success-title">Order Placed Successfully!</h1>
        <p class="success-message">
            Thank you for your order. We'll send you a confirmation email shortly.
        </p>
        
        <div class="order-info">
            <h4 style="margin-bottom: 20px;">Order Details</h4>
            <div class="order-info-row">
                <span class="order-info-label">Order ID:</span>
                <span>#<?php echo str_pad($order['id'], 6, '0', STR_PAD_LEFT); ?></span>
            </div>
            <div class="order-info-row">
                <span class="order-info-label">Order Date:</span>
                <span><?php echo date('F d, Y', strtotime($order['created_at'])); ?></span>
            </div>
            <div class="order-info-row">
                <span class="order-info-label">Customer Name:</span>
                <span><?php echo htmlspecialchars($order['customer_name']); ?></span>
            </div>
            <div class="order-info-row">
                <span class="order-info-label">Email:</span>
                <span><?php echo htmlspecialchars($order['customer_email']); ?></span>
            </div>
            <div class="order-info-row">
                <span class="order-info-label">Phone:</span>
                <span><?php echo htmlspecialchars($order['customer_phone']); ?></span>
            </div>
            <div class="order-info-row">
                <span class="order-info-label">Total Amount:</span>
                <span style="color: #28a745; font-weight: 700; font-size: 20px;">
                    Rs. <?php echo number_format($order['total_amount']); ?>
                </span>
            </div>
        </div>
        
        <div class="order-items" style="margin-top: 30px;">
            <h4 style="margin-bottom: 20px; text-align: left;">Order Items</h4>
            <?php while ($item = mysqli_fetch_assoc($items_result)): ?>
            <div class="order-item">
                <img src="../<?php echo htmlspecialchars($item['product_image']); ?>" 
                     alt="<?php echo htmlspecialchars($item['product_name']); ?>" 
                     class="order-item-image">
                <div class="order-item-details">
                    <div style="font-weight: 600; color: #333;">
                        <?php echo htmlspecialchars($item['product_name']); ?>
                    </div>
                    <div style="color: #666; font-size: 14px;">
                        Quantity: <?php echo $item['quantity']; ?> × Rs. <?php echo number_format($item['product_price']); ?>
                    </div>
                </div>
                <div style="font-weight: 700; color: #e74c3c;">
                    Rs. <?php echo number_format($item['product_price'] * $item['quantity']); ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        
        <div class="action-buttons">
            <a href="../products.php" class="btn-primary-custom">
                <i class="fa-solid fa-shopping-bag"></i> Continue Shopping
            </a>
            <a href="view_orders.php" class="btn-secondary-custom">
                <i class="fa-solid fa-receipt"></i> View My Orders
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php mysqli_close($conn); ?>