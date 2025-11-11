<?php
include '../php/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = floatval($_POST['price']);
    $old_price = floatval($_POST['old_price']);
    $discount = $conn->real_escape_string($_POST['discount']);
    $tag = $conn->real_escape_string($_POST['tag']);

    $image_name = "";

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif','webp'];

        if(in_array($file_ext, $allowed)){
            $image_name = uniqid().'_'.time().'.'.$file_ext;
            move_uploaded_file($_FILES['image']['tmp_name'], '../img/'.$image_name);
        }
    }

    $sql = "INSERT INTO products (name,description,price,old_price,discount,tag,image)
            VALUES ('$name','$description',$price,$old_price,'$discount','$tag','$image_name')";
    
    if($conn->query($sql)){
        header("Location: products.php");
    } else {
        echo "Error: ".$conn->error;
    }
}
?>
