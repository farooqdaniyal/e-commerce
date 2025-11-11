  <?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Search CSS -->
    <style>
        /* Search Overlay Styles */
        .search-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.98);
            z-index: 1000;
            display: none;
            flex-direction: column;
            padding: 20px;
        }

        .search-overlay.active {
            display: flex;
        }

        .search-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .search-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }

        .search-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #333;
            padding: 5px;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            position: relative;
        }

        .search-input-container {
            position: relative;
            flex: 1;
        }

        .search-input {
            width: 100%;
            padding: 15px 50px 15px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .search-input:focus {
            border-color: #007bff;
        }

        .clear-search {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            padding: 5px;
            display: none;
            transition: color 0.3s ease;
        }

        .clear-search:hover {
            color: #333;
        }

        .clear-search.visible {
            display: block;
        }

        .search-btn {
            padding: 15px 25px;
            background: #333;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s ease;
            white-space: nowrap;
        }

        .search-btn:hover {
            background: #555;
        }

        .search-results-container {
            flex: 1;
            overflow-y: auto;
            padding: 10px 0;
        }

        .search-results {
            display: grid;
            gap: 15px;
        }

        .search-result-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 10px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
        }

        .search-result-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .search-result-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .search-result-info {
            flex: 1;
        }

        .search-result-name {
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        .search-result-price {
            color: #e74c3c;
            font-weight: 600;
        }

        .search-result-category {
            color: #666;
            font-size: 14px;
        }

        .no-results {
            text-align: center;
            padding: 40px 20px;
            color: #666;
        }

        .no-results i {
            font-size: 48px;
            margin-bottom: 15px;
            color: #ddd;
        }

        .recent-searches {
            margin-bottom: 20px;
        }

        .recent-searches h4 {
            margin-bottom: 10px;
            color: #333;
        }

        .recent-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .recent-tag {
            padding: 8px 15px;
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 20px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .recent-tag:hover {
            background: #007bff;
            color: white;
            border-color: #007bff;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .search-overlay {
                padding: 15px;
            }

            .search-title {
                font-size: 20px;
            }

            .search-form {
                flex-direction: column;
            }

            .search-input {
                padding: 12px 45px 12px 15px;
            }

            .clear-search {
                right: 12px;
            }

            .search-btn {
                padding: 12px 20px;
            }

            .search-result-item {
                flex-direction: column;
                text-align: center;
            }

            .search-result-image {
                width: 100%;
                height: 150px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar (Same on All Devices) -->
    <nav class="navbar">
        <!-- Icons (Left Side) -->
        <div class="nav-auth">
            <?php if (isset($_SESSION['id'])): ?>
                <!-- agar user login hai to logout icon dikhao -->
                <a href="php/logout.php" style="color: black;" title="Logout"
                   onclick="return confirm('Are you sure you want to logout??');">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            <?php else: ?>
                <!-- agar user login nahi hai to login/signup icon dikhao -->
                <a href="php/login.php" style="color: black;" title="Login / Signup">
                    <i class="fa-regular fa-user"></i>
                </a>
            <?php endif; ?>

            <i class="fa-solid fa-cart-shopping" title="Cart"></i>
            <i class="fa-solid fa-magnifying-glass" title="Search" onclick="openSearch()"></i>
        </div>

        <!-- Logo (Center) -->
        <div class="nav-brand">
            <img src="img/NEXTAGt.png" alt="NEXTAG Logo">
        </div>
        
        <!-- Hamburger Menu (Right Side) -->
        <div class="hamburger" id="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <!-- Search Overlay -->
    <div class="search-overlay" id="searchOverlay">
        <div class="search-header">
            <h2 class="search-title">Search Products</h2>
            <button class="search-close" onclick="closeSearch()">
                <i class="fa-solid fa-times"></i>
            </button>
        </div>

        <form class="search-form" onsubmit="performSearch(event)">
            <div class="search-input-container">
                <input type="text" class="search-input" id="searchInput" 
                       placeholder="Search for products, categories, brands..." 
                       autocomplete="off">
                <button type="button" class="clear-search" id="clearSearch" onclick="clearSearchInput()">
                    <i class="fa-solid fa-times"></i>
                </button>
            </div>
            <button type="submit" class="search-btn">Search</button>
        </form>

        <!-- Recent Searches -->
        <div class="recent-searches" id="recentSearches" style="display: none;">
            <h4>Recent Searches</h4>
            <div class="recent-tags" id="recentTags"></div>
        </div>

        <!-- Search Results -->
        <div class="search-results-container">
            <div class="search-results" id="searchResults"></div>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu" id="mobileMenu" onclick="closeMenu()"></div>

    <!-- Mobile Sidebar -->
    <div class="mobile-sidebar" id="mobileSidebar">
        <!-- Close Button -->
        <div class="mobile-close">
            <i class="fa-solid fa-times" onclick="closeMenu()"></i>
        </div>

        <!-- Navigation Links -->
        <div class="mobile-nav-links">
            <a href="index-2.php">Home</a>
            <a href="/new-arrivals">New Arrivals</a>
            
            <!-- Women Dropdown -->
            <div class="mobile-dropdown">
                <a href="#" onclick="toggleMobileDropdown(event, 'women')">
                    Women 
                    <i class="fas fa-chevron-down"></i>
                </a>
                <div class="mobile-dropdown-content" id="women">
                    <a href="/women/dresses">Dresses</a>
                    <a href="/women/kurtis">Kurtis</a>
                    <a href="/women/tops">Tops</a>
                    <a href="/women/ethnic">Ethnic Wear</a>
                </div>
            </div>
            
            <!-- Men Dropdown -->
            <div class="mobile-dropdown">
                <a href="#" onclick="toggleMobileDropdown(event, 'men')">
                    Men 
                    <i class="fas fa-chevron-down"></i>
                </a>
                <div class="mobile-dropdown-content" id="men">
                    <a href="/men/tshirts">T-Shirts</a>
                    <a href="/men/shirts">Shirts</a>
                    <a href="/men/jeans">Jeans</a>
                    <a href="/men/traditional">Traditional</a>
                </div>
            </div>
            
            <a href="/services">Services</a>
            <a href="products.php">Products</a>
            <a href="about.php">About Us</a>
            <a href="/blog">Blog</a>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Sample products data (آپ کے products سے replace کریں)
        const products = [
            { 
                id: 1, 
                name: 'Designer Party Wear Gown', 
                price: 8999, 
                image: 'img/g-dress-13.jpg', 
                category: 'women',
                description: 'Silk Fabric Designer Gown'
            },
            { 
                id: 2, 
                name: 'Casual Office Wear Suit', 
                price: 3799, 
                image: 'img/g-dress-14.jpg', 
                category: 'women',
                description: 'Linen Material Office Suit'
            },
            { 
                id: 3, 
                name: 'Evening Cocktail Dress', 
                price: 6499, 
                image: 'img/g-dress-15.jpg', 
                category: 'women',
                description: 'Satin Finish Cocktail Dress'
            },
            { 
                id: 4, 
                name: 'Travel Hobo Bag', 
                price: 2500, 
                image: 'img/travel hobo.jpeg', 
                category: 'bags',
                description: 'Premium Travel Hobo Bag'
            },
            { 
                id: 5, 
                name: 'Minimalist Backpack', 
                price: 3500, 
                image: 'img/Minimalist Large Capacity Backpack.jpeg', 
                category: 'bags',
                description: 'Large Capacity Minimalist Backpack'
            },
            { 
                id: 6, 
                name: 'Kids Cotton T-Shirt', 
                price: 899, 
                image: 'img/baby.jpg', 
                category: 'kids',
                description: 'Combo Pack of 3 Cotton T-Shirts'
            }
        ];

        // Search functionality
        let recentSearches = JSON.parse(localStorage.getItem('recentSearches')) || [];

        function openSearch() {
            const overlay = document.getElementById('searchOverlay');
            const input = document.getElementById('searchInput');
            
            overlay.classList.add('active');
            input.focus();
            
            // Show recent searches if available
            showRecentSearches();
        }

        function closeSearch() {
            const overlay = document.getElementById('searchOverlay');
            overlay.classList.remove('active');
            
            // Clear search results
            document.getElementById('searchResults').innerHTML = '';
            document.getElementById('searchInput').value = '';
            updateClearButton();
        }

        function clearSearchInput() {
            const input = document.getElementById('searchInput');
            input.value = '';
            input.focus();
            
            // Clear search results
            document.getElementById('searchResults').innerHTML = '';
            
            // Show recent searches
            showRecentSearches();
            
            // Hide clear button
            updateClearButton();
        }

        function updateClearButton() {
            const clearBtn = document.getElementById('clearSearch');
            const input = document.getElementById('searchInput');
            
            if (input.value.length > 0) {
                clearBtn.classList.add('visible');
            } else {
                clearBtn.classList.remove('visible');
            }
        }

        function performSearch(event) {
            event.preventDefault();
            const searchTerm = document.getElementById('searchInput').value.trim();
            
            if (searchTerm) {
                // Add to recent searches
                addToRecentSearches(searchTerm);
                
                // Filter products
                const filteredProducts = products.filter(product => 
                    product.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
                    product.category.toLowerCase().includes(searchTerm.toLowerCase()) ||
                    product.description.toLowerCase().includes(searchTerm.toLowerCase())
                );
                
                displaySearchResults(filteredProducts, searchTerm);
            }
        }

        function displaySearchResults(results, searchTerm) {
            const resultsContainer = document.getElementById('searchResults');
            
            if (results.length > 0) {
                let html = '';
                
                results.forEach(product => {
                    html += `
                        <div class="search-result-item" onclick="viewProduct(${product.id})">
                            <img src="${product.image}" alt="${product.name}" class="search-result-image">
                            <div class="search-result-info">
                                <div class="search-result-name">${product.name}</div>
                                <div class="search-result-price">Rs. ${product.price.toLocaleString()}</div>
                                <div class="search-result-category">${product.category} • ${product.description}</div>
                            </div>
                        </div>
                    `;
                });
                
                resultsContainer.innerHTML = html;
            } else {
                resultsContainer.innerHTML = `
                    <div class="no-results">
                        <i class="fa-solid fa-search"></i>
                        <h3>No products found</h3>
                        <p>No results found for "${searchTerm}". Try different keywords.</p>
                    </div>
                `;
            }
            
            // Hide recent searches when showing results
            document.getElementById('recentSearches').style.display = 'none';
        }

        function addToRecentSearches(searchTerm) {
            // Remove if already exists
            recentSearches = recentSearches.filter(term => term !== searchTerm);
            
            // Add to beginning
            recentSearches.unshift(searchTerm);
            
            // Keep only last 5 searches
            recentSearches = recentSearches.slice(0, 5);
            
            // Save to localStorage
            localStorage.setItem('recentSearches', JSON.stringify(recentSearches));
        }

        function showRecentSearches() {
            const recentTags = document.getElementById('recentTags');
            const recentContainer = document.getElementById('recentSearches');
            
            if (recentSearches.length > 0) {
                recentTags.innerHTML = '';
                
                recentSearches.forEach(term => {
                    recentTags.innerHTML += `<div class="recent-tag" onclick="searchRecent('${term}')">${term}</div>`;
                });
                
                recentContainer.style.display = 'block';
            } else {
                recentContainer.style.display = 'none';
            }
        }

        function searchRecent(term) {
            document.getElementById('searchInput').value = term;
            const filteredProducts = products.filter(product => 
                product.name.toLowerCase().includes(term.toLowerCase()) ||
                product.category.toLowerCase().includes(term.toLowerCase()) ||
                product.description.toLowerCase().includes(term.toLowerCase())
            );
            
            displaySearchResults(filteredProducts, term);
            updateClearButton();
        }

        function viewProduct(productId) {
            // Redirect to product page or show product details
            alert(`Viewing product ID: ${productId}`);
            // window.location.href = `product-details.php?id=${productId}`;
        }

        // Real-time search
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.trim();
            
            // Update clear button visibility
            updateClearButton();
            
            if (searchTerm.length >= 2) {
                const filteredProducts = products.filter(product => 
                    product.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
                    product.category.toLowerCase().includes(searchTerm.toLowerCase()) ||
                    product.description.toLowerCase().includes(searchTerm.toLowerCase())
                );
                
                displaySearchResults(filteredProducts, searchTerm);
            } else if (searchTerm.length === 0) {
                document.getElementById('searchResults').innerHTML = '';
                showRecentSearches();
            }
        });

        // Close search on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeSearch();
            }
        });

        // Existing menu functions
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            const sidebar = document.getElementById('mobileSidebar');
            const hamburger = document.getElementById('hamburger');
            
            menu.classList.toggle('active');
            sidebar.classList.toggle('active');
            hamburger.classList.toggle('active');
        }

        function closeMenu() {
            const menu = document.getElementById('mobileMenu');
            const sidebar = document.getElementById('mobileSidebar');
            const hamburger = document.getElementById('hamburger');
            
            menu.classList.remove('active');
            sidebar.classList.remove('active');
            hamburger.classList.remove('active');
        }

        function toggleMobileDropdown(event, id) {
            event.preventDefault();
            const dropdown = document.getElementById(id);
            const clickedLink = event.currentTarget;
            
            dropdown.classList.toggle('active');
            clickedLink.classList.toggle('active');
        }

        // Close menu when clicking on a link
        document.querySelectorAll('.mobile-nav-links > a').forEach(link => {
            link.addEventListener('click', function() {
                closeMenu();
            });
        });

        document.querySelectorAll('.mobile-dropdown-content a').forEach(link => {
            link.addEventListener('click', function() {
                closeMenu();
            });
        });

        // Initialize clear button state
        document.addEventListener('DOMContentLoaded', function() {
            updateClearButton();
        });
    </script>
</body>
</html>