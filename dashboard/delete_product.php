<?php
include '../php/db.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = intval($_GET['id']);
    
    // پہلے product کی details fetch کریں
    $sql_select = "SELECT image FROM products WHERE id=$id";
    $result = $conn->query($sql_select);
    
    if($result->num_rows > 0){
        $product = $result->fetch_assoc();
        
        // Image delete کریں (اگر موجود ہو)
        if(!empty($product['image']) && file_exists('../'.$product['image'])){
            unlink('../'.$product['image']);
        }
        
        // Database سے record delete کریں
        $sql_delete = "DELETE FROM products WHERE id=$id";
        if($conn->query($sql_delete)){
            header("Location: products.php?success=Product deleted successfully");
        } else {
            header("Location: products.php?error=Error deleting product");
        }
    } else {
        header("Location: products.php?error=Product not found");
    }
} else {
    header("Location: products.php");
}
exit();
?>