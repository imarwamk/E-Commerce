
<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>BAG</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="pag1.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon"  type="jpg" href="imag/icon.jpg">

</head>
<body>
<section id="header">
        
        <a href="#"><img src="imag/K.png" width="130px" class="logo"></a>
       
        <div >
            <ul id="navbar">
            <li><a href="pag1.php">Home</a></li>
                <li><a  href="#">Women</a></li>
                <li><a href="#">Men</a></li>
                <!-- <li>
            <div class="search-container">
  <input type="text" class="search-input" placeholder="Search for items and brands">
  <button class="search-button">
    <i class="fa fa-search" style="color: #535455;"></i>
  </button>
</div></li> -->
               <li> <a href="view_cart.php"><i class="fa-regular fa-heart cart" style="color: #535455;"></i></a></li>
                <li><a href="view_cart.php"  class="active" ><i class="fa-solid fa-bag-shopping" style="color: #535455;"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-user" style="color: #535455;"></i></a></li>
            </ul>
        </div>
     </section>
    <h1>BAG</h1>
    <table>
        <!-- <tr>

            
            
            <th></th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th></th>
        </tr> -->
        <?php
        
        $total = 0;
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $key => $item) {
                $total += $item['price'] * $item['quantity'];
                echo "<tr>
                        <form class='im2' action='update_cart.php' method='post'> 
                        <td class='im'><img src='uploads/".$item['image']."' width='150';></td> 
                            <td>".$item['name']."</td>
                            <td>".$item['price']."</td>
                            <td>
                                <input type='number' name='quantity' value='".$item['quantity']."' min='1'>
                                <input type='hidden' name='key' value='".$key."'>
                            </td>
                            <td>".$item['price'] * $item['quantity']."</td>
                            <td>
                                <input type='submit' value='Update'>
                                <a href='remove.php?key=".$key."'>Remove <i class='fa-solid fa-trash-can'></i></a>
                            </td>
                             
                        </form>

                    </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>............................................ Your cart is empty ..............................................</td></tr>";
        }

        ?>
    
        <tr>
      
            
            <td colspan="2" > <a href="pag1.php"> <button class="bt"> <i class="fa-solid fa-chevron-left"></i>  Continue Shopping</button></a></td>
            <td colspan="1"><?php echo $total; ?></td>
            <td colspan="1">Total</td>
            <td colspan="3" ><button class="but">CHECKOUT</button></td>
        </tr>
    </table>
    <section>
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
    </footer></section>
</body>
</html>
