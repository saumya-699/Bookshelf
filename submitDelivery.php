


<?php
      require'config.php';
 
	  

if(isset($_POST["BtnSubmit"]))
{
	
	 
    
    $name=$_POST["full_name"]; 
    $parcelID=$_POST["Parcel_ID"];
    $city=$_POST["City"];
    $address=$_POST["Address"];
	$postalCode=$_POST["Postal_code"];
	$date=$_POST["date"];
	$noOfBooks=$_POST["No_of_books"];
	$email=$_POST["E-mail"];
	$card_name=$_POST["card_name"];
	$card_no=$_POST["card_number"];
	$exp_date=$_POST["exp"];
	$CVV=$_POST["cvv"];

// send data to quary
 $sql="INSERT INTO delivery(deliveryID,name,parcelID,city,address,postalCode,date,noOfBooks,email,card_name,card_no,exp_date,CVV)VALUES('','$name','$parcelID','$city','$address','$postalCode','$date','$noOfBooks','$email','$card_name','$card_no','$exp_date','$CVV')";
if($conn->query($sql)){
	 echo "Record inserted successfully..!!";
	 
 }
 else{
	 echo "Error in records";
 }
 
 
}
	$conn->close();
?>  