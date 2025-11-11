<!DOCTYPE html>
<html>
  <head>
    <title>Carousel using vanilla JavaScript</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
    <style>
        /* Your existing CSS remains same */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

:root {
  --clr-primary: #d22ae0;
  --clr-secondary: #18a337;
  --clr-white: #fff;
  --clr-bg: #eee;
  --clr-light: #fafafa;
  --clr-black: #000;
  --clr-dark: #0000008c;
  --clr-blue: #77eff6;
  --clr-star: rgb(240, 217, 9);
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: "Poppins", sans-serif;
  background-color: var(--clr-bg);
}
/*===================reset=======================*/

a {
  text-decoration: none;
  color: inherit;
}
li {
  list-style: none;
}

/*===================main======================*/
main {
  width: 100%;
  height: 52.5rem;
  margin: 0.625rem auto;
  position: relative;
  padding: 0.5rem 0;
}
.title {
  padding: 0.625rem;
  text-align: center;
  color: var(--clr-dark);
}
.title h1 {
  font-size: 3.125rem;
}
.title p {
  width: 60%;
  padding: 0.5rem;
  margin: auto;
  line-height: 1.5rem;
}
main header {
  width: 98%;
  height: 3.75rem;
  margin: 0 auto;
  align-items: center;
  display: flex;
  padding: 1.625rem;
  justify-content: space-between;
  border-bottom: 0.1rem solid var(--clr-dark);
}
header p span {
  font-size: 2.5rem;
  margin: 0 0.9rem;
  background: var(--clr-secondary);
  color: var(--clr-white);
  width: 1.875rem;
  height: 1.875rem;
  display: inline-block;
  line-height: 1.53rem;
  border-radius: 0.5rem;
  text-align: center;
  cursor: pointer;
  transition: 0.3s;
}
header p span:hover {
  background: var(--clr-primary);
  color: var(--clr-white);
}

/*==========section==========*/
section {
  display: flex;
  align-items: center;
  overflow-x: auto;
  width: 98%;
  height: 37.5rem;
  margin: auto;
  scroll-behavior: smooth; /* Smooth scrolling add kiya */
}
section::-webkit-scrollbar {
  display: none;
}
section .product-card {
  min-width: 24%;
  height: 90%;
  background: var(--clr-light);
  margin: 0 1.25rem 0 0;
  border-radius: 1.25rem;
  position: relative;
  left: 0;
  transition: 0.3s;
  flex-shrink: 0; /* Important for carousel */
}
picture {
  display: flex;
  overflow: hidden;
  margin-bottom: 1.25rem;
  width: 100%;
  height: 70%;
  padding: 1.25rem;
}
picture img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 0.625rem;
}
.card-body,
.btn {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 3.125rem;
  width: 90%;
  color: var(--clr-black);
  margin: auto;
  padding: 0.5rem;
}
small {
  color: var(--clr-primary);
}
a {
  padding: 0.5rem 0.625rem;
  font-size: 1rem;
  margin: 0.5rem 0 0 1.25rem;
  display: inline-block;
  background: var(--clr-primary);
  color: var(--clr-light);
  border-radius: 0.3rem;
  transition: 0.3s;
}
a:hover {
  background: var(--clr-black);
  color: var(--clr-white);
}
p.star {
  margin: 0.5rem auto;
  width: 65%;
  font-size: 1.5625rem;
  color: var(--clr-star);
}

/*=============media query============*/
@media (max-width: 768px) {
  .title h1 {
    font-size: 2.1875rem;
  }
  .title p {
    width: 90%;
  }
  header h1 {
    font-size: 1.5625rem;
  }
  header p span {
    font-size: 1.875rem;
  }
  section .product-card {
    min-width: 50%;
    margin: 0.9rem;
  }
  .card-body,
  .btn {
    font-size: 1rem;
  }
  a {
    padding: 0.5rem 0.625rem;
  }
}

@media (max-width: 991px) {
  .title h1 {
    font-size: 2.1875rem;
  }
  .title p {
    width: 90%;
  }
  header h1 {
    font-size: 1.5625rem;
  }
  header p span {
    font-size: 1.875rem;
  }
  section .product-card {
    max-width: 33.3%;
    margin: 0.9rem 0.9rem;
  }
  .card-body,
  .btn {
    font-size: 1rem;
  }
  a {
    padding: 0.5rem 0.625rem;
  }
}

    </style>
  </head>

  <body>
    <main>
      <div class="title">
        <h1>Carousel using vanilla JavaScript</h1>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex laborum
          aut aliquam beatae assumenda? Sit?
        </p>
      </div>
      <header>
        <h2>Top Hottest Products</h2>
        <p>
          <span id="prevBtn">&#139;</span>
          <span id="nextBtn">&#155;</span>
        </p>
      </header>
      <section id="carouselSection">
        <!-- Your product cards remain same -->
        <!----card 1-->
        <div class="product-card">
          <picture>
            <img src="https://via.placeholder.com/300x200/667eea/white?text=Product+1" alt="product" />
          </picture>
          <div class="card-body">
            <p>
              <b>Premium Headphones</b>
              <small>New Arrival</small>
            </p>
            <samp>£120.99</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
            </p>
            <a href="#">Add to Cart</a>
          </div>
        </div>

        <!----card 2-->
        <div class="product-card">
          <picture>
            <img src="https://via.placeholder.com/300x200/f093fb/white?text=Product+2" alt="product" />
          </picture>
          <div class="card-body">
            <p>
              <b>Smart Watch Pro</b>
              <small>New Collection</small>
            </p>
            <samp>£199.99</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&starf;</strong>
            </p>
            <a href="#">Add to Cart</a>
          </div>
        </div>

        <!----card 3-->
        <div class="product-card">
          <picture>
            <img src="https://via.placeholder.com/300x200/4facfe/white?text=Product+3" alt="product" />
          </picture>
          <div class="card-body">
            <p>
              <b>Gaming Laptop</b>
              <small>Limited Stock</small>
            </p>
            <samp>£1200.99</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&starf;</strong>
              <strong>&starf;</strong>
            </p>
            <a href="#">Add to Cart</a>
          </div>
        </div>

        <!----card 4-->
        <div class="product-card">
          <picture>
            <img src="https://via.placeholder.com/300x200/f5576c/white?text=Product+4" alt="product" />
          </picture>
          <div class="card-body">
            <p>
              <b>Wireless Earbuds</b>
              <small>Best Seller</small>
            </p>
            <samp>£79.99</samp>
          </div>
          <div class="btn">
            <p class="star">
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&star;</strong>
              <strong>&starf;</strong>
            </p>
            <a href="#">Add to Cart</a>
          </div>
        </div>

        <!-- Add more cards as needed -->
      </section>
    </main>

    <script>
      // Carousel JavaScript Code
      document.addEventListener('DOMContentLoaded', function() {
        const carouselSection = document.getElementById('carouselSection');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const productCards = document.querySelectorAll('.product-card');
        
        const cardWidth = productCards[0].offsetWidth + 20; // card width + margin
        let scrollPosition = 0;
        
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