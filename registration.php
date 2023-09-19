<?php

require 'config.php';            //make connection here
if(isset($_POST['submit']))
{
  //here getting result from the post array after submitting the form.
    $firstName=$_POST["firstname"];
    $lastName=$_POST["lastname"];
    $mobile=$_POST["mobile"];
	$email=$_POST["email"];
	$address=$_POST["address"];
	$DOB=$_POST["day"];
	$password=$_POST["pwd"];

  

//insert the user into the database.
    $sql="insert into register(customer_ID,firstName,lastName,mobile,email,address,DOB,password) VALUE ('',' $firstName',' $lastName',' $mobile','$email','$address','$DOB','$password')";
    if($conn->query($sql))
    {
      echo "Insert Successfully";
    }
     else
	 {
		 echo "Error in records";
	 }
	 
}
	
$conn->close();

?>