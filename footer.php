<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NEXTAG - E-commerce Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <style>
      /* Importing Google font - Open Sans */
      @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap');

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Open Sans', sans-serif;
      }

      .footer {
        width: 100%;
        background: #10182F;
        margin-top: 50px;
      }

      .footer .footer-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 3.5rem;
        padding: 60px;
      }

      .footer-row .footer-col h4 {
        color: #fff;
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
      }

      .footer-col .links {
        margin-top: 10px;
      }

      .footer-col .links li {
        list-style: none;
        margin-bottom: 12px;
      }

      .footer-col .links li a {
        text-decoration: none;
        color: #bfbfbf;
        transition: all 0.3s ease;
        font-size: 14px;
      }

      .footer-col .links li a:hover {
        color: #fff;
        padding-left: 5px;
      }

      .footer-col p {
        margin: 20px 0;
        color: #bfbfbf;
        max-width: 300px;
        line-height: 1.6;
        font-size: 14px;
      }

      .footer-col form {
        display: flex;
        gap: 5px;
        margin-top: 20px;
      }

      .footer-col input {
        height: 45px;
        border-radius: 6px;
        background: none;
        width: 100%;
        outline: none;
        border: 1px solid #7489C6;
        caret-color: #fff;
        color: #fff;
        padding-left: 15px;
        font-size: 14px;
      }

      .footer-col input::placeholder {
        color: #ccc;
      }

      .footer-col form button {
        background: #28a745;
        color: white;
        outline: none;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        transition: 0.3s ease;
        white-space: nowrap;
      }

      .footer-col form button:hover {
        background: #218838;
        transform: translateY(-2px);
      }

      .footer-col .icons {
        display: flex;
        margin-top: 25px;
        gap: 20px;
        cursor: pointer;
      }

      .footer-col .icons i {
        color: #afb6c7;
        font-size: 18px;
        transition: all 0.3s ease;
        background: rgba(255,255,255,0.1);
        padding: 10px;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .footer-col .icons i:hover {
        color: #fff;
        background: #28a745;
        transform: translateY(-3px);
      }

      .footer-bottom {
        background: #0a1120;
        padding: 20px 60px;
        border-top: 1px solid #2a3a5a;
      }

      .footer-bottom-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #bfbfbf;
        font-size: 14px;
      }

      .footer-bottom-links {
        display: flex;
        gap: 20px;
      }

      .footer-bottom-links a {
        color: #bfbfbf;
        text-decoration: none;
        transition: color 0.3s ease;
      }

      .footer-bottom-links a:hover {
        color: #fff;
      }

      .payment-methods {
        display: flex;
        gap: 15px;
        align-items: center;
      }

      .payment-methods i {
        font-size: 24px;
        color: #bfbfbf;
        transition: color 0.3s ease;
      }

      .payment-methods i:hover {
        color: #fff;
      }

      @media (max-width: 768px) {
        .footer .footer-row {
          padding: 40px 20px;
          gap: 2rem;
        }

        .footer-col form {
          display: block;
        }

        .footer-col form :where(input, button) {
          width: 100%;
        }

        .footer-col form button {
          margin: 10px 0 0 0;
        }

        .footer-bottom {
          padding: 20px;
        }

        .footer-bottom-content {
          flex-direction: column;
          gap: 15px;
          text-align: center;
        }

        .footer-bottom-links {
          flex-wrap: wrap;
          justify-content: center;
        }

        .payment-methods {
          justify-content: center;
        }
      }

      @media (max-width: 480px) {
        .footer .footer-row {
          padding: 30px 15px;
          gap: 1.5rem;
        }

        .footer-row .footer-col {
          flex: 1 1 100%;
        }

        .footer-col .icons {
          justify-content: center;
        }
      }
    </style>
  </head>
  <body>
    <section class="footer">
      <div class="footer-row">
        <div class="footer-col">
          <h4>Shop</h4>
          <ul class="links">
            <li><a href="#">Men's Fashion</a></li>
            <li><a href="#">Women's Wear</a></li>
            <li><a href="#">Kids Collection</a></li>
            <li><a href="#">Accessories</a></li>
            <li><a href="#">New Arrivals</a></li>
            <li><a href="#">Sale & Offers</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Customer Care</h4>
          <ul class="links">
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Shipping Info</a></li>
            <li><a href="#">Returns & Exchanges</a></li>
            <li><a href="#">Size Guide</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Track Order</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Company</h4>
          <ul class="links">
            <li><a href="#">About NEXTAG</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Store Locator</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Newsletter</h4>
          <p>
            Subscribe to get special offers, free giveaways, and exclusive deals. 
            Be the first to know about new collections and sales.
          </p>
          <form action="#">
            <input type="email" placeholder="Enter your email" required>
            <button type="submit">SUBSCRIBE</button>
          </form>
          <div class="icons">
            <i class="fa-brands fa-facebook-f" title="Facebook"></i>
            <i class="fa-brands fa-twitter" title="Twitter"></i>
            <i class="fa-brands fa-instagram" title="Instagram"></i>
            <i class="fa-brands fa-youtube" title="YouTube"></i>
          </div>
        </div>
      </div>

      <!-- Footer Bottom -->
      <div class="footer-bottom">
        <div class="footer-bottom-content">
          <div class="copyright">
            © 2024 NEXTAG. All rights reserved.
          </div>
          <div class="footer-bottom-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Cookie Policy</a>
          </div>
          <div class="payment-methods">
            <i class="fa-brands fa-cc-visa" title="Visa"></i>
            <i class="fa-brands fa-cc-mastercard" title="Mastercard"></i>
            <i class="fa-brands fa-cc-paypal" title="PayPal"></i>
            <i class="fa-brands fa-cc-apple-pay" title="Apple Pay"></i>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>