<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- style cdn -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media.css">
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
      <?php
      include "header.php";
      ?>

<div style="height: 100px;"></div>
    <div class="products-container">
    
    <!-- Product 1 -->
    <div class="product-one">
        <div class="product-card">
            <div class="product-two">
                <img src="img/g-dress-12.jpg" alt="">
            </div>
            <div class="new-pro mt-4 margin d-flex"style="margin-left: 10px;" >
                <div class="d-flex newww">
                    <p>new</p>
                    <p>-30%</p>
                </div>
                <div class="add-card" style="margin-right: 20px;">
                    <a href=""><button><i class="fa-solid fa-cart-shopping"></i>Add to Card</button></a>
                </div>
            </div>    
            <div class="product-info" style="margin-left: 10px;">
                <p class="black">Floral Print Summer Dress <br> Cotton Blend</p>
            </div>
            <div class="d-flex paragraph" style="margin-left: 10px;">
                <p>Rs.2,499</p>
                <p class="pppp">Rs.3,570</p>
            </div>         
        </div>      
    </div>

    <!-- Product 2 -->
    <div class="product-one">
        <div class="product-card">
            <div class="product-two">
                <img src="img/g-dress-13.jpg" alt="">
            </div>
            <div class="new-pro mt-4 margin d-flex"style="margin-left: 10px;" >
                <div class="d-flex newww">
                    <p>hot</p>
                    <p>-25%</p>
                </div>
                <div class="add-card" style="margin-right: 20px;">
                    <a href=""><button><i class="fa-solid fa-cart-shopping"></i>Add to Card</button></a>
                </div>
            </div>    
            <div class="product-info" style="margin-left: 10px;">
                <p class="black">Designer Party Wear Gown <br> Silk Fabric</p>
            </div>
            <div class="d-flex paragraph" style="margin-left: 10px;">
                <p>Rs.8,999</p>
                <p class="pppp">Rs.11,999</p>
            </div>         
        </div>      
    </div>

    <!-- Product 3 -->
    <div class="product-one">
        <div class="product-card">
            <div class="product-two">
                <img src="img/g-dress-14.jpg" alt="">
            </div>
            <div class="new-pro mt-4 margin d-flex"style="margin-left: 10px;" >
                <div class="d-flex newww">
                    <p>sale</p>
                    <p>-40%</p>
                </div>
                <div class="add-card" style="margin-right: 20px;">
                    <a href=""><button><i class="fa-solid fa-cart-shopping"></i>Add to Card</button></a>
                </div>
            </div>    
            <div class="product-info" style="margin-left: 10px;">
                <p class="black">Casual Office Wear Suit <br> Linen Material</p>
            </div>
            <div class="d-flex paragraph" style="margin-left: 10px;">
                <p>Rs.3,799</p>
                <p class="pppp">Rs.6,332</p>
            </div>         
        </div>      
    </div>

    <!-- Product 4 -->
    <div class="product-one">
        <div class="product-card">
            <div class="product-two">
                <img src="img/g-dress-15.jpg" alt="">
            </div>
            <div class="new-pro mt-4 margin d-flex"style="margin-left: 10px;" >
                <div class="d-flex newww">
                    <p>new</p>
                    <p>-15%</p>
                </div>
                <div class="add-card" style="margin-right: 20px;">
                    <a href=""><button><i class="fa-solid fa-cart-shopping"></i>Add to Card</button></a>
                </div>
            </div>    
            <div class="product-info" style="margin-left: 10px;">
                <p class="black">Evening Cocktail Dress <br> Satin Finish</p>
            </div>
            <div class="d-flex paragraph" style="margin-left: 10px;">
                <p>Rs.6,499</p>
                <p class="pppp">Rs.7,645</p>
            </div>         
        </div>      
    </div>

    <!-- Product 5 -->
    <div class="product-one mt-5">
        <div class="product-card">
            <div class="product-two">
                <img src="img/baby.jpg" alt="">
            </div>
            <div class="new-pro mt-4 margin d-flex"style="margin-left: 10px;" >
                <div class="d-flex newww">
                    <p>new</p>
                    <p>-20%</p>
                </div>
                <div class="add-card" style="margin-right: 20px;">
                    <a href=""><button><i class="fa-solid fa-cart-shopping"></i>Add to Card</button></a>
                </div>
            </div>    
            <div class="product-info" style="margin-left: 10px;">
                <p class="black">Kids Cotton T-Shirt <br> Combo Pack of 3</p>
            </div>
            <div class="d-flex paragraph" style="margin-left: 10px;">
                <p>Rs.899</p>
                <p class="pppp">Rs.1,124</p>
            </div>         
        </div>      
    </div>

    <!-- Product 6 -->
    <div class="product-one mt-5">
        <div class="product-card">
            <div class="product-two">
                <img src="img/baby.jpg" alt="">
            </div>
            <div class="new-pro mt-4 margin d-flex"style="margin-left: 10px;" >
                <div class="d-flex newww">
                    <p>hot</p>
                    <p>-35%</p>
                </div>
                <div class="add-card" style="margin-right: 20px;">
                    <a href=""><button><i class="fa-solid fa-cart-shopping"></i>Add to Card</button></a>
                </div>
            </div>    
            <div class="product-info" style="margin-left: 10px;">
                <p class="black">Baby Romper Set <br> Organic Cotton</p>
            </div>
            <div class="d-flex paragraph" style="margin-left: 10px;">
                <p>Rs.1,299</p>
                <p class="pppp">Rs.1,998</p>
            </div>         
        </div>      
    </div>

    <!-- Product 7 -->
    <div class="product-one mt-5">
        <div class="product-card">
            <div class="product-two">
                <img src="img/baby.jpg" alt="">
            </div>
            <div class="new-pro mt-4 margin d-flex"style="margin-left: 10px;" >
                <div class="d-flex newww">
                    <p>sale</p>
                    <p>-50%</p>
                </div>
                <div class="add-card" style="margin-right: 20px;">
                    <a href=""><button><i class="fa-solid fa-cart-shopping"></i>Add to Card</button></a>
                </div>
            </div>    
            <div class="product-info" style="margin-left: 10px;">
                <p class="black">Winter Jacket for Kids <br> Warm Fleece</p>
            </div>
            <div class="d-flex paragraph" style="margin-left: 10px;">
                <p>Rs.1,599</p>
                <p class="pppp">Rs.3,198</p>
            </div>         
        </div>      
    </div>

    <!-- Product 8 -->
    <div class="product-one mt-5">
        <div class="product-card">
            <div class="product-two">
                <img src="img/baby.jpg" alt="">
            </div>
            <div class="new-pro mt-4 margin d-flex"style="margin-left: 10px;" >
                <div class="d-flex newww">
                    <p>new</p>
                    <p>-10%</p>
                </div>
                <div class="add-card" style="margin-right: 20px;">
                    <a href=""><button><i class="fa-solid fa-cart-shopping"></i>Add to Card</button></a>
                </div>
            </div>    
            <div class="product-info" style="margin-left: 10px;">
                <p class="black">Baby Shoes Pair <br> Soft Sole</p>
            </div>
            <div class="d-flex paragraph" style="margin-left: 10px;">
                <p>Rs.799</p>
                <p class="pppp">Rs.888</p>
            </div>         
        </div>      
    </div>

    <!-- Product 9 -->
    <div class="product-one mt-5">
        <div class="product-card">
            <div class="product-two">
                <img src="img/baby.jpg" alt="">
            </div>
            <div class="new-pro mt-4 margin d-flex"style="margin-left: 10px;" >
                <div class="d-flex newww">
                    <p>hot</p>
                    <p>-45%</p>
                </div>
                <div class="add-card" style="margin-right: 20px;">
                    <a href=""><button><i class="fa-solid fa-cart-shopping"></i>Add to Card</button></a>
                </div>
            </div>    
            <div class="product-info" style="margin-left: 10px;">
                <p class="black">Designer Kurti Set <br> Chiffon Fabric</p>
            </div>
            <div class="d-flex paragraph" style="margin-left: 10px;">
                <p>Rs.2,199</p>
                <p class="pppp">Rs.3,998</p>
            </div>         
        </div>      
    </div>

    <!-- Product 10 -->
    <div class="product-one mt-5">
        <div class="product-card">
            <div class="product-two">
                <img src="img/baby.jpg" alt="">
            </div>
            <div class="new-pro mt-4 margin d-flex"style="margin-left: 10px;" >
                <div class="d-flex newww">
                    <p>sale</p>
                    <p>-60%</p>
                </div>
                <div class="add-card" style="margin-right: 20px;">
                    <a href=""><button><i class="fa-solid fa-cart-shopping"></i>Add to Card</button></a>
                </div>
            </div>    
            <div class="product-info" style="margin-left: 10px;">
                <p class="black">Men's Formal Shirt <br> Cotton Blend</p>
            </div>
            <div class="d-flex paragraph" style="margin-left: 10px;">
                <p>Rs.1,299</p>
                <p class="pppp">Rs.3,248</p>
            </div>         
        </div>      
    </div>

    <!-- Product 11 -->
    <div class="product-one mt-5">
        <div class="product-card">
            <div class="product-two">
                <img src="img/baby.jpg" alt="">
            </div>
            <div class="new-pro mt-4 margin d-flex"style="margin-left: 10px;" >
                <div class="d-flex newww">
                    <p>new</p>
                    <p>-25%</p>
                </div>
                <div class="add-card" style="margin-right: 20px;">
                    <a href=""><button><i class="fa-solid fa-cart-shopping"></i>Add to Card</button></a>
                </div>
            </div>    
            <div class="product-info" style="margin-left: 10px;">
                <p class="black">Women's Handbag <br> Genuine Leather</p>
            </div>
            <div class="d-flex paragraph" style="margin-left: 10px;">
                <p>Rs.3,499</p>
                <p class="pppp">Rs.4,665</p>
            </div>         
        </div>      
    </div>

    <!-- Product 12 -->
    <div class="product-one mt-5">
        <div class="product-card">
            <div class="product-two">
                <img src="img/baby.jpg" alt="">
            </div>
            <div class="new-pro mt-4 margin d-flex"style="margin-left: 10px;" >
                <div class="d-flex newww">
                    <p>hot</p>
                    <p>-30%</p>
                </div>
                <div class="add-card" style="margin-right: 20px;">
                    <a href=""><button><i class="fa-solid fa-cart-shopping"></i>Add to Card</button></a>
                </div>
            </div>    
            <div class="product-info" style="margin-left: 10px;">
                <p class="black">Sports Shoes <br> Running & Gym</p>
            </div>
            <div class="d-flex paragraph" style="margin-left: 10px;">
                <p>Rs.2,899</p>
                <p class="pppp">Rs.4,141</p>
            </div>         
        </div>      
    </div>

</div>

<div style="height: 200px;"></div>
           
<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Fashion Store
          </h6>
          <p>
            Your one-stop destination for trendy fashion and accessories. Quality products at affordable prices.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Women's Wear</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Men's Fashion</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Kids Collection</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Accessories</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> Mumbai, MH 400001, INDIA</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@fashionstore.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 91 98765 43210</p>
          <p><i class="fas fa-print me-3"></i> + 91 98765 43211</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2024 Copyright:
    <a class="text-reset fw-bold" href="#">FashionStore.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</body>
</html>