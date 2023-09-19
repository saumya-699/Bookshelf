






<?php

require 'config1.php';


if(isset($_POST["BtnSubmit"]))
	{
		
        $adminID =$_POST["adminID"];


       $Password=$_POST["Password"];


      $sql= "select * from admin_details where AdminID=$adminID and Password='$Password'";

        $result= $conn->query($sql);

       if($result->num_rows>0)

       {
          
	    echo '<script type="text/javascript">';
		echo 'alert("login successfull");';
         
		 echo 'window.location.href="adminHomePage.html";';
		 echo '</script>';
		
		   
		 
		 
	    }


        else

        {

         echo '<script type="text/javascript">';
		 echo 'alert("invalid login");';
         
		 echo 'window.location.href="userlogin.html";';
		 echo '</script>';

        }
		
	}	

  $conn->close();

   
 ?>   
