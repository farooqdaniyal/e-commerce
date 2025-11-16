<?php
session_start();
include "db.php";

// Check if cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: ../products.php");
    exit();
}

// Calculate total
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Fashion Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }
        .checkout-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }
        .checkout-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .checkout-title {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #333;
        }
        .order-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
            gap: 15px;
        }
        .order-item:last-child {
            border-bottom: none;
        }
        .order-item-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }
        .order-item-details {
            flex: 1;
        }
        .order-item-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }
        .order-item-price {
            color: #e74c3c;
            font-weight: 600;
        }
        .order-item-quantity {
            color: #666;
            font-size: 14px;
        }
        .form-label {
            font-weight: 600;
            color: #333;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        .order-summary {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 5px 0;
        }
        .summary-row.total {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            border-top: 2px solid #dee2e6;
            padding-top: 15px;
            margin-top: 15px;
        }
        .place-order-btn {
            width: 100%;
            padding: 15px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .place-order-btn:hover {
            background: #218838;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="checkout-container">
    <a href="../products.php" class="back-link">
        <i class="fa-solid fa-arrow-left"></i> Continue Shopping
    </a>
    
    <div class="row">
        <!-- Order Items -->
        <div class="col-lg-7">
            <div class="checkout-card">
                <h2 class="checkout-title">Your Order</h2>
                <div class="order-items">
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                    <div class="order-item">
                        <img src="../<?php echo htmlspecialchars($item['image']); ?>" 
                             alt="<?php echo htmlspecialchars($item['name']); ?>" 
                             class="order-item-image">
                        <div class="order-item-details">
                            <div class="order-item-name"><?php echo htmlspecialchars($item['name']); ?></div>
                            <div class="order-item-price">Rs. <?php echo number_format($item['price']); ?></div>
                            <div class="order-item-quantity">Quantity: <?php echo $item['quantity']; ?></div>
                        </div>
                        <div class="order-item-total">
                            <strong>Rs. <?php echo number_format($item['price'] * $item['quantity']); ?></strong>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Customer Information Form -->
            <div class="checkout-card">
                <h2 class="checkout-title">Shipping Information</h2>
                <form id="checkoutForm" method="POST" action="process_order.php">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="customer_name" class="form-label">Full Name *</label>
                            <input type="text" class="form-control" id="customer_name" 
                                   name="customer_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="customer_email" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="customer_email" 
                                   name="customer_email" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="customer_phone" class="form-label">Phone Number *</label>
                            <input type="tel" class="form-control" id="customer_phone" 
                                   name="customer_phone" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="customer_city" class="form-label">City *</label>
                            <input type="text" class="form-control" id="customer_city" 
                                   name="customer_city" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="customer_address" class="form-label">Complete Address *</label>
                        <textarea class="form-control" id="customer_address" 
                                  name="customer_address" rows="3" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="order_notes" class="form-label">Order Notes (Optional)</label>
                        <textarea class="form-control" id="order_notes" 
                                  name="order_notes" rows="2" 
                                  placeholder="Any special instructions for your order"></textarea>
                    </div>
                </form>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-5">
            <div class="checkout-card">
                <h2 class="checkout-title">Order Summary</h2>
                <div class="order-summary">
                    <div class="summary-row">
                        <span>Subtotal:</span>
                        <span>Rs. <?php echo number_format($total); ?></span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping:</span>
                        <span>Rs. 200</span>
                    </div>
                    <div class="summary-row">
                        <span>Tax (0%):</span>
                        <span>Rs. 0</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total:</span>
                        <span>Rs. <?php echo number_format($total + 200); ?></span>
                    </div>
                </div>
                
                <button type="submit" form="checkoutForm" class="place-order-btn mt-3">
                    <i class="fa-solid fa-check-circle"></i> Place Order
                </button>
                
                <div class="text-center mt-3">
                    <small class="text-muted">
                        <i class="fa-solid fa-lock"></i> Secure Checkout
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>