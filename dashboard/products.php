<?php
include '../php/db.php';
include '../include/header.php';
?>

<div class="container mt-4">
    <h1>Products Dashboard</h1>
    <a href="add_product.php" class="btn btn-primary mb-3">
        <i class="fa fa-plus"></i> Add New Product
    </a>

    <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?php echo htmlspecialchars($_GET['success']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Old Price</th>
                    <th>Discount</th>
                    <th>Tag</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM products ORDER BY id DESC";
                $result = $conn->query($sql);

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".htmlspecialchars($row['id'])."</td>";
                        
                        // Image display with better error handling
                        $image_displayed = false;
                        if(!empty($row['image'])){
                            $clean_image = trim($row['image']);
                            $image_paths_to_try = [
                                "../" . $clean_image,
                                $clean_image,
                                "../img/" . basename($clean_image)
                            ];
                            
                            foreach($image_paths_to_try as $img_path){
                                if(file_exists($img_path)){
                                    echo "<td><img src='$img_path' width='80' height='80' style='object-fit:cover;border-radius:5px;' alt='Product Image'></td>";
                                    $image_displayed = true;
                                    break;
                                }
                            }
                        }
                        
                        if(!$image_displayed){
                            echo "<td><span class='text-danger'>No Image</span></td>";
                        }
                        
                        echo "<td>".htmlspecialchars($row['name'])."</td>";
                        echo "<td>".htmlspecialchars(substr($row['description'],0,50))."...</td>";
                        echo "<td>Rs. ".number_format($row['price'], 2)."</td>";
                        echo "<td>".($row['old_price'] > 0 ? "Rs. ".number_format($row['old_price'], 2) : "-")."</td>";
                        echo "<td>".($row['discount'] ? htmlspecialchars($row['discount']) : "-")."</td>";
                        
                        // Tag with color coding
                        $tag_color = 'primary';
                        if(strtolower($row['tag']) == 'hot') $tag_color = 'danger';
                        if(strtolower($row['tag']) == 'sale') $tag_color = 'success';
                        if(strtolower($row['tag']) == 'new') $tag_color = 'info';
                        
                        echo "<td><span class='badge bg-$tag_color'>".htmlspecialchars($row['tag'])."</span></td>";
                        
                        echo "<td class='text-nowrap'>
                                <a href='edit_product.php?id=".$row['id']."' class='btn btn-warning btn-sm'>
                                    <i class='fa fa-edit'></i> Edit
                                </a>
                                <a href='delete_product.php?id=".$row['id']."' class='btn btn-danger btn-sm' onclick='return confirm(\"Delete this product?\")'>
                                    <i class='fa fa-trash'></i> Delete
                                </a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>No products found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<style>
.table img {
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.table-hover tbody tr:hover {
    background-color: #f8f9fa;
}
.btn-sm {
    margin: 2px;
}
</style>

