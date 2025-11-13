<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* Footer Section Styling */
    *{
      color: #000 !important;
    }
.footer-img {
    background-color: #ffffffff;
    color: white;
    padding: 50px;
    flex-wrap: wrap;
}

.footer-one {
    display: flex;
    justify-content: space-evenly;
    border-top: 1px solid;
}

.footer-a {
    display: flex;
    flex-direction: column;
    margin-top: 50px;
}

.footer-a a {
    text-decoration: none;
    color: #FFFFFF;
    margin-top: 15px;
    font-weight: 200;
    transition: all 0.3s ease;
}

.footer-a a:hover {
    transform: translateX(8px);
    color: #ffffff;
}

.footer-a h3 {
    font-weight: bold;
    color: #ffffff;
    font-size: 17px;
    margin-bottom: 20px;
    text-transform: uppercase;
}

.footer-end img {
    height: 50px;
    width: 150px;
}

.footer-a p {
    font-size: 14px;
    margin-top: 20px;
}

.footer-aa {
    display: flex;
    font-size: 18px;
    gap: 10px;
    margin-top: 15px;
}

.footer-aa i {
    color: #FFFFFF;
    transition: all 0.3s ease;
}

.footer-aa i:hover {
    color: #FFD700;
    transform: translateY(-3px);
}

.footerr-end p {
    margin-top: 40px;
    font-size: 14px;
    text-align: center;
}

.footerr-end p span {
    color: #cc0000;
}

.footerr-end p span:hover {
    color: #dbd5d5;
}
  </style>
</head>
<body>
    <div class="footer-img footer-one">
    <div class="footer-a">
        <h3>Company</h3>
        <a href="#">About Us</a>
        <a href="#">Careers</a>
        <a href="#">Press & Blog</a>
        <a href="#">Privacy Policy</a>
    </div>
    <div class="footer-a">
        <h3>Customer Service</h3>
        <a href="#">Help & Support</a>
        <a href="#">Returns & Exchanges</a>
        <a href="#">Shipping Info</a>
        <a href="#">Contact Us</a>
    </div>
    <div class="footer-a">
        <h3>SHOP</h3>
        <a href="#">New Arrivals</a>
        <a href="#">Best Sellers</a>
        <a href="#">Sale Items</a>
        <a href="#">Gift Cards</a>
        <a href="#">Accessories</a>
    </div>
    <div class="footer-a footer-end">
        <img src="img/NEXTAGt.png" alt="NEXTAG Logo">
        <p>Your premier destination for premium bags and accessories.<br>Discover the latest trends in fashion with our<br>curated collection of stylish products.</p>
         <div class="footer-aa d-flex">
         <i class="fa-brands fa-facebook-f"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-solid fa-globe"></i>
        <i class="fa-brands fa-github"></i>
         </div>
    </div>
    <div style="width: 100%;height: 1px; color: yellow; background-color: rgb(141, 141, 122); margin-top: 70px;">
    </div>
    <div class="footerr-end">
        <p>Copyright ©2025 All rights reserved | This template is made with ❤️ by <span>NEXTAG</span></p>
    </div>
</div>
</body>
</html>