<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fashion Store - Products</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="media.css">
  <link rel="stylesheet" href="productss.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <style>
    /* Add to Cart Button Styles */
    .add-to-cart-btn {
        background: #007bff;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 600;
        transition: background 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .add-to-cart-btn:hover {
        background: #0056b3;
        color: white;
        text-decoration: none;
    }

    .add-to-cart-btn i {
        margin-right: 5px;
    }
  </style>
</head>
<body>
<?php
include "php/db.php";
include "header.php";
?>

<!-- Carousel -->
<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active"><img src="img/crousel-1.jpg" class="d-block w-100" alt=""></div>
    <div class="carousel-item"><img src="img/crousel-2.jpg" class="d-block w-100" alt=""></div>
    <div class="carousel-item"><img src="img/crousel-3.jpg" class="d-block w-100" alt=""></div>
    <div class="carousel-item"><img src="img/crousel-4.jpg" class="d-block w-100" alt=""></div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<div style="height: 100px;"></div>

<!-- Products Section -->
<div class="products-container">
<?php
$sql = "SELECT * FROM products ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
  <div class="product-one mt-5">
    <div class="product-card">
      <div class="product-two">
        <img src="<?php echo $row['image']; ?>" alt="">
      </div>
      <div class="new-pro  margin d-flex" style="margin-left: 10px;">
        <div class="d-flex newww">
          <p><?php echo $row['tag']; ?></p>
          <p><?php echo $row['discount']; ?></p>
        </div>
        <div class="add-card" style="margin-right: 20px;">
          <button class="add-to-cart-btn" 
                  onclick="addToCart(
                    <?php echo $row['id']; ?>,
                    '<?php echo addslashes($row['name']); ?>',
                    <?php echo $row['price']; ?>,
                    '<?php echo $row['image']; ?>',
                    '<?php echo addslashes($row['description']); ?>'
                  )">
            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
          </button>
        </div>
      </div>
      <div class="product-info" style="margin-left: 10px;">
        <p class="black"><?php echo $row['name']; ?><br><?php echo $row['description']; ?></p>
      </div>
      <div class="d-flex paragraph" style="margin-left: 10px;">
        <p>Rs.<?php echo number_format($row['price']); ?></p>
        <p class="pppp">Rs.<?php echo number_format($row['old_price']); ?></p>
      </div>
    </div>
  </div>
<?php
    }
} else {
    echo "<p style='text-align:center;'>No products found!</p>";
}
?>
</div>

<div style="height: 200px;"></div>

<?php include "footer.php"; ?>
</body>
</html>