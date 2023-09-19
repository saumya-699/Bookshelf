<?php
    include 'php/config.php'
?>
<html>
    <head>
        <title><?php echo $_GET["author"]?> - Online Bookstore</title>
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
        <link rel="stylesheet" type="text/css" href="styles/home.css">
        <link rel="stylesheet" type="text/css" href="styles/author.css">
        <script src="js/script.js"></script> 
    </head>
    
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

        <div class='authors_list'>
        <?php
            $author = $_GET["author"];
            $author_details = "SELECT * FROM authors WHERE name='$author'";
            $result = $con->query($author_details);
            $row = $result->fetch_assoc();

            echo "<div class='box'>
                <h2 style='padding: 10px 30px;font-weight: bold; font-family: monospace; font-size: 35px;'>About the author</h2>
                <div class='image_box'>
                    <img class='author_image' src='".$row["image_src"]."'>
                </div>
                <div class='right_box'>
                    <h2 style='font-weight: bold; font-family: monospace; font-size: 30px; margin: 0px 0px;'>".$row["name"]."</h2>
                    <hr>
                    <a href='".$row["facebook_link"]."'><img style='width: 40px;' src='images/icons/facebook.png'></a>
                            <a href='".$row["twitter_link"]."'><img style='width: 40px;' src='images/icons/twitter.png'></a>
                            <a href='".$row["liinkedin_link"]."'><img style='width: 40px;' src='images/icons/linkedin.png'></a>
                    <p class='details'>".$row["about_author"]."</p>
                </div>
            </div>";
            
            echo "<div class='book_list'><h1>Books written by $author</h1>";
            $book = "SELECT * FROM books where author='$author'";
            $result = $con->query($book);
            
            while($row = $result->fetch_assoc()) {
            
                $offer = "SELECT * FROM offers WHERE id='".$row["id"]."'";
                $offer_result = $con->query($offer);
                $tupple = $offer_result->fetch_assoc();
                echo "<div id='normal_product'>
                    <a href='book.php?book_id=".$row["id"]."&title=".$row["title"]."'>
                        <img id='product_img' src='".$row["image_src"]."'>
                    </a>";
                
                if($tupple["offer_price"] != $row["price"] and $tupple["id"] != 0) {
                    echo "<p style='text-align: center';>Rs.".$tupple["offer_price"]."</p>";
                }
                else {
                    echo "<p style='text-align: center';>Rs.".$row["price"]."</p>";
                }
                echo "<input class='buy_btn' type='button' value='Buy now'>
                    <input class='cart_btn' type='button' value='Add to cart'>
                    </div>";
                
            }

            echo "</div>";
            
        ?>
        </div>


        <br>
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