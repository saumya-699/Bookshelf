<?php
      require'config.php';
 
	  

if(isset($_POST["BtnSubmit"]))
{
	 //name in addbooks.html
	 
    $title=$_POST["Title"];       
    $author=$_POST["Author"]; 
    $publisher=$_POST["Publisher"];
    $year=$_POST["Year"];
    $price=$_POST["Price"];

// send data to quary
 $sql="INSERT INTO addbooks(book_ID,title,author,publisher,year,price)VALUES('','$title','$author','$publisher','$year','$price')";
if($conn->query($sql)){
	 echo "Record inserted successfully..!!";
	 
 }
}
 else{
	 echo "Error in records";
 }
 // update data


 
 if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE book_id=$book_id");
	$_SESSION['message'] = "sucessfully deleted!"; 
	
}
 
 

	$conn->close();
?>  