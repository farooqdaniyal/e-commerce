<?php
session_start();

// Get cart items
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$totalAmount = 0;

foreach ($cart as $item) {
    $totalAmount += $item['price'] * $item['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Checkout</h2>
        
        <?php if(empty($cart)): ?>
            <div class="alert alert-warning">
                Your cart is empty! <a href="products.php">Shop Now</a>
            </div>
        <?php else: ?>
        
        <div class="row">
            <!-- Order Summary -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <?php foreach($cart as $item): ?>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <div>
                                    <strong><?php echo $item['name']; ?></strong>
                                    <br>
                                    <small>Qty: <?php echo $item['quantity']; ?> × Rs.<?php echo $item['price']; ?></small>
                                </div>
                                <div>Rs.<?php echo $item['price'] * $item['quantity']; ?></div>
                            </div>
                        <?php endforeach; ?>
                        
                        <div class="d-flex justify-content-between mt-3 pt-2 border-top">
                            <strong>Total:</strong>
                            <strong>Rs.<?php echo $totalAmount; ?></strong>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Checkout Form -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Customer Information</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="php/checkout.php">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>First Name *</label>
                                    <input type="text" name="firstName" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Last Name *</label>
                                    <input type="text" name="lastName" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label>Email *</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label>Phone *</label>
                                <input type="tel" name="phone" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label>Address *</label>
                                <textarea name="address" class="form-control" rows="3" required></textarea>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>City *</label>
                                    <input type="text" name="city" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>State *</label>
                                    <input type="text" name="state" class="form-control" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Pincode *</label>
                                    <input type="text" name="pincode" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label>Country *</label>
                                <select name="country" class="form-control" required>
                                    <option value="India">India</option>
                                    <option value="USA">USA</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label>Payment Method *</label>
                                <select name="paymentMethod" class="form-control" required>
                                    <option value="cash_on_delivery">Cash on Delivery</option>
                                    <option value="card">Credit/Debit Card</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-success btn-lg w-100">
                                Place Order - Rs.<?php echo $totalAmount; ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>