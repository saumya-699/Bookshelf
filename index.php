<!DOCTYPE html>
<?php
    include 'php/config.php'
?>
<html>
    <head>
        <title>THE BOOKSHELF - Online Bookstore</title>
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
        <link rel="stylesheet" type="text/css" href="styles/home.css">
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
        

        
        <!--Page Content-->
        <main>
        <div style="width: 100% ; background-color: #0065a0; margin: -8px; padding: 0px 8px;">
            <div class="slideshow">
                <img id="slides" src="images/1.jpg">
                <div id="previous" onclick="previous()"><img width="100%" src="images/icons/left.png"></div>
                <div id="next" onclick="next()" style="float: right;"><img width="100%" src="images/icons/right.png"></div>
            </div>
        </div>
        <div class="items">

        <div class='offers'>
            <div style='padding: 0px 10px;'>
                <h2 style='text-align: left; margin-left: 80px; font-size: 30px;'>Best offers</h2>
        <?php
            $book = "SELECT * FROM books";
            $result = $con->query($book);
            $i = 0;
            while($row = $result->fetch_assoc()){
                if($i >= 5) {
                break;
                }

                $offer = "SELECT * FROM offers WHERE id='".$row["id"]."'";
                $offer_result = $con->query($offer);

                while($tupple = $offer_result->fetch_assoc()) {
                    $id = $row["id"];

                    echo "<div id='offer_product'>
                        <a href='book.php?book_id=".$row["id"]."&title=".$row["title"]."'>
                            <img id='product_img' src='".$row["image_src"]."'>";

                    echo "<p class='offer_price'><del>Rs.".$row["price"]."</del>
                            <br>Rs.".$tupple["offer_price"]."
                        </p>    
                            <input class='buy_btn' type='submit' value='Buy now'>
                            <input class='cart_btn' type='submit' value='Add to cart'>
                    </div>
                    </a>";
                    $i++;
                }
            }
        ?>

            </div>
        </div>
            <div style="padding: 10px;">
                <?php
                    $book = "SELECT * FROM books";
                    $result = $con->query($book);

                    $i = 0;

                    while($row = $result->fetch_assoc()) {
                        if ($i >= 10) {
                            break;
                        }
                        $offer = "SELECT * FROM offers WHERE id='".$row["id"]."'";
                        $offer_result = $con->query($offer);
                        $tupple = $offer_result->fetch_assoc();
                        echo "<div id='normal_product'>
                            <a href='book.php?book_id=".$row["id"]."&title=".$row["title"]."'>
                                <img id='product_img' src='".$row["image_src"]."'>";
                        
                        if($tupple["offer_price"] != $row["price"] and $tupple["id"] != 0) {
                            echo "<p>Rs.".$tupple["offer_price"]."</p>";
                        }
                        else {
                            echo "<p>Rs.".$row["price"]."</p>";
                        }
                        echo "<input class='buy_btn' type='button' value='Buy now'>
                            <input class='cart_btn' type='button' value='Add to cart'>
                            </div>
                            </a>";

                        $i++;
                    }
                ?>
                
            </div>
        </div>

        <div>
            <div class="sideNav">
                <ul>
                    <div class="dropdown">
                        <span>Best Selling Books</span>
                        <ul class="dropdown-content">
                            <li><a href="book.php?book_id=104 &title=Astrophysics for People in a Hurry">Astrophysics for People in a Hurry<a></li>
                            <li><a href="book.php?book_id=101 &title=Blackout">Blackout<a></li>
                            <li><a href="book.php?book_id=114 &title=Percy Jackson and the Olympians : The Lightning Thief (Book 1)">Percy Jackson and the Olympians : The Lightning Thief (Book 1)<a></li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <span>Popular Authors</span>
                        <ul class="dropdown-content">
                            <li><a href="author.php?author=J. K. Rowling">J. K. Rowling<a></li>
                            <li><a href="author.php?author=Rick Riordan">Rick Riordan<a></li>
                        </ul>
                    </div>
                    
                </ul>
            </div>
        </div>
        
        </main>
        <!--Page Content-->
        
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