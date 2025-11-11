<?php include '../include/header.php'; ?>

<div class="container mt-4">
    <h1>Add New Product</h1>

    <form action="add_product_action.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Old Price</label>
            <input type="number" step="0.01" name="old_price" class="form-control">
        </div>
        <div class="mb-3">
            <label>Discount</label>
            <input type="text" name="discount" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tag</label>
            <input type="text" name="tag" class="form-control">
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-success">Add Product</button>
    </form>
</div>
