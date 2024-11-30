<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>FoodieGo</h3>
                <p>Delicious food delivered to your doorstep. Experience the best local cuisines with just a few clicks.</p>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="<?php echo $siteurl; ?>">Home</a></li>
                    <li><a href="<?php echo $siteurl; ?>menu">Menu</a></li>
                    <li><a href="<?php echo $siteurl; ?>about">About</a></li>
                    <li><a href="<?php echo $siteurl; ?>contact">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>
                    <i class="fa fa-phone"></i> +1 234 567 8900<br>
                    <i class="fa fa-envelope"></i> info@foodiego.com<br>
                    <i class="fa fa-map-marker"></i> 123 Food Street, Cuisine City
                </p>
            </div>
            
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social-link"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> FoodieGo. All rights reserved.</p>
        </div>
    </footer>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        .footer {
            background-color: #000000;
            color: #FFFFFF;
            padding: 40px 0 20px;
            margin-top: 50px;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 0 20px;
        }
        
        .footer-section {
            flex: 1;
            min-width: 250px;
            margin: 20px;
        }
        
        .footer-section h3 {
            color: #FF0000;
            margin-bottom: 20px;
            font-size: 1.2em;
        }
        
        .footer-section ul {
            list-style: none;
            padding: 0;
        }
        
        .footer-section ul li {
            margin-bottom: 10px;
        }
        
        .footer-section a {
            color: #FFFFFF;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-section a:hover {
            color: #FF0000;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
        }
        
        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: #FFFFFF;
            color: #000000 !important;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background-color: #FF0000;
            color: #FFFFFF !important;
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        @media (max-width: 768px) {
            .footer-section {
                min-width: 100%;
                margin: 20px 0;
                text-align: center;
            }
            
            .social-links {
                justify-content: center;
            }
        }
    </style>
</body>
</html>