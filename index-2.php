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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media.css">
    <link rel="stylesheet" href="crousel.css">
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
 <style>
     
    </style>
  </head>

  <body>
    <main>
      <header>
        <div class="d-flex align-items-center justify-content-between">
          <div>
             <h2 class="theeee ">Top Hottest Products</h2>
          </div>
          <div class="d-flex align-items-center gap-2 scroll">
            <span id="prevBtn" class="scrolll">&#139;</span>
          <span id="nextBtn"   class="scrolll">&#155;</span>
          </div>
        </div>
      </header>
      <section id="carouselSection">
        <!-- Your product cards remain same -->
        <!----card 1-->
        <div class="product-card">
          <picture>
            <img src="img/g-dress-20.webp" alt="product" />
          </picture>
          <div class="card-body mt-4">
            <p>
              <b class="mt-5">Wireless Earbuds</b><BR>
              <small>Noise Cancelling</small>
            </p>
            <samp>£89.99</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
            </p>
            <!-- <a href="#" style="background-color: purple !important;">Add to Cart</a> -->
          </div>
        </div>

        <div class="product-card">
          <picture>
            <img src="img/g-dress-18.webp" alt="product" />
          </picture>
          <div class="card-body mt-4">
            <p>
              <b class="mt-5">Gaming Mouse</b><Br>
              <small>RGB Lights</small>
            </p>
            <samp>£45.50</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
            </p>
            <!-- <a href="#" style="background-color: purple !important;">Add to Cart</a> -->
          </div>
        </div>

        <div class="product-card">
          <picture>
            <img src="img/g-dress-19.webp" alt="product" />
          </picture>
          <div class="card-body mt-4">
            <p>
              <b class="mt-5">Smart Watch</b><Br>
              <small>Fitness Tracker</small>
            </p>
            <samp>£199.99</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
            </p>
            <!-- <a href="#" style="background-color: purple !important;">Add to Cart</a> -->
          </div>
        </div>

        <div class="product-card">
          <picture>
            <img src="img/g-dress-21.webp" alt="product" />
          </picture>
          <div class="card-body mt-4">
            <p>
              <b class="mt-5">Bluetooth Speaker</b><Br>
              <small>Waterproof</small>
            </p>
            <samp>£75.25</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
            </p>
            <!-- <a href="#" style="background-color: purple !important;">Add to Cart</a> -->
          </div>
        </div>

        <div class="product-card">
          <picture>
            <img src="img/dress-2.webp" alt="product" />
          </picture>
          <div class="card-body mt-4">
            <p>
              <b class="mt-5">Laptop Bag</b><Br>
              <small>Leather Finish</small>
            </p>
            <samp>£55.00</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
            </p>
            <!-- <a href="#" style="background-color: purple !important;">Add to Cart</a> -->
          </div>
        </div>

        <div class="product-card">
          <picture>
            <img src="img/g-c-3.webp" alt="product" />
          </picture>
          <div class="card-body mt-4">
            <p>
              <b class="mt-5">Phone Case</b><Br>
              <small>Shockproof</small>
            </p>
            <samp>£19.99</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
            </p>
            <!-- <a href="#" style="background-color: purple !important;">Add to Cart</a> -->
          </div>
        </div>

        <div class="product-card">
          <picture>
            <img src="img/g-dress-23.webp" alt="product" />
          </picture>
          <div class="card-body mt-4">
            <p>
              <b class="mt-5">Tablet Stand</b><Br>
              <small>Adjustable</small>
            </p>
            <samp>£29.99</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
            </p>
            <!-- <a href="#" style="background-color: purple !important;">Add to Cart</a> -->
          </div>
        </div>

        <div class="product-card">
          <picture>
            <img src="img/ggg.webp" alt="product" />
          </picture>
          <div class="card-body mt-4">
            <p>
              <b class="mt-5">Tablet Stand</b><Br>
              <small>Adjustable</small>
            </p>
            <samp>£29.99</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
            </p>
            <!-- <a href="#" style="background-color: purple !important;">Add to Cart</a> -->
          </div>
        </div>

        <div class="product-card">
          <picture>
            <img src="img/g-dress-5.avif" alt="product" />
          </picture>
          <div class="card-body mt-4">
            <p>
              <b class="mt-5">Power Bank</b><Br>
              <small>Fast Charging</small>
            </p>
            <samp>£39.99</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
            </p>
            <!-- <a href="#" style="background-color: purple !important;">Add to Cart</a> -->
          </div>
        </div>

        <div class="product-card">
          <picture>
            <img src="img/g-dress-3.avif" alt="product" />
          </picture>
          <div class="card-body mt-4">
            <p>
              <b class="mt-5">Web Camera</b><Br>
              <small>HD Quality</small>
            </p>
            <samp>£65.75</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
            </p>
            <!-- <a href="#" style="background-color: purple !important;">Add to Cart</a> -->
          </div>
        </div>

        <div class="product-card">
          <picture>
            <img src="img/g-dress-4.avif" alt="product" />
          </picture>
          <div class="card-body mt-4">
            <p>
              <b class="mt-5">Keyboard RGB</b><Br>
              <small>Mechanical</small>
            </p>
            <samp>£89.99</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
            </p>
            <!-- <a href="#" style="background-color: purple !important;">Add to Cart</a> -->
          </div>
        </div>

        <div class="product-card">
          <picture>
            <img src="img/g-dress-6.avif" alt="product" />
          </picture>
          <div class="card-body mt-4">
            <p>
              <!-- <b class="mt-5">USB Cable</b><Br>
               \
               \[--->
              <small>Type C</small>
            </p>
            <samp>£15.49</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
            </p>
            <!-- <a href="#" style="background-color: purple !important;">Add to Cart</a> -->
          </div>
        </div>
      </section>
    </main>
    <!-- Footer -->

      <!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
              <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
              <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
              <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
              <li><a href="http://scanfcode.com/category/android/">Android</a></li>
              <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/about/">About Us</a></li>
              <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
              <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
              <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
              <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
         <a href="#">Scanfcode</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>
<style>
  .site-footer
{
  background-color:#26272b;
  padding:45px 0 20px;
  font-size:15px;
  line-height:24px;
  color:#737373;
}
.site-footer hr
{
  border-top-color:#bbb;
  opacity:0.5
}
.site-footer hr.small
{
  margin:20px 0
}
.site-footer h6
{
  color:#fff;
  font-size:16px;
  text-transform:uppercase;
  margin-top:5px;
  letter-spacing:2px
}
.site-footer a
{
  color:#737373;
}
.site-footer a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links
{
  padding-left:0;
  list-style:none
}
.footer-links li
{
  display:block
}
.footer-links a
{
  color:#737373
}
.footer-links a:active,.footer-links a:focus,.footer-links a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links.inline li
{
  display:inline-block
}
.site-footer .social-icons
{
  text-align:right
}
.site-footer .social-icons a
{
  width:40px;
  height:40px;
  line-height:40px;
  margin-left:6px;
  margin-right:0;
  border-radius:100%;
  background-color:#33353d
}
.copyright-text
{
  margin:0
}
@media (max-width:991px)
{
  .site-footer [class^=col-]
  {
    margin-bottom:30px
  }
}
@media (max-width:767px)
{
  .site-footer
  {
    padding-bottom:0
  }
  .site-footer .copyright-text,.site-footer .social-icons
  {
    text-align:center
  }
}
.social-icons
{
  padding-left:0;
  margin-bottom:0;
  list-style:none
}
.social-icons li
{
  display:inline-block;
  margin-bottom:4px
}
.social-icons li.title
{
  margin-right:15px;
  text-transform:uppercase;
  color:#96a2b2;
  font-weight:700;
  font-size:13px
}
.social-icons a{
  background-color:#eceeef;
  color:#818a91;
  font-size:16px;
  display:inline-block;
  line-height:44px;
  width:44px;
  height:44px;
  text-align:center;
  margin-right:8px;
  border-radius:100%;
  -webkit-transition:all .2s linear;
  -o-transition:all .2s linear;
  transition:all .2s linear
}
.social-icons a:active,.social-icons a:focus,.social-icons a:hover
{
  color:#fff;
  background-color:#29aafe
}
.social-icons.size-sm a
{
  line-height:34px;
  height:34px;
  width:34px;
  font-size:14px
}
.social-icons a.facebook:hover
{
  background-color:#3b5998
}
.social-icons a.twitter:hover
{
  background-color:#00aced
}
.social-icons a.linkedin:hover
{
  background-color:#007bb6
}
.social-icons a.dribbble:hover
{
  background-color:#ea4c89
}
@media (max-width:767px)
{
  .social-icons li.title
  {
    display:block;
    margin-right:0;
    font-weight:600
  }
}
</style>

    
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

        // Carousel JavaScript Code
    // Carousel JavaScript Code - CORRECTED
    document.addEventListener('DOMContentLoaded', function() {
        const carouselSection = document.getElementById('carouselSection');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        
        // Check if elements exist
        if (!carouselSection || !prevBtn || !nextBtn) {
            console.log('Carousel elements not found');
            return;
        }
        
        const productCards = document.querySelectorAll('.product-card');
        
        if (productCards.length === 0) {
            console.log('No product cards found');
            return;
        }
        
        const cardWidth = productCards[0].offsetWidth + 20; // card width + margin
        let scrollPosition = 0;
        
        console.log('Carousel initialized with card width:', cardWidth);
        
        // Next button functionality
        nextBtn.addEventListener('click', function() {
            const maxScroll = carouselSection.scrollWidth - carouselSection.clientWidth;
            
            if (scrollPosition < maxScroll) {
                scrollPosition += cardWidth * 2; // Scroll 2 cards at a time
                if (scrollPosition > maxScroll) {
                    scrollPosition = maxScroll;
                }
                carouselSection.scrollTo({
                    left: scrollPosition,
                    behavior: 'smooth'
                });
            }
            console.log('Next clicked, position:', scrollPosition);
        });
        
        // Previous button functionality
        prevBtn.addEventListener('click', function() {
            if (scrollPosition > 0) {
                scrollPosition -= cardWidth * 2; // Scroll 2 cards at a time
                if (scrollPosition < 0) {
                    scrollPosition = 0;
                }
                carouselSection.scrollTo({
                    left: scrollPosition,
                    behavior: 'smooth'
                });
            }
            console.log('Prev clicked, position:', scrollPosition);
        });
        
        // Auto scroll every 5 seconds
        setInterval(function() {
            const maxScroll = carouselSection.scrollWidth - carouselSection.clientWidth;
            
            if (scrollPosition >= maxScroll) {
                scrollPosition = 0; // Reset to start
            } else {
                scrollPosition += cardWidth;
            }
            
            carouselSection.scrollTo({
                left: scrollPosition,
                behavior: 'smooth'
            });
        }, 5000);
        
        // Update scroll position when user manually scrolls
        carouselSection.addEventListener('scroll', function() {
            scrollPosition = carouselSection.scrollLeft;
        });
    });
</script>
</body>
</html>