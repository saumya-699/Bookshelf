<!DOCTYPE html>
<?php
    include 'php/config.php'
?>
<html>
    <head>
        <?php
            echo "<title>".$_GET["title"]." - THE BOOKSHELF</title>"
        ?>
        
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
        <link rel="stylesheet" type="text/css" href="styles/book.css">
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

        <!--Page Content-->

        
        <?php
            $book_id = $_GET['book_id'];
            
            $book = "SELECT * FROM books WHERE id=$book_id";
            $result = $con->query($book);
            $row = $result->fetch_assoc();
        
            $offer = "SELECT * FROM offers WHERE id='".$row["id"]."'";
            $offer_result = $con->query($offer);
            $tupple = $offer_result->fetch_assoc();

            echo "<div class='box'>
                <h2 style='text-decoration:underline; padding: 10px 30px;font-weight: bold; font-family: monospace; font-size: 35px;'>".$row["title"]."</h2>
                <div class='image_box'>
                    <img class='book_image' src='".$row["image_src"]."'>
                </div>
                <div class='right_box'>
                    <p class='details'>".$row["description"]."</p>
                    <p class='details'>Author    : ".$row["author"]." </p>
                    <p class='details'>Year      : ".$row["year"]." </p>
                    <div class='buying_element'>
                    <form method='POST' action='php/addCart.php'>
                        <label style='font-weight: bold; font-size: 25px; font-family: Segoe UI;'>Qty : </label>
                            <input type='text' name='qty' value='1' required>
                            <span style='font-weight: bold; font-family: Segoe UI; font-size: 25px; float: right; margin-right: 20px; font-weight: bold;'>";
                            if($tupple["offer_price"] != $row["price"] and $tupple["id"] != 0) {
                                echo "Price : <del style='font-size: 20px'>Rs.".$row["price"]."</del>  Rs.".$tupple["offer_price"]."</span>";
                            }
                            else {
                                echo "Price : Rs.".$row["price"]."</span>";
                            }
                            
                            echo "<hr>
                            <center>
                                    <input style='display: none;' type='text' value='".$_GET["book_id"]."' name='book_id'>
                                    <button type='submit' class='cart_btn'> Add to cart</button>
                                    <button type='submit' class='buy_btn'> Buy now</button>
                                </form>
                            </center>
                        </div>
                    </div>
                </div>";
        ?>
        

        <div class="comment_box">
            <h2 style="padding: 10px 30px;font-weight: bold; font-family: monospace; font-size: 35px;">Comments</h2>
           <div class="comment">
                <?php
                    $id = $_GET["book_id"];
                    $comment = "SELECT * FROM comments WHERE book_id='$id'";
                    $result = $con->query($comment);

                    $i = 0;
                    while($row = $result->fetch_assoc()) {
                        $i++;
                        
                        

                        echo "<h3 style='font-size: 20px; text-decoration: underline;'>".$row["name"]."</h3>";
                        echo "<p id='comment$i' style='display: block;'>".$row["comment"]."</p>";
                        echo "<form id='edit_comment$i' style='display: none;' method='GET' action='php/editComment.php'>
                                <textarea type='text' style='width: 100%;' name='edited_comment'>".$row["comment"]."</textarea>
                                <input style='display: none;' type='text' value='".$row["name"]."' name='name'>
                                <input style='display: none;' type='text' value='".$_GET["book_id"]."' name='book_id'>
                                <input style='display: none;' type='text' value='".$_GET["title"]."' name='title'>
                                <input style='display: none;' type='text' value='".$row["c_id"]."' name='c_id'>
                                <input type='submit' name='submit' value='Edit'>
                                </form><br>";
                        echo "<div><button onclick='edit_comment$i()' class='comment_btn'><img src='images/icons/edit.png' style='width: 13px;'>Edit</button>";
                        echo "<button onclick='delete_comment$i()' class='comment_btn'><img src='images/icons/delete.png' style='width: 13px;'>Delete</button></div>";
                        echo "<form id='delete_comment$i' style='display: none; metho='GET' action='php/deleteComment.php'>
                                <label style='font-weight: bold; font-size:15px;'>Are you sure you want to delete this comment?</label><br>
                                <input style='display: none;' type='text' value='".$_GET["book_id"]."' name='book_id'>
                                <input style='display: none;' type='text' value='".$_GET["title"]."' name='title'>
                                <input style='display: none;' type='text' value='".$row["c_id"]."' name='c_id'>
                                <input type='submit' name='submit' value='OK'>
                            </form>
                            <button id='cancel_com_btn$i' style='display: none' onclick='cancel_delete$i()'>Cancel</button>";
                        
                        echo "<script>
                            function edit_comment$i() {
                                document.getElementById('comment$i').style.display = 'none';
                                document.getElementById('edit_comment$i').style.display = 'block';
                            }

                            function delete_comment$i() {
                                document.getElementById('delete_comment$i').style.display = 'block';
                                document.getElementById('cancel_com_btn$i').style.display = 'block';
                            }

                            function cancel_delete$i() {
                                document.getElementById('delete_comment$i').style.display = 'none';
                                document.getElementById('cancel_com_btn$i').style.display = 'none';
                            }
                        </script>";
                    }                    
                ?>

                
           </div>
            <form method='GET' action='php/addComment.php' style='padding: 0px 30px; font-size: 20px;'>
                <h2>Leave a comment</h2>
                <input style="display: none;" type="text" value="<?php echo $_GET["title"] ?>" name="title">
                <input style="display: none;" type="text" value="<?php echo $_GET["book_id"] ?>" name="id">
                <label>Name</label><br>
                <input type="text" style=" height: 20px; width: 100%" name="name">
                <label>Comment</label><br>
                <textarea type="textarea" style=" height: 100px; width: 100%" name="comment"></textarea>
                <hr>
                <input type="submit" name="submit" style="background-color: #407eda; width: 100%; border-radius: 5px; color: white; padding: 5px; font-weight: bold; font-size: 20px;">
                <p></p>
            </form>
        </div>
        

        <!--Page Content-->
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