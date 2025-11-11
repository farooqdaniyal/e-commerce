<?php
require_once '../php/db.php';

if(!isset($_GET['id'])){
    header("Location: products.php");
    exit();
}

$id = intval($_GET['id']);

// Get image name before deleting
$sql_get = "SELECT image FROM products WHERE id=$id";
$result = $conn->query($sql_get);
$row = $result->fetch_assoc();

// Delete from database
$sql = "DELETE FROM products WHERE id=$id";

if($conn->query($sql)){
    // Delete image file
    if(!empty($row['image']) && file_exists('../'.$row['image'])){
        unlink('../'.$row['image']);
    }
    
    header("Location: products.php?success=Product deleted successfully");
    exit();
} else {
    die("Error: ".$conn->error);
}
?>