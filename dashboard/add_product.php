<!-- ============================================ -->
<!-- FILE: dashboard/add_product.php -->
<!-- ============================================ -->
<?php include '../include/header.php'; ?>

<div class="container mt-4">
    <h1><i class="fa fa-plus-circle"></i> Add New Product</h1>
    
    <form action="add_product_action.php" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-bold">Product Name *</label>
                    <input type="text" name="name" class="form-control" required placeholder="e.g., Designer Party Wear Gown">
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-bold">Tag *</label>
                    <select name="tag" class="form-select" required>
                        <option value="">Select Tag</option>
                        <option value="new">New</option>
                        <option value="hot">Hot</option>
                        <option value="sale">Sale</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="mb-3">
            <label class="form-label fw-bold">Description *</label>
            <textarea name="description" class="form-control" rows="3" required placeholder="Product description..."></textarea>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Price (Rs.) *</label>
                    <input type="number" step="0.01" name="price" class="form-control" required placeholder="e.g., 3999">
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Old Price (Rs.)</label>
                    <input type="number" step="0.01" name="old_price" class="form-control" placeholder="e.g., 4999">
                    <small class="text-muted">Leave empty if no old price</small>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Discount</label>
                    <input type="text" name="discount" class="form-control" placeholder="e.g., -25%">
                    <small class="text-muted">Format: -20%, -50%, etc.</small>
                </div>
            </div>
        </div>
        
        <div class="mb-3">
            <label class="form-label fw-bold">Product Image *</label>
            <input type="file" name="image" class="form-control" accept="image/*" required id="imageInput">
            <small class="text-muted">Allowed: JPG, JPEG, PNG, GIF, WEBP, AVIF</small>
            
            <!-- Image Preview -->
            <div class="mt-3" id="imagePreview" style="display:none;">
                <p class="text-muted mb-2">Preview:</p>
                <img id="previewImg" src="" width="200" class="img-thumbnail">
            </div>
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-success btn-lg">
                <i class="fa fa-save"></i> Add Product
            </button>
            <a href="products.php" class="btn btn-secondary btn-lg">
                <i class="fa fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>

<script>
// Image preview before upload
document.getElementById('imageInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
});
</script>

<style>
.form-label.fw-bold {
    color: #333;
    margin-bottom: 8px;
}

.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

small.text-muted {
    font-size: 0.85rem;
}

.img-thumbnail {
    border: 2px solid #dee2e6;
}
</style>

<?php include '../include/footer.php'; ?>


<!-- ============================================ -->
<!-- FILE: dashboard/add_product_action.php -->
<!-- ============================================ -->
