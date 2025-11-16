<?php
session_start();
include "db.php";

// Check if user has placed any orders (check by email or session)
$customer_email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

// If not logged in, ask for email to view orders
if (empty($customer_email) && !$user_id) {
    $show_email_form = true;
    
    // Check if email submitted via POST
    if (isset($_POST['search_email'])) {
        $customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
        $show_email_form = false;
    }
} else {
    $show_email_form = false;
}

// Get orders
if (!$show_email_form) {
    if ($user_id) {
        $orders_sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC";
        $stmt = mysqli_prepare($conn, $orders_sql);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
    } else {
        $orders_sql = "SELECT * FROM orders WHERE customer_email = ? ORDER BY created_at DESC";
        $stmt = mysqli_prepare($conn, $orders_sql);
        mysqli_stmt_bind_param($stmt, "s", $customer_email);
    }
    
    mysqli_stmt_execute($stmt);
    $orders_result = mysqli_stmt_get_result($stmt);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - Fashion Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Inter', sans-serif;
            padding-bottom: 50px;
        }
        .orders-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }
        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .order-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 25px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .order-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }
        .order-id {
            font-size: 20px;
            font-weight: 700;
            color: #333;
        }
        .order-date {
            color: #666;
            font-size: 14px;
        }
        .order-status {
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
        }
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        .status-processing {
            background: #cfe2ff;
            color: #084298;
        }
        .status-shipped {
            background: #d1e7dd;
            color: #0f5132;
        }
        .status-delivered {
            background: #d1e7dd;
            color: #0a3622;
        }
        .status-cancelled {
            background: #f8d7da;
            color: #842029;
        }
        .order-items {
            margin: 20px 0;
        }
        .order-item {
            display: flex;
            align-items: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 10px;
            gap: 15px;
        }
        .order-item-image {
            width: 70px;
            height: 70px;
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
        .order-item-quantity {
            color: #666;
            font-size: 14px;
        }
        .order-item-price {
            font-weight: 700;
            color: #e74c3c;
            font-size: 16px;
        }
        .order-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 2px solid #f0f0f0;
            flex-wrap: wrap;
            gap: 15px;
        }
        .order-total {
            font-size: 20px;
            font-weight: 700;
            color: #333;
        }
        .track-btn {
            padding: 10px 25px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        .track-btn:hover {
            background: #0056b3;
            color: white;
        }
        .no-orders {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 10px;
        }
        .no-orders i {
            font-size: 80px;
            color: #ddd;
            margin-bottom: 20px;
        }
        .no-orders h3 {
            color: #333;
            margin-bottom: 10px;
        }
        .no-orders p {
            color: #666;
            margin-bottom: 20px;
        }
        .email-form-card {
            background: white;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: 100px auto;
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
        
        /* Order Tracking Timeline */
        .tracking-timeline {
            margin: 20px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .timeline-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            position: relative;
            padding-left: 40px;
        }
        .timeline-item:last-child {
            margin-bottom: 0;
        }
        .timeline-item:not(:last-child)::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 30px;
            width: 2px;
            height: calc(100% + 10px);
            background: #dee2e6;
        }
        .timeline-icon {
            position: absolute;
            left: 0;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            z-index: 1;
        }
        .timeline-icon.completed {
            background: #28a745;
            color: white;
        }
        .timeline-icon.active {
            background: #007bff;
            color: white;
        }
        .timeline-icon.pending {
            background: #e9ecef;
            color: #6c757d;
        }
        .timeline-content {
            flex: 1;
        }
        .timeline-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }
        .timeline-date {
            color: #666;
            font-size: 13px;
        }
        .tracking-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }
        .tracking-modal.active {
            display: flex;
        }
        .tracking-modal-content {
            background: white;
            border-radius: 10px;
            padding: 30px;
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
        }
        .modal-header-custom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #666;
        }
        
        @media (max-width: 768px) {
            .order-header, .order-footer {
                flex-direction: column;
                align-items: flex-start;
            }
            .order-item {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="orders-container">
    <a href="../products.php" class="back-link">
        <i class="fa-solid fa-arrow-left"></i> Back to Shop
    </a>
    
    <?php if ($show_email_form): ?>
        <!-- Email Form for Non-Logged In Users -->
        <div class="email-form-card">
            <h2 class="text-center mb-4">View Your Orders</h2>
            <p class="text-center text-muted mb-4">
                Enter your email address to view your order history
            </p>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="customer_email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="customer_email" 
                           name="customer_email" required 
                           placeholder="Enter your email">
                </div>
                <button type="submit" name="search_email" class="btn btn-primary w-100">
                    <i class="fa-solid fa-search"></i> View My Orders
                </button>
            </form>
        </div>
    <?php else: ?>
        <!-- Orders List -->
        <h1 class="page-title">
            <i class="fa-solid fa-receipt"></i> My Orders
        </h1>
        
        <?php if (mysqli_num_rows($orders_result) > 0): ?>
            <?php while ($order = mysqli_fetch_assoc($orders_result)): ?>
                <?php
                // Get order items
                $order_id = $order['id'];
                $items_sql = "SELECT * FROM order_items WHERE order_id = ?";
                $items_stmt = mysqli_prepare($conn, $items_sql);
                mysqli_stmt_bind_param($items_stmt, "i", $order_id);
                mysqli_stmt_execute($items_stmt);
                $items_result = mysqli_stmt_get_result($items_stmt);
                
                // Determine status class
                $status_class = 'status-' . strtolower($order['order_status']);
                ?>
                
                <div class="order-card">
                    <div class="order-header">
                        <div>
                            <div class="order-id">
                                Order #<?php echo str_pad($order['id'], 6, '0', STR_PAD_LEFT); ?>
                            </div>
                            <div class="order-date">
                                Placed on <?php echo date('F d, Y \a\t g:i A', strtotime($order['created_at'])); ?>
                            </div>
                        </div>
                        <span class="order-status <?php echo $status_class; ?>">
                            <?php echo ucfirst($order['order_status']); ?>
                        </span>
                    </div>
                    
                    <div class="order-items">
                        <?php while ($item = mysqli_fetch_assoc($items_result)): ?>
                            <div class="order-item">
                                <img src="../<?php echo htmlspecialchars($item['product_image']); ?>" 
                                     alt="<?php echo htmlspecialchars($item['product_name']); ?>" 
                                     class="order-item-image">
                                <div class="order-item-details">
                                    <div class="order-item-name">
                                        <?php echo htmlspecialchars($item['product_name']); ?>
                                    </div>
                                    <div class="order-item-quantity">
                                        Quantity: <?php echo $item['quantity']; ?> × Rs. <?php echo number_format($item['product_price']); ?>
                                    </div>
                                </div>
                                <div class="order-item-price">
                                    Rs. <?php echo number_format($item['product_price'] * $item['quantity']); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    
                    <div class="order-footer">
                        <div class="order-total">
                            Total: Rs. <?php echo number_format($order['total_amount']); ?>
                        </div>
                        <button class="track-btn" onclick="showTracking(<?php echo $order['id']; ?>, '<?php echo $order['order_status']; ?>', '<?php echo $order['created_at']; ?>')">
                            <i class="fa-solid fa-location-dot"></i> Track Order
                        </button>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="no-orders">
                <i class="fa-solid fa-shopping-bag"></i>
                <h3>No Orders Found</h3>
                <p>You haven't placed any orders yet.</p>
                <a href="../products.php" class="track-btn">
                    <i class="fa-solid fa-shopping-cart"></i> Start Shopping
                </a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

<!-- Tracking Modal -->
<div class="tracking-modal" id="trackingModal">
    <div class="tracking-modal-content">
        <div class="modal-header-custom">
            <h3>Order Tracking</h3>
            <button class="modal-close" onclick="closeTracking()">
                <i class="fa-solid fa-times"></i>
            </button>
        </div>
        
        <div id="trackingContent">
            <!-- Tracking content will be loaded here -->
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function showTracking(orderId, status, orderDate) {
    const modal = document.getElementById('trackingModal');
    const content = document.getElementById('trackingContent');
    
    // Order tracking stages
    const stages = [
        { name: 'Order Placed', icon: 'fa-check-circle', date: orderDate },
        { name: 'Processing', icon: 'fa-box', date: null },
        { name: 'Shipped', icon: 'fa-truck', date: null },
        { name: 'Out for Delivery', icon: 'fa-shipping-fast', date: null },
        { name: 'Delivered', icon: 'fa-home', date: null }
    ];
    
    // Determine current stage index
    let currentStageIndex = 0;
    switch(status.toLowerCase()) {
        case 'pending':
            currentStageIndex = 0;
            break;
        case 'processing':
            currentStageIndex = 1;
            // Add estimated date for processing (1 day after order)
            stages[1].date = addDays(orderDate, 1);
            break;
        case 'shipped':
            currentStageIndex = 2;
            stages[1].date = addDays(orderDate, 1);
            stages[2].date = addDays(orderDate, 2);
            break;
        case 'out_for_delivery':
            currentStageIndex = 3;
            stages[1].date = addDays(orderDate, 1);
            stages[2].date = addDays(orderDate, 2);
            stages[3].date = addDays(orderDate, 3);
            break;
        case 'delivered':
            currentStageIndex = 4;
            stages[1].date = addDays(orderDate, 1);
            stages[2].date = addDays(orderDate, 2);
            stages[3].date = addDays(orderDate, 3);
            stages[4].date = addDays(orderDate, 4);
            break;
    }
    
    // Build tracking HTML
    let trackingHTML = `
        <div style="text-align: center; margin-bottom: 20px;">
            <strong>Order #${String(orderId).padStart(6, '0')}</strong>
        </div>
        <div class="tracking-timeline">
    `;
    
    stages.forEach((stage, index) => {
        let iconClass = '';
        let statusText = '';
        
        if (index < currentStageIndex) {
            iconClass = 'completed';
            statusText = stage.date ? formatDate(stage.date) : 'Completed';
        } else if (index === currentStageIndex) {
            iconClass = 'active';
            statusText = 'In Progress';
        } else {
            iconClass = 'pending';
            statusText = 'Pending';
        }
        
        trackingHTML += `
            <div class="timeline-item">
                <div class="timeline-icon ${iconClass}">
                    <i class="fa-solid ${stage.icon}"></i>
                </div>
                <div class="timeline-content">
                    <div class="timeline-title">${stage.name}</div>
                    <div class="timeline-date">${statusText}</div>
                </div>
            </div>
        `;
    });
    
    trackingHTML += `</div>`;
    
    // Estimated delivery
    const estimatedDelivery = addDays(orderDate, 5);
    trackingHTML += `
        <div style="text-align: center; margin-top: 20px; padding: 15px; background: #e7f3ff; border-radius: 8px;">
            <strong style="color: #0056b3;">Estimated Delivery:</strong><br>
            <span style="color: #333;">${formatDate(estimatedDelivery)}</span>
        </div>
    `;
    
    content.innerHTML = trackingHTML;
    modal.classList.add('active');
}

function closeTracking() {
    const modal = document.getElementById('trackingModal');
    modal.classList.remove('active');
}

function addDays(dateString, days) {
    const date = new Date(dateString);
    date.setDate(date.getDate() + days);
    return date.toISOString();
}

function formatDate(dateString) {
    const date = new Date(dateString);
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString('en-US', options);
}

// Close modal when clicking outside
document.getElementById('trackingModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeTracking();
    }
});
</script>

</body>
</html>
<?php mysqli_close($conn); ?>