<!DOCTYPE html>
<?php
  include 'php/config.php'
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/cart.css">
	  <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Shopping cart</title>
  </head>
  <body>
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
        <h1> Shoping Cart </h1>
        <?php
        $quantity = 0;
        $total = 0;
        $discount = 0;
        
            $cart = "SELECT * FROM cart";
            $cart_item = $con->query($cart);
                    
                    while($row = $cart_item->fetch_assoc()) {
                      $book = "SELECT * FROM books WHERE id='".$row["book_id"]."'";
                      $result = $con->query($book);
                      $tupple = $result->fetch_assoc();
                      $offer = "SELECT * FROM offers WHERE id='".$row["book_id"]."'";
                      $offer_result = $con->query($offer);
                      $off = $offer_result->fetch_assoc();
                    echo "<div class='book'>
                      <img class='book_img' src='".$tupple["image_src"]."'>
                      <div class='book_details'>
                        <span>Title : </span>".$tupple["title"]."<br>
                        <span>Price : </span>";
                        if($off["offer_price"] != $tupple["price"] and $off["id"] != 0) {
                          echo "Rs.".$off["offer_price"];
                          $total += $off["offer_price"];
                          $discount += ($tupple["price"]-$off["offer_price"]);
                        }
                        else {
                          echo "Rs.".$tupple["price"];
                          $total += $tupple["price"];
                        }
                        echo "<br>
                        <span>Quantity : </span><select name='qty' id='qty'>
                                                  <option value='1'>1</option>
                                                  <option value='2'>2</option>
                                                  <option value='3'>3</option>
                                                  <option value='4'>4</option>
                                                  <option value='5'>5</option>
                                                </select><br>
                        <span>Shipping : </span><select name='qty' id='qty'>
                                                <option value='International'>Free International Shipping</option>
                                                <option value='payShip'>Payment Shipping</option>  
                                                </select><br>
                        <a href='book.php?book_id=".$tupple["id"]."&title=".$tupple["title"]."'><button class='btn'>View</button></a>
                        <a href='php/removeCart.php?id=".$tupple["id"]."'><button class='btn'>Remove</button></a>
                      </div>
                    </div>";
                    $quantity++;
                    }
                    echo "<div class='checkout'>
                <div class='book_details'>
                  <span>Quantity : </span>$quantity<br>
                  <span>Shipping : </span>Rs.<br>
                  <span>Discount : </span>Rs.$discount<br>
                  <hr>
                  <span>Total : </span>$total.00<br>
                  <button class='btn'>Checkout</button>
                </div>
              </div>";
                    
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
