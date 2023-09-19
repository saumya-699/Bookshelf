




<?php

      require 'config1.php';
	  
	  

    if(isset($_POST["BtnSubmit"]))
	{
		 
		 

     
     $EmployeeID =$_POST["EmployeeID"];
     $FirstName =$_POST["fName"];
     $lastName=$_POST["lName"];
     $category=$_POST["category"];
	 $Monthly_Salary =$_POST["Monthly_Salary"];
   
     
    $sql ="INSERT INTO staff_details(EmployeeID,FirstName,lastName,Employee_Category,Monthly_Salary)VALUES('$EmployeeID','$FirstName','$lastName','$category','$Monthly_Salary')";
	
   
    if($conn->query($sql))
	 
	  {
		 
		 
		 echo '<script type="text/javascript">';
		 echo 'alert("Details stored successfully");';
         
		 echo 'window.location.href="Staff.html";';
		 echo '</script>';

		 
		 
	  }	 
		 
        else
  
      {
		  
		  
		 echo '<script type="text/javascript">';
		 echo 'alert("Error in entering try again!");';
         
		 echo 'window.location.href="createnew.html";';
		 echo '</script>';

	   
      }

	
  }

 $conn->close();

 
	   

    	  
  

  
  
  ?>
  
