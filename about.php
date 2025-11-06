 <?php
    include "header.php";
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/4.0.0/font/MaterialIcons-Regular.ttf">
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
<style>
    /* Main Content Styling */
main {
  padding: 0;
  /* max-width: 100%; */
  margin: 0 auto;
  background-color: #ffffff;
  line-height: 1.6;
  margin-top: 5rem;
}

/* Hero Section */
.hero-section {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
  padding: 120px 20px 80px;
  text-align: center;
  margin-top: 0px;
}

.hero-content {
  max-width: 800px;
  margin: 0 auto;
}

.hero-title {
  font-size: 3.5rem;
  font-weight: 700;
  color: #212529;
  margin-bottom: 1rem;
  letter-spacing: -0.02em;
}

.hero-subtitle {
  font-size: 1.5rem;
  color: #6c757d;
  margin-bottom: 2rem;
  font-weight: 300;
}

.hero-divider {
  width: 80px;
  height: 3px;
  background: linear-gradient(90deg, #007bff, #0056b3);
  margin: 0 auto 2rem;
  border-radius: 2px;
}

.hero-description {
  font-size: 1.2rem;
  color: #495057;
  line-height: 1.8;
  max-width: 600px;
  margin: 0 auto;
}

/* Section Headers */
.section-header {
  text-align: center;
  margin-bottom: 4rem;
}

.section-title {
  font-size: 2.5rem;
  font-weight: 600;
  color: #212529;
  margin-bottom: 1rem;
  letter-spacing: -0.01em;
}

.section-subtitle {
  font-size: 1.1rem;
  color: #6c757d;
  font-weight: 300;
}

.section-divider {
  width: 60px;
  height: 2px;
  background: #007bff;
  margin: 2rem auto 0;
  border-radius: 1px;
}

/* Values Section */
.values-section {
  padding: 80px 20px;
  background-color: #ffffff;
}

.values-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2.5rem;
  max-width: 1200px;
  margin: 0 auto;
}

.value-card {
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  padding: 3rem 2rem;
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.value-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.value-icon {
  font-size: 3rem;
  color: #007bff;
  margin-bottom: 1rem;
}

.value-title {
  font-size: 1.5rem;
  font-weight: 600;
  color: #343a40;
  margin-bottom: 0.5rem;
}

.value-description {
  color: #6c757d;
  font-size: 1rem;
  line-height: 1.7;
}

/* Team Section */
.team-section {
  padding: 80px 20px;
  background-color: #f8f9fa;
}

.team-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2.5rem;
  max-width: 1200px;
  margin: 0 auto;
}

