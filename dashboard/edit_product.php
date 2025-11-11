<?php
if(!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: products.php");
    exit();
}

include '../php/db.php';
include '../include/header.php';

$id = intval($_GET['id']);
$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);

if($result->num_rows == 0) {
    echo "<div class='alert alert-danger'>Product not found!</div>";
    exit();
}

$product = $result->fetch_assoc();
?>

<div class="container mt-4">
    <h1><i class="fa fa-edit"></i> Edit Product</h1>
    
    <form action="edit_product_action.php" method="post" enctype="multipart/form-data" class="mt-4">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-bold">Product Name *</label>
                    <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-bold">Tag</label>
                    <select name="tag" class="form-select">
                        <option value="new" <?php echo ($product['tag']=='new')?'selected':''; ?>>New</option>
                        <option value="hot" <?php echo ($product['tag']=='hot')?'selected':''; ?>>Hot</option>
                        <option value="sale" <?php echo ($product['tag']=='sale')?'selected':''; ?>>Sale</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="mb-3">
            <label class="form-label fw-bold">Description *</label>
            <textarea name="description" class="form-control" rows="3" required><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Price (Rs.) *</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="<?php echo $product['price']; ?>" required>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Old Price (Rs.)</label>
                    <input type="number" step="0.01" name="old_price" class="form-control" value="<?php echo $product['old_price']; ?>">
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Discount</label>
                    <input type="text" name="discount" class="form-control" value="<?php echo $product['discount']; ?>" placeholder="e.g., -20%">
                </div>
            </div>
        </div>
        
        <div class="mb-3">
            <label class="form-label fw-bold">Product Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            
            <?php if(!empty($product['image'])): ?>
                <div class="mt-3">
                    <p class="text-muted mb-2">Current Image:</p>
                    <img src="../<?php echo $product['image']; ?>" width="150" class="img-thumbnail">
                </div>
            <?php endif; ?>
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-success">
                <i class="fa fa-save"></i> Update Product
            </button>
            <a href="products.php" class="btn btn-secondary">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>

<?php include '../include/footer.php'; ?>