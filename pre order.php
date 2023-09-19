<!DOCTYPE html>
<?php
    include 'php/config.php'
?>
<html>
    <head>
        <title>Pre Order - THE BOOKSHELF</title>
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
        <link rel="stylesheet" type="text/css" href="styles/home.css">
        <link rel="stylesheet" type="text/css" href="styles/pre order.css">
        <script src="js/script.js"></script> 
    </head>
    <body onload="auto_slides()">
        <!--Header-->
        <div class="header">
            <a href="index.php"><div id="logo"></div></a>
            <input class="searchbar" type="search" placeholder=" Search Title/Author">
            <input class="searchbutton" type="submit" value=" ">
            <a href="userlogin.html"><img class="profile_ico" src="images/icons/user.svg"></a>
        </div>
        <ul class="menu">
            <li class="menu"><a href="Categories.html">Categories</a></li>
            <li class="menu"><a href="Authors.php">Authors</a></li>
            <li class="menu"><a href="pre order.php">Pre Order Books</a></li>
            <li class="menu"><a href="Contact us.html">Contact us</a></li>
            <li class="menu"><a href="FAQ.html">FAQ</a></li>

            <li class="menu" style="float: right;"><a href="cart.php"><img height="20px" src="images/cart.png"></a></li>
        </ul>
        <!--Header-->
        
        <h1 style="text-align:center;"><u> Pre Order Books</u></h1>
        <div style='display: block;'></div>
        <?php
            $book = "SELECT * FROM preorder";
            $result = $con->query($book);
            while($row = $result->fetch_assoc()) {
                echo "<div class='book'>
                <img class='book_img' src='".$row["Image_src"]."'>
                <div class='book_details'>
                  <span>Title : </span>".$row["title"]."<br>
                  <span>Author : </span>".$row["author"]."<br>
                  <span>Release Date : </span>".$row["release_date"]."<br>
                  <button class='pre_odr_btn'>Pre-Order</button><br>
                </div>
              </div>";
            }
        ?>
            
        
        <!--Footer-->
        <div class="footer">
          <img src="images/footer_img.png" style="float: right; width: 30%; padding: 0px 10px;">
          <div class="paymentMethods">
              <img src="images/icons/mastercard_logo.png">
              <img src="images/icons/visa_logo.png">
              <img src="images/icons/american_express.png">
          </div>
          <table style=" padding-left: 80px; text-align: left; float: left;">
              <tr>
                  <th class="footerDetails"><a class="footerLinks" href="index.php">thebookshelf.com</a></th>
                  <th class="footerDetails">Customer services</th>
                  <th class="footerDetails"><a class="footerLinks" href="contact us.html">Contact us</a></th>
              </tr>
              <tr>
                  <td class="footerDetails"><a class="footerLinks" href="about us.html">About us</a></td>
                  <td class="footerDetails"><a class="footerLinks" href="account.html">My Account</a></td>
                  <td class="footerDetails">E-mail  :support@thebookshelf.com</td>
              </tr>
              <tr>
                  <td class="footerDetails"><a class="footerLinks" href="privacy policy.html">Privacy policy</a></td>
                  <td class="footerDetails"><a class="footerLinks" href="cart.php">Shoping cart</td>
                  <td class="footerDetails">Mobile  :+94 774598647</td>
              </tr>
              <tr>
                  <td class="footerDetails"><a class="footerLinks" href="Contact us.html">Contact us</a></td>
                  <td class="footerDetails"><a class="footerLinks" href="payment methods.html">Payment Methods</a></td>
              </tr>
          </table>
      </div>
      <!--Footer-->
  </body>
</html>