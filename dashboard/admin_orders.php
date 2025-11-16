<?php
session_start();
include '../include/header.php';
include "../php/db.php";

// Simple admin authentication (you can improve this)
$admin_password = "admin123"; // Change this to your secure password

if (!isset($_SESSION['admin_logged_in'])) {
    if (isset($_POST['admin_login'])) {
        $entered_password = $_POST['admin_password'];
        if ($entered_password === $admin_password) {
            $_SESSION['admin_logged_in'] = true;
        } else {
            $error = "Incorrect password!";
        }
    }
    
    if (!isset($_SESSION['admin_logged_in'])) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Admin Login</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body { background: #f8f9fa; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
                .login-card { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); max-width: 400px; width: 100%; }
            </style>
        </head>
        <body>
            <div class="login-card">
                <h2 class="text-center mb-4">Admin Login</h2>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="admin_password" required>
                    </div>
                    <button type="submit" name="admin_login" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </body>
        </html>
        <?php
        exit();
    }
}

// Handle order status update
if (isset($_POST['update_status'])) {
    $order_id = intval($_POST['order_id']);
    $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);
    
    $update_sql = "UPDATE orders SET order_status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $update_sql);
    mysqli_stmt_bind_param($stmt, "si", $new_status, $order_id);
    
    if (mysqli_stmt_execute($stmt)) {
        $success_message = "Order status updated successfully!";
    } else {
        $error_message = "Failed to update order status!";
    }
}

// Get all orders
$orders_sql = "SELECT o.*, COUNT(oi.id) as item_count 
               FROM orders o 
               LEFT JOIN order_items oi ON o.id = oi.order_id 
               GROUP BY o.id 
               ORDER BY o.created_at DESC";
$orders_result = mysqli_query($conn, $orders_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Order Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }
        .admin-header {
            background: white;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .admin-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }
        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            text-align: center;
        }
        .stats-card h3 {
            margin: 0;
            font-size: 36px;
            font-weight: 700;
            color: #007bff;
        }
        .stats-card p {
            margin: 5px 0 0 0;
            color: #666;
            font-weight: 600;
        }
        .orders-table {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .table-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
        }
        .status-badge {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-processing { background: #cfe2ff; color: #084298; }
        .status-shipped { background: #d1e7dd; color: #0f5132; }
        .status-delivered { background: #d1e7dd; color: #0a3622; }
        .status-cancelled { background: #f8d7da; color: #842029; }
        .action-btn {
            padding: 5px 12px;
            font-size: 12px;
            border-radius: 5px;
            margin: 2px;
        }
        .logout-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- <div class="admin-header">
    <div class="admin-container">
        <div class="d-flex justify-content-between align-items-center">
            <h1><i class="fa-solid fa-crown"></i> Admin Dashboard</h1>
            <a href="?logout=1" class="logout-btn">
                <i class="fa-solid fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</div> -->

<?php
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin_orders.php");
    exit();
}
?>

<div class="admin-container">
    <?php if (isset($success_message)): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?php echo $success_message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    
    <?php if (isset($error_message)): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?php echo $error_message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    
    <!-- Statistics -->
    <div class="row mb-4">
        <?php
        $total_orders = mysqli_num_rows($orders_result);
        mysqli_data_seek($orders_result, 0);
        
        $total_revenue = 0;
        $pending_count = 0;
        $delivered_count = 0;
        
        while ($order = mysqli_fetch_assoc($orders_result)) {
            $total_revenue += $order['total_amount'];
            if ($order['order_status'] == 'pending') $pending_count++;
            if ($order['order_status'] == 'delivered') $delivered_count++;
        }
        mysqli_data_seek($orders_result, 0);
        ?>
        
        <div class="col-md-3">
            <div class="stats-card">
                <h3><?php echo $total_orders; ?></h3>
                <p>Total Orders</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <h3>Rs. <?php echo number_format($total_revenue); ?></h3>
                <p>Total Revenue</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <h3><?php echo $pending_count; ?></h3>
                <p>Pending Orders</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <h3><?php echo $delivered_count; ?></h3>
                <p>Delivered Orders</p>
            </div>
        </div>
    </div>
    
    <!-- Orders Table -->
    <div class="orders-table">
        <h2 class="table-title">All Orders</h2>
        
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Contact</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($order = mysqli_fetch_assoc($orders_result)): ?>
                        <tr>
                            <td><strong>#<?php echo str_pad($order['id'], 6, '0', STR_PAD_LEFT); ?></strong></td>
                            <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                            <td>
                                <?php echo htmlspecialchars($order['customer_email']); ?><br>
                                <small><?php echo htmlspecialchars($order['customer_phone']); ?></small>
                            </td>
                            <td><?php echo $order['item_count']; ?> items</td>
                            <td><strong>Rs. <?php echo number_format($order['total_amount']); ?></strong></td>
                            <td>
                                <span class="status-badge status-<?php echo $order['order_status']; ?>">
                                    <?php echo ucfirst($order['order_status']); ?>
                                </span>
                            </td>
                            <td><?php echo date('M d, Y', strtotime($order['created_at'])); ?></td>
                            <td>
                                <button class="btn btn-sm btn-info action-btn" onclick="viewOrder(<?php echo $order['id']; ?>)">
                                    <i class="fa-solid fa-eye"></i> View
                                </button>
                                <button class="btn btn-sm btn-primary action-btn" onclick="updateStatus(<?php echo $order['id']; ?>, '<?php echo $order['order_status']; ?>')">
                                    <i class="fa-solid fa-edit"></i> Update
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Update Status Modal -->
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Order Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="order_id" id="modal_order_id">
                    <div class="mb-3">
                        <label class="form-label">Select New Status</label>
                        <select class="form-select" name="new_status" id="modal_status" required>
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="shipped">Shipped</option>
                            <option value="out_for_delivery">Out for Delivery</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Order Modal -->
<div class="modal fade" id="viewOrderModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="orderDetailsContent">
                <!-- Order details will be loaded here -->
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function updateStatus(orderId, currentStatus) {
    document.getElementById('modal_order_id').value = orderId;
    document.getElementById('modal_status').value = currentStatus;
    
    const modal = new bootstrap.Modal(document.getElementById('statusModal'));
    modal.show();
}

function viewOrder(orderId) {
    // Fetch order details via AJAX
    fetch('get_order_details.php?order_id=' + orderId)
        .then(response => response.text())
        .then(html => {
            document.getElementById('orderDetailsContent').innerHTML = html;
            const modal = new bootstrap.Modal(document.getElementById('viewOrderModal'));
            modal.show();
        })
        .catch(error => {
            alert('Error loading order details');
        });
}
</script>

</body>
</html>
<?php mysqli_close($conn); ?>