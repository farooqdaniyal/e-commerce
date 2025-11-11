<?php
include '../php/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize inputs
    $name = $conn->real_escape_string(trim($_POST['name']));
    $description = $conn->real_escape_string(trim($_POST['description']));
    $price = floatval($_POST['price']);
    $old_price = !empty($_POST['old_price']) ? floatval($_POST['old_price']) : 0;
    $discount = $conn->real_escape_string(trim($_POST['discount']));
    $tag = $conn->real_escape_string(trim($_POST['tag']));

    $image_path = "";

    // Handle image upload
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif','webp','avif'];

        if(in_array($file_ext, $allowed)){
            // Generate unique filename
            $image_name = uniqid().'_'.time().'.'.$file_ext;
            $upload_path = '../img/'.$image_name;
            
            // Upload file
            if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)){
                $image_path = 'img/'.$image_name; // ✅ Store with 'img/' prefix
            } else {
                die("Error: Failed to upload image");
            }
        } else {
            die("Error: Invalid file type. Only JPG, PNG, GIF, WEBP, AVIF allowed.");
        }
    } else {
        die("Error: Please select an image");
    }

    // Insert into database
    $sql = "INSERT INTO products (name, description, price, old_price, discount, tag, image)
            VALUES ('$name', '$description', $price, $old_price, '$discount', '$tag', '$image_path')";
    
    if($conn->query($sql)){
        header("Location: products.php?success=Product added successfully");
        exit();
    } else {
        die("Database Error: ".$conn->error);
    }
} else {
    header("Location: add_product.php");
    exit();
}
?>