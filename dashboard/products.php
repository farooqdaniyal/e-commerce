<?php
session_start();
require_once '../php/db.php';

// Check if admin
if (!isset($_SESSION['id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../php/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Manage Products</h2>
        
        <!-- Add Product Form -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Add New Product</h5>
            </div>
            <div class="card-body">
                <form action="add-product.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control mb-2" placeholder="Product Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="number" step="0.01" name="price" class="form-control mb-2" placeholder="Price" required>
                        </div>
                    </div>
                    <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
                    <input type="text" name="image" class="form-control mb-2" placeholder="Image File Name">
                    <input type="text" name="category" class="form-control mb-2" placeholder="Category">
                    <button type="submit" class="btn btn-success">Add Product</button>
                </form>
            </div>
        </div>

        <!-- Products List -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM products";
                $result = mysqli_query($conn, $sql);
                
                while($product = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td>$<?php echo $product['price']; ?></td>
                    <td><?php echo $product['category']; ?></td>
                    <td>
                        <a href="edit-product.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="delete-product.php?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>