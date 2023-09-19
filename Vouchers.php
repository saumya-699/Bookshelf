<!DOCTYPE html>
<?php
    include 'php/config.php'
?>
<html>
    <head>
    <title>vouchers</title>
    <link rel ="stylesheet" href="css.css">
    </head>
    <body>
    
        <html>
            <head>
                <title>Voucher - Online Bookstore</title>
                <link rel="stylesheet" type="text/css" href="styles/styles.css">
                <link rel="stylesheet" type="text/css" href="styles/home.css">
                <script src="js/script.js"></script> 
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
                <br>
        
                
                <!--Page Content-->
                <h1>Vouchers</h1>
                        <?php
                            
                            $voucher = "SELECT * FROM vouchers";
                            $result = $con->query($voucher);
        
                            while($row = $result->fetch_assoc()) {
                                echo "<div style='width:50%; display: inline-block;'>
                                <a href='voucher.php?id=".$row["Id"]."'>
                                <center> <img src='images/download (9).png' alt='books' width='300px' height='200px'> <br> Voucher<br>Rs.".$row["Price"].".00
                                </center><br/><br>
                                </a>
                            </div><tr>";
                            
                            }
                        ?>

            <table style="width:80%">
                <tr>
               <td style="width:30%"><center> what is the issue </center></td>
               <td style="width:70%"><textarea rows="6" cols="80" name="comment" form="usrform">
                Enter text here...</textarea>
                </td>   </tr>
        
            </table>
    
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
                            <th class="footerDetails"><a class="footerLinks" href="index.html">thebookshelf.com</a></th>
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
                            <td class="footerDetails"><a class="footerLinks" href="cart.html">Shoping cart</td>
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