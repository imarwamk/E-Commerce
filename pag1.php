<?php
include('db.php');

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGALIA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
     
    
    
      <link rel="stylesheet" href="pag1.css">
      <link rel="icon"  type="jpg" href="imag/icon.jpg">
   

</head>
<body>
     <section id="header">
        
        <a href="#"><img src="imag/K.png" width="130px" class="logo"></a>
       
        <div >
            <ul id="navbar">
            <li><a class="active" href="pag1.php">Home</a></li>
                <li><a  href="#">Women</a></li>
                <li><a href="#">Men</a></li>
                <li>
            <div class="search-container">
  <input type="text" class="search-input" placeholder="Search for items and brands">
  <button class="search-button">
    <i class="fa fa-search" style="color: #535455;"></i>
  </button>
</div></li>
               <li> <a href="view_cart.php" ><i class="fa-regular fa-heart cart" style="color: #535455;"></i></a></li>
                <li><a href="view_cart.php"><i class="fa-solid fa-bag-shopping" style="color: #535455;"></i>
                <span id="cart-count">
                        <?php
                        session_start();
                        echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                        ?>
                    </span>
            </a></li>
                <li><a href="#"><i class="fa-solid fa-user" style="color: #535455;"></i></a></li>
            </ul>
        </div>
     </section>

     <section id="hero">
     <!-- <marquee direction="up" behavior="alternate" scrollamount="15">     -->
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all SUITS</h1> </marquee>
        <p>Save more with coupons & up to 70% off!</p>
        <button>Shop Now</button>
     </section>
     

     <section id="feature" class="section-p1">
        <di class="fe-box">
            <img src="imag/x3.jpg"  alt="">
            <h6>Free Shipping</h6>
        </di>
        <di class="fe-box">
            <img src="imag/x.jpg"  alt="">
            <h6>Online Order</h6>
        </di>
        <di class="fe-box">
            <img src="imag/x2.jpg"  alt="">
            <h6>Save Money</h6>
        </di>
        <di class="fe-box">
            <img src="imag/x5.jpg"  alt="">
            <h6>Promotions</h6>
        </di>
        <di class="fe-box">
            <img src="imag/x4.jpg"  alt="">
            <h6>Happy Sell</h6>
        </di>
        <di class="fe-box">
            <img src="imag/x6.jpg"  alt="">
            <h6>F24/7 Suppor </h6>
        </di>
     </section>

     <section id="product1" class="section-p1">
        <h2>WOMEN SUITS/BLAZER</h2>
        <p> Summer Collection New Morden Design</p>
        <div class="pro-container"> 
    
        <?php

     function displayProducts($categoryId,$conn){

    $sql = "SELECT * FROM products where category_id =".$categoryId;
    $result = $conn->query($sql);
    

        if (mysqli_num_rows($result) > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                <div class='pro'>
                <td ><img src='uploads/".$row['image']."' width='50';></td>
                <div class='des'>
                        <td>"."<span>".$row['name']."</span></td>
                        
                        <div class='star'>
                        <i class='fas fa-star '></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                    </div>
                    <td>"."<h4>SAR ".$row['price']."</h4></td>
                    </div>
                        <td><a href='cart.php?id=".$row['id']."'><i class='fa-solid fa-cart-shopping bag'></i></a></td>
                        <td><a href='#".$row['id']."'><i class='fa-regular fa-heart cart'></i></a></td>
                    </tr>
                     </div>";  
            }
        } else {
            echo "<tr><td colspan='5'>No products found</td></tr>";
        }
    }

        ?>


<?php      displayProducts(1,$conn); ?>
  
        </div>
     </section>

     <section id="banner" class="section-m1">
        <h2>UP TO <span>30% OFF </span> STYLES WE LOVE</h2>
        <p style="font-size: smaller; color:black; ">Limited time only. While stocks last. Selected styles marked down on site.</p>
        <button class="normal"> Explore More</button>
     </section>

     <section id="product1" class="section-p1">
        <h2>MEN'S SUITS</h2>
        <p> Summer Collection New Morden Design</p>
        <div class="pro-container"> 


            <?php      displayProducts(2,$conn); ?>
              
        </div>
     </section>
    
    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best classic suits is on sale at Regalia</span>
            <button class="white">Learn More </button>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>upcomming season</h2>
            <span>The best classic suits is on sale at Regalia</span>
            <button class="white">Collection </button>
        </div>
        <div class="banner-box banner-box3">
            <h4>New Arrivals Await!</h4>
            <h2>classic suits now at Regalia</h2>
            <span></span>
            <button class="white">Shop Now</button>
        </div>
    </section>
    <section id="banner3">
       <div class="banner-box1 ">
            <h2>... New Arrived ...</h2>
            
        </div>
       <div class="banner-box banner-box2">
            <h2> ...  LEATHER SUITS  ...  </h2>
          
        </div>
       <div class="banner-box banner-box3">
            <h2>  Winter <br> Collection </h2>
           
        </div>
       <div class="banner-box banner-box4">
            <h2>  Elegance <br> on Sale! </h2>
           
        </div>
    </section>
    
    <section id="newsletter" class="section-p1  section-m1" >
        <div class="newstext">
            <h4>Sign Up For Newsletters </h4>
            <p>Get E-mail updates about our lastest shop and <span> special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>


    <footer class="section-p1">
        <div class="col">
           <img class="logo" src="imag/K - Copy.png" alt="">
           <h4>Contact</h4>
           <p><strong>Address:</strong> 562 Wellinton Road, Street 32 , San Francisco</p>
           <p><strong>Phone:</strong> +01 2222 365 /(+91) 01 2345 6789</p>
           <p><strong>Hours:</strong> 10:00 - 18:00,Mon - Sat</p>
           <div class="follow">
           <h4>Follow us</h4>
           <div class="icon">
           <i class="fab fa-facebook-f"></i>
           <i class="fab fa-twitter"></i>
           <i class="fab fa-instagram"></i>
           <i class="fab fa-pinterest-p"></i>
           <i class="fab fa-youtube"></i>
           </div>
         </div>
        </div>

        <div class="col">
        <h4>About</h4>
        <a href="#">About us</a>
        <a href="#">Delivery Information</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a>
        <a href="#">Contact Us</a>
        </div>
        
        <div class="col">
        <h4>My Account</h4>
        <a href="#">Sign In </a>
        <a href="#">View Cart</a>
        <a href="#">My Wishlist</a>
        <a href="#">Track My Order</a>
        <a href="#">Help</a>
      </div>

      <div class="col install">
      <h4>Install App</h4>
      <p>From App Store or Google Play</p>
      <div class="row">
        <img src="imag/app.jpg" alt="">
        <img src="imag/play.jpg" alt="">
       </div>
       <p>Secured Payment Gateways</p>
       <img src="imag/pay.png">
      </div>

      <div class="copyright">
      <p>© 2024 Regalia.com </p>
     </div>
    </footer>

    <script src="pag1.js"></script>
</body>

</html>