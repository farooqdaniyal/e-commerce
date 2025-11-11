<?php
include '../php/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = intval($_POST['id']);
    $name = $conn->real_escape_string(trim($_POST['name']));
    $description = $conn->real_escape_string(trim($_POST['description']));
    $price = floatval($_POST['price']);
    $old_price = !empty($_POST['old_price']) ? floatval($_POST['old_price']) : 0;
    $discount = $conn->real_escape_string(trim($_POST['discount']));
    $tag = $conn->real_escape_string(trim($_POST['tag']));

    // پہلے موجود product کو fetch کریں
    $sql_select = "SELECT image FROM products WHERE id=$id";
    $result = $conn->query($sql_select);
    $current_product = $result->fetch_assoc();
    
    $image_path = $current_product['image']; // موجودہ image برقرار رکھیں

    // نئی image upload ہو تو process کریں
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0 && $_FILES['image']['size'] > 0){
        $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif','webp','avif'];

        if(in_array($file_ext, $allowed)){
            // نئی image کے لیے unique name بنائیں
            $image_name = uniqid().'_'.time().'.'.$file_ext;
            $upload_path = '../img/'.$image_name;
            
            if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)){
                $image_path = 'img/'.$image_name;
                
                // پرانی image delete کریں (اگر موجود ہو)
                if(!empty($current_product['image']) && file_exists('../'.$current_product['image'])){
                    unlink('../'.$current_product['image']);
                }
            }
        }
    }

    // UPDATE query استعمال کریں (INSERT نہیں)
    $sql = "UPDATE products SET 
            name='$name', 
            description='$description', 
            price=$price, 
            old_price=$old_price, 
            discount='$discount', 
            tag='$tag', 
            image='$image_path' 
            WHERE id=$id";
    
    if($conn->query($sql)){
        header("Location: products.php?success=Product updated successfully");
        exit();
    } else {
        die("Error: ".$conn->error);
    }
} else {
    header("Location: products.php");
    exit();
}
?>y