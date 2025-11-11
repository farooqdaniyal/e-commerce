<?php
include "../php/db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Products Dashboard</h1>
    <a href="add.php">Add New Product</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Old Price</th>
            <th>Discount</th>
            <th>Tag</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>

        <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['description']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['old_price']."</td>";
                echo "<td>".$row['discount']."</td>";
                echo "<td>".$row['tag']."</td>";
                echo "<td><img src='uploads/".$row['image']."' width='50'></td>";
                echo "<td>
                        <a href='edit_product.php?id=".$row['id']."'>Edit</a> | 
                        <a href='delete.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No products found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
