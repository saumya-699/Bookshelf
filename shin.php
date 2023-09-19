


<?php

      require 'config1.php';
	  echo "<div style=background-image:url('https://c8.alamy.com/comp/MT4P28/flat-lay-frame-of-old-books-on-blue-background-with-copy-space-MT4P28.jpg');background-repeat:no-repeat;background-size:cover;height:700px;opacity:0.6;>";
	//code is correct
    if(isset($_POST["BtnSubmit"]))
	{ 
              
		$DeleteStaffID =$_POST["DeleteStaffID"];	 
      $vql= "select * from staff_details where EmployeeID='$DeleteStaffID'";

        $result= $conn->query($vql);
  
		
		    if($result->num_rows>0)
			
            {		

                  // sql to delete a record
                   $sql = "DELETE FROM staff_details WHERE EmployeeID='$DeleteStaffID'";

                   if ($conn->query($sql) === TRUE) 
				   {
                          
                    echo '<script type="text/javascript">';
		            echo 'alert("details deleted successfully");';
         
		           echo 'window.location.href="Staff.html";';
		            echo '</script>';

		  
                   } 
					 
					 else 
			               {
                               
							   
							     
                           echo '<script type="text/javascript">';
		                   echo 'alert("Error deleting data.Try again!");';
         
		                 echo 'window.location.href="Staff.html";';
		                  echo '</script>';

		  
							   
							   
							   
							   
							   
							   
							   
                            }

			}
	
	


            else
            {
	 
	 
	                
         echo '<script type="text/javascript">';
		 echo 'alert("Entered employee ID is not found");';
         
		 echo 'window.location.href="Staff.html";';
		 echo '</script>';

		  
	           
	 
	 
	 
           }	 
	 
	}	
  $conn->close();
?>
