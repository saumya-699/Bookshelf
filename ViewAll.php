<!DOCTYPE html>
<html>
    <head>
        <title>THE BOOKSHELF - Online Bookstore</title>
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
            <li class="menu"><a href="../Categories.html">Categories</a></li>
            <li class="menu"><a href="../Authors.php">Authors</a></li>
            <li class="menu"><a href="../pre order.php">Pre Order Books</a></li>
            <li class="menu"><a href="../Contact us.html">Contact us</a></li>
            <li class="menu"><a href="../FAQ.html">FAQ</a></li>

            <li class="menu" style="float: right;"><a href="../cart.php"><img height="20px" src="images/cart.png"></a></li>
        </ul>
</html>



<?php

require 'config1.php';

     echo "<div style=background-image:url('https://blog.prezi.com/wp-content/uploads/2019/04/03-deep-blue-1024x576.jpg');background-repeat:no-repeat;background-size:cover;height:700px;>";  
		
$sql= "select * from staff_details" ;
$result = $conn->query($sql);

if($result->num_rows>0)

{     
   

          echo "<font color=red>";
	    echo "<font size=6>";
	   
	    
	   echo  "<table border=4 width=100% height=60%>"."<tr>"."<th>"."Employee ID"."</th>"."<th>"."First Name"."</th>"."<th>"."Last Name"."</th>"."<th>"."Employee Category"."</th>"."<th>"."Monthly_Salary"."</th>"."</tr>";

   while($row = $result->fetch_assoc())
   
   {     
     
	  echo  "<tr>"."<td>".$row["EmployeeID"]."</td>"."<td>".$row["FirstName"]."</td>"."<td>".$row["lastName"]."</td>"."<td>".$row["Employee_Category"]."</td>"."<td>".$row["Monthly_Salary"]."</td>"."</tr>";
	  
	  
	  
	}
	
	 echo "</font>";
	 echo  "</font>";
	  
	   
	
	echo "</table>";
	
	
}	

else

{

 echo "no results";

}

echo "</div>";

$conn->close();

?> 

<!DOCTYPE html>
<body>
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
                    <td class="footerDetails"><a class="footerLinks" href="cart.html">Shoping cart</a></td>
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
       
		