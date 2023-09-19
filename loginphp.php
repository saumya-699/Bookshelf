







<?php

require 'config1.php';



if(isset($_POST["BtnSubmit"]))
	{
		
        $firstName =$_POST["firstName"];
       

       $password=$_POST["password"];


      $sql= "select* from register where firstName='$firstName'and password='$password'";

        $result= $conn->query($sql);

       if($result->num_rows>0)

       {
          
		   
		  
		  
         echo '<script type="text/javascript">';
		 echo 'alert("login successfull");';
         
		 echo 'window.location.href="Userfolder/FAQ.html";';
		 echo '</script>';

		  
	    }


        else

        {

         echo '<script type="text/javascript">';
		 echo 'alert("Invalid login");';
         
		 echo 'window.location.href="userlogin.html";';
		 echo '</script>';

        }
		
	}	

  $conn->close();

   
 ?>   
