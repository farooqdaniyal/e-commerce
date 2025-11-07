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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
</head>
<body>

  <?php
include "header.php";
?>
    <!-- Demo Content -->
   <img src="img/nav.jpg" style="width: 100%;" alt="">

    <div class="container  mt-5">
    <div class="row">
        <!-- Column 1 -->
        <div class="col-xl-3 col-md-3 col-sm-12 mb-3">
            <img src="img/suit.jpg" style="height: 400px; width: 500px;" alt="Image 1" class="img-fluid">
             <!-- <h3 class="text-center" style="text-transform: uppercase;">Female</h3> -->
        </div>
        
        <!-- Column 2 -->
        <div class="col-xl-3 col-md-3 col-sm-12 mb-3">
            <img src="img/shirts.jpg" style="height: 400px; width: 500px;" alt="Image 2" class="img-fluid">
             <!-- <h3 class="text-center" style="text-transform: uppercase;">Men</h3> -->
        </div>

         <div class="col-xl-3 col-md-3 col-sm-12 mb-3">
            <img src="img/kidess.jpg" style="height: 400px; width: 500px;" alt="Image 3" class="img-fluid">
            <!-- <h5 class="text-center" style="text-transform: uppercase;">Kids</h5> -->
        </div>
        
        <!-- Column 3 -->
        <div class="col-xl-3 col-md-3 col-sm-12 mb-3">
            <img src="img/back.jpeg" style="height: 400px; width: 500px;" alt="Image 3" class="img-fluid">
            <!-- <h5 class="text-center" style="text-transform: uppercase;">Kids</h5> -->
        </div>
    </div>
</div>


<h1></h1>
<div class="container">
    <div class="row">
        <div class="col-xl-6 col-md-3 col-sm-12 mb-3"> 
            <img src="img/g-dress-3.avif" style="width: 90%;" alt="">
        </div>      
        <div class="col-xl-6 col-md-3 col-sm-12 mb-3"> 
            <img src="img/g-dress-4.avif" style="width: 90%;" alt="">
        </div>     
    </div>
</div>

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
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
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
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
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
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
    <script>
        // Toggle Mobile Menu
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            const sidebar = document.getElementById('mobileSidebar');
            const hamburger = document.getElementById('hamburger');
            
            menu.classList.toggle('active');
            sidebar.classList.toggle('active');
            hamburger.classList.toggle('active');
        }

        // Close Mobile Menu
        function closeMenu() {
            const menu = document.getElementById('mobileMenu');
            const sidebar = document.getElementById('mobileSidebar');
            const hamburger = document.getElementById('hamburger');
            
            menu.classList.remove('active');
            sidebar.classList.remove('active');
            hamburger.classList.remove('active');
        }

        // Toggle Mobile Dropdown
        function toggleMobileDropdown(event, id) {
            event.preventDefault();
            const dropdown = document.getElementById(id);
            const clickedLink = event.currentTarget;
            
            // Toggle active class on dropdown content
            dropdown.classList.toggle('active');
            
            // Toggle active class on the clicked link (for arrow rotation)
            clickedLink.classList.toggle('active');
        }

        // Close menu when clicking on a link (except dropdowns)
        document.querySelectorAll('.mobile-nav-links > a').forEach(link => {
            link.addEventListener('click', function() {
                closeMenu();
            });
        });

        // Close dropdown items
        document.querySelectorAll('.mobile-dropdown-content a').forEach(link => {
            link.addEventListener('click', function() {
                closeMenu();
            });
        });
    </script>
</body>
</html>