<?php
session_start();
include "../php/db.php";

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    echo "Unauthorized access";
    exit();
}

$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

if ($order_id == 0) {
    echo "Invalid order ID";
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
    echo "Order not found";
    exit();
}

// Get order items
$items_sql = "SELECT * FROM order_items WHERE order_id = ?";
$items_stmt = mysqli_prepare($conn, $items_sql);
mysqli_stmt_bind_param($items_stmt, "i", $order_id);
mysqli_stmt_execute($items_stmt);
$items_result = mysqli_stmt_get_result($items_stmt);
?>

<div class="order-details">
    <div class="row mb-3">
        <div class="col-md-6">
            <h6>Order Information</h6>
            <table class="table table-sm">
                <tr>
                    <td><strong>Order ID:</strong></td>
                    <td>#<?php echo str_pad($order['id'], 6, '0', STR_PAD_LEFT); ?></td>
                </tr>
                <tr>
                    <td><strong>Order Date:</strong></td>
                    <td><?php echo date('F d, Y g:i A', strtotime($order['created_at'])); ?></td>
                </tr>
                <tr>
                    <td><strong>Status:</strong></td>
                    <td>
                        <span class="badge bg-<?php 
                            echo $order['order_status'] == 'delivered' ? 'success' : 
                                ($order['order_status'] == 'cancelled' ? 'danger' : 'warning'); 
                        ?>">
                            <?php echo ucfirst($order['order_status']); ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td><strong>Total Amount:</strong></td>
                    <td><strong>Rs. <?php echo number_format($order['total_amount']); ?></strong></td>
                </tr>
            </table>
        </div>
        
        <div class="col-md-6">
            <h6>Customer Information</h6>
            <table class="table table-sm">
                <tr>
                    <td><strong>Name:</strong></td>
                    <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td><?php echo htmlspecialchars($order['customer_email']); ?></td>
                </tr>
                <tr>
                    <td><strong>Phone:</strong></td>
                    <td><?php echo htmlspecialchars($order['customer_phone']); ?></td>
                </tr>
                <tr>
                    <td><strong>Address:</strong></td>
                    <td><?php echo nl2br(htmlspecialchars($order['customer_address'])); ?></td>
                </tr>
            </table>
        </div>
    </div>
    
    <hr>
    
    <h6>Order Items</h6>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($item = mysqli_fetch_assoc($items_result)): ?>
                <tr>
                    <td>
                        <img src="../<?php echo htmlspecialchars($item['product_image']); ?>" 
                             style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                    </td>
                    <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                    <td>Rs. <?php echo number_format($item['product_price']); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><strong>Rs. <?php echo number_format($item['product_price'] * $item['quantity']); ?></strong></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-end"><strong>Subtotal:</strong></td>
                <td><strong>Rs. <?php echo number_format($order['total_amount'] - 200); ?></strong></td>
            </tr>
            <tr>
                <td colspan="4" class="text-end"><strong>Shipping:</strong></td>
                <td><strong>Rs. 200</strong></td>
            </tr>
            <tr>
                <td colspan="4" class="text-end"><strong>Total:</strong></td>
                <td><strong style="color: #28a745; font-size: 18px;">Rs. <?php echo number_format($order['total_amount']); ?></strong></td>
            </tr>
        </tfoot>
    </table>
</div>

<?php mysqli_close($conn); ?>