






<?php

      require 'config1.php';
	  echo "<div style=background-image:url('https://c8.alamy.com/comp/MT4P28/flat-lay-frame-of-old-books-on-blue-background-with-copy-space-MT4P28.jpg');background-repeat:no-repeat;background-size:cover;height:700px;opacity:0.6;>";
	//code is correct
    if(isset($_POST["BtnSubmit"]))
	{ 
         $Monthly_Salary =$_POST["Monthly_Salary"];   
		$EmployeeID =$_POST["EmployeeID"];	 
      $vql= "select * from staff_details where EmployeeID='$EmployeeID'";

        $result= $conn->query($vql);
  
		
		    if($result->num_rows>0)
			
            {		

                  // sql to delete a record
                   $sql = "Update staff_details set Monthly_Salary='$Monthly_Salary' WHERE EmployeeID='$EmployeeID'";

                   if ($conn->query($sql) === TRUE) 
				   {
                         
         echo '<script type="text/javascript">';
		 echo 'alert("Salary updated successfully");';
         
		 echo 'window.location.href="updateStaff.html";';
		 echo '</script>';

                   } 
					 
					 else 
			               {
							                     
                       echo '<script type="text/javascript">';
		             echo 'alert("Error updating salary");';
         
		          echo 'window.location.href="updateStaff.html";';
		             echo '</script>';

                               
                            }

			}
	
	


            else
            {
	 
	           
         echo '<script type="text/javascript">';
		 echo 'alert("Entered employee ID is not fount");';
          echo 'window.location.href="updateStaff.html";';
		 
		 echo '</script>';

	 
	 
           }	 
	 
	}	
  $conn->close();
?>