.team-member {
  text-align: center;
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.team-member:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

.team-member img {
  width: 100%;
  height: auto;
  border-top-left-radius: 12px;
  border-top-right-radius: 12px;
  object-fit: cover;
  aspect-ratio: 1/1;
}

.member-info {
  padding: 1.5rem;
}

.member-name {
  font-size: 1.3rem;
  font-weight: 600;
  color: #343a40;
  margin-bottom: 0.25rem;
}

.member-role {
  font-size: 0.95rem;
  color: #6c757d;
  font-weight: 400;
  text-transform: uppercase;
}

/* Journey Section */
.journey-section {
  padding: 80px 20px;
  background-color: #ffffff;
}

.journey-stats {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
  margin-top: 3rem;
  background-color: #f8f9fa;
  padding: 40px;
  border-radius: 12px;
}

.stat-item {
  text-align: center;
  padding: 1.5rem;
}

.stat-number {
  display: block;
  font-size: 2.5rem;
  font-weight: 700;
  color: #007bff;
  margin-bottom: 0.5rem;
}

.stat-label {
  font-size: 1rem;
  color: #6c757d;
  font-weight: 500;
}
/* Responsive Design */
@media screen and (max-width: 768px) {
  .hero-title {
    font-size: 2.5rem;
  }
  
  .hero-subtitle {
    font-size: 1.2rem;
  }
  
  .hero-description {
    font-size: 1.1rem;
  }
  
  .section-title {
    font-size: 2rem;
  }
  
  .values-grid {
    grid-template-columns: 1fr;
    gap: 2rem;
  }
  
  .value-card {
    padding: 2rem 1.5rem;
  }
  
  .journey-stats {
    grid-template-columns: 1fr;
  }
}
</style>
</head>
<body>
  <!-- <nav style="background-color: #ffffff; position: fixed;" class="navbar navbar-expand-md fixed-top"> 
    <div id="nav">
      <div>
       <button id="menu" type="menu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-solid fa-bars">  Menu</i></button>
      </div>
      <div id="brand-logo">
        <a href="index.html"><img src="img/NEXTAGt.png" alt="NEXTAG Logo"></a>
      </div>
      <div id="search-profile">
        <div id="search_"></div>
       <button type="button" id="search" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i class="fa-solid fa-magnifying-glass"></i></button>
       <button type="button" id="search" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop">
         <i class="fa-solid fa-cart-shopping"></i>
       </button>
       <button type="button" id="user-btn">
         <i class="fa-solid fa-user"></i>
       </button>
      </div>
    </div>
  </nav> -->
  
  <!-- off-canvas for menu -->

        <!-- Hero Section -->
        <section class="hero-section">
          <div class="hero-content">
            <h1 class="hero-title">Welcome to NEXTAG</h1>
            <p class="hero-subtitle">Redefining Luxury Accessories</p>
            <div class="hero-divider"></div>
            <p class="hero-description">
              NEXTAG is a luxury brand dedicated to crafting high-end bags and wallets that seamlessly blend 
              style and practicality. Our goal is to redefine fashion accessories with unparalleled quality 
              and sophistication.
            </p>
          </div>
        </section>

        <!-- Core Values Section -->
        <section class="values-section">
          <div class="section-header">
            <h2 class="section-title">Our Core Values</h2>
            <p class="section-subtitle">The principles that guide everything we do</p>
          </div>
          
          <div class="values-grid">
            <div class="value-card">
              <div class="value-icon">
                <i class="fas fa-gem"></i>
              </div>
              <h3 class="value-title">Excellence</h3>
              <p class="value-description">
                Every product is crafted with meticulous attention to detail and superior materials, 
                ensuring the highest quality standards.
              </p>
            </div>
            
            <div class="value-card">
              <div class="value-icon">
                <i class="fas fa-lightbulb"></i>
              </div>
              <h3 class="value-title">Innovation</h3>
              <p class="value-description">
                We stay ahead of trends, curating designs that set new standards in fashion and 
                functionality for modern lifestyles.
              </p>
            </div>
            
            <div class="value-card">
              <div class="value-icon">
                <i class="fas fa-heart"></i>
              </div>
              <h3 class="value-title">Luxury & Comfort</h3>
              <p class="value-description">
                NEXTAG ensures that elegance never compromises comfort and functionality, 
                creating accessories that enhance your daily experience.
              </p>
            </div>
          </div>
        </section>

        <!-- Journey Section -->
        <section class="journey-section">
          <div class="journey-content">
            <div class="section-header">
              <h2 class="section-title">Our Journey</h2>
              <div class="section-divider"></div>
            </div>
            <div class="journey-text">
              <p class="journey-description">
                NEXTAG was founded with a vision to redefine luxury accessories. Since our inception, 
                we have expanded globally, becoming a brand synonymous with sophistication and craftsmanship. 
                Our commitment to excellence has earned us the trust of discerning customers worldwide.
              </p>
              <div class="journey-stats">
                <div class="stat-item">
                  <span class="stat-number">10+</span>
                  <span class="stat-label">Years of Excellence</span>
                </div>
                <div class="stat-item">
                  <span class="stat-number">50+</span>
                  <span class="stat-label">Countries Served</span>
                </div>
                <div class="stat-item">
                  <span class="stat-number">100K+</span>
                  <span class="stat-label">Happy Customers</span>
                </div>
              </div>
            </div>
          </div>
        </section>
    </main>
   
   <!-- Footer -->
<footer class="bg-body-tertiary text-center">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="https://www.facebook.com/" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" target="_blank" href="https://www.x.com/" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Instagram -->
      <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" target="_blank" href="https://www.instagram.com/" role="button"
        ><i class="fab fa-instagram"></i
      ></a>
    </section>
    <!-- Section: Social media -->

    <!-- Section: Form -->
    <section class="">
      <form action="">
        <!--Grid row-->
        <div class="row d-flex justify-content-center">
          <!--Grid column-->
          <div class="col-auto">
            <p class="pt-2">
              <strong>Sign up for our newsletter</strong>
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 col-12">
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="email" id="form5Example24" class="form-control" placeholder="Email Address" />
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-auto">
            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-outline btn-dark mb-4">
              Subscribe
            </button>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </form>
    </section>

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row align-item-start">
        <!--Grid column-->
        <div class="col-lg-3 col-md-4  mb-4 mb-md-2 mt-md-2">
          <article>
          <div id="nextag-info-div" class="flex items-center"><a href="index.html" style="text-decoration: none;" class="flex items-center">
            <span id="footer-logo" class="self-center text-2xl font-semibold whitespace-nowrap text-black">NEXTAG</span></a>
          </div>
          <div id="nextag-footer-info">
            <p class="text-gray-500 dark:text-dark text-sm text-start">
            NEXTAG offers a curated collection of premium purses 
            and wallets from top brands. With detailed product 
            insights, comparisons, and a seamless shopping experience,
            we make finding the perfect accessory effortless.
            </p>
          </div>
         </article>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-4 mb-4 mb-md-2 text-start">
          <h5 class="text-uppercase">Quick Links</h5>

          <ul id="footer-list" class="list-unstyled mb-0">
            <li>
              <a class="text-body nav-link" href="index.html">Home</a>
            </li>
            <li>
              <a class="text-body nav-link" href="about.html">About Us</a>
            </li>
            <li>
              <a class="text-body nav-link" href="contact.html">Contact</a>
            </li>
            <li>
              <a class="text-body nav-link" href="services.html">Services</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-4 mb-4 mb-md-2 text-start">
          <article>
          <h5 class="text-uppercase">Products</h5>
          </article>
          <ul id="footer-list" class="list-unstyled mb-0 ">
            <li>
              <a class="text-body nav-link" href="#!">Handbag</a>
            </li>
            <li>
              <a class="text-body nav-link" href="#!">Wallet</a>
            </li>
            <li>
              <a class="text-body nav-link" href="#!">Backpacks</a>
            </li>
            <li>
              <a class="text-body nav-link" href="new-arrival.html">Accessories</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-4 mb-4 mb-md-2 text-start">
          <h5 class="text-uppercase">Info</h5>

          <ul id="footer-list" class="list-unstyled mb-0">
            <li>
              <a class="text-body nav-link" href="contact.html#faqs">FAQ's</a>
            </li>
            <li>
              <a class="text-body nav-link" href="blog.html">Blog</a>
            </li>
            <li>
              <a class="text-body nav-link" href="privacy_policy.pdf" target="_blank">Privacy Policy</a>
            </li>
            <li>
              <a class="text-body nav-link" href="terms_conditions.pdf">Term's & Conditions</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2020 Copyright:
    <a class="text-reset text-semi-bold" href="index.html">NEXTAG.COM</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
   
  <!-- Search JS -->
  <script src="js/search.js"></script>
  
  <!-- Add to Cart JS -->
  <script src="js/add-to-cart.js"></script>

  <!-- Auth JS -->
  <script src="js/auth.js"></script>
    
</body>
</html>

<script>
  // for men's menu
  $('#men-list').hide();
  $('#bag-list').hide();
  $('#backpack-list').hide();
  $('#handbag-list').hide();
  $('#wallet-list').hide();
  $('#men').click(function(){
    $('#men-list').show();
    $('#men-list,#men').mouseleave(function(){
        $('#men-list').hide();
      });
  });
  // bag
  $('#bag').click(function(){
    $('#bag-list').show();
    $('#bag-list,#bag').mouseleave(function(){
        $('#bag-list').hide();
      });
  });
  // backpack
  $('#backpack').click(function(){
    $('#backpack-list').toggle();
    $('#backpack-list,#backpack').mouseleave(function(){
        $('#backpack-list').hide();
      });
  });
  // handbag
  $('#handbag').click(function(){
    $('#handbag-list').toggle();
    $('#handbag-list,#handbag').mouseleave(function(){
        $('#handbag-list').hide();
      });
  });
  // wallet
  $('#wallet').click(function(){
    $('#wallet-list').toggle();
    $('#wallet-list,#wallet').mouseleave(function(){
        $('#wallet-list').hide();
      });
  });
  
  // for women's menu
  $('#women-list').hide();
  $('#women-bag-list').hide();
  $('#women-backpack-list').hide();
  $('#women-handbag-list').hide();
  $('#women-wallet-list').hide();
  // for main women's menu
  $('#women').click(function(){
    $('#women-list').show();
  });
  // women's menu leave event
  $('#women-list,#women').mouseleave(function(){
    $('#women-list').hide();
  });
  // women's bag
  $('#women-bag').click(function(){
    $('#women-bag-list').show();
    $('#women-bag-list,#women-bag').mouseleave(function(){
      $('#women-bag-list').hide();
      });
  });
  // women's backpack
  $('#women-backpack').click(function(){
    $('#women-backpack-list').show();
    $('#women-backpack-list,#women-backpack').mouseleave(function(){
      $('#women-backpack-list').hide();
      });
  });
  // women's handbag
  $('#women-handbag').click(function(){
    $('#women-handbag-list').show();
    $('#women-handbag-list,#women-handbag').mouseleave(function(){
      $('#women-handbag-list').hide();
      });
  });
  // women's wallet
  $('#women-wallet').click(function(){
    $('#women-wallet-list').show();
    $('#women-wallet-list,#women-wallet').mouseleave(function(){
      $('#women-wallet-list').hide();
      });
  });


</script>
</body>
</html>