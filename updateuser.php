<?php

      require 'config1.php';
	  //echo "<div style=background-image:url('https://c8.alamy.com/comp/MT4P28/flat-lay-frame-of-old-books-on-blue-background-with-copy-space-MT4P28.jpg');background-repeat:no-repeat;background-size:cover;height:700px;opacity:0.6;>";
	//code is correct
    if(isset($_POST["BtnSubmit"]))
		
	{    
	     
	    
	    $NewPassword =$_POST["NewPassword"];
		$ReenterPassword =$_POST["ReenterPassword"];
	    
		
		$firstName=$_POST["firstName"];
		$CurrentPassword =$_POST["CurrentPassword"];
		
		if($NewPassword!=$ReenterPassword)
			
			{
				
				 echo '<script type="text/javascript">';
		        echo 'alert("Entered passwords are not matched!Reenter!");';
         
		         echo 'window.location.href="updateAccount.html";';
		         echo '</script>';
				
			}
	 
	     
	
	
	else
		
		{
	
	
	     //$firstName=$_POST["firstName"];
	
	    //$NewPassword =$_POST["NewPassword"];

		
	     
         //$CurrentPassword =$_POST["CurrentPassword"];   
			 
        $vql= "select * from register where firstName='$firstName' and password='$CurrentPassword'";

        $result= $conn->query($vql);
  
		
		    if($result->num_rows>0)
			
            {		

                  // sql to delete a record
                   $sql = "Update register set password='$NewPassword' WHERE firstName='$firstName' and password ='$CurrentPassword'";

                   if ($conn->query($sql) === TRUE) 
				   {
                          
                           echo '<script type="text/javascript">';
		                  echo 'alert("Details updated successfully");';
         
		                  echo 'window.location.href="updateAccount.html";';
		                  echo '</script>';

                   } 
					 
					 else 
			               {  
                              echo '<script type="text/javascript">';
		                      echo 'alert("Error in updating details.Try again!");';
         
		                      echo 'window.location.href="updateAccount.html";';
		                      echo '</script>';

                            }

			}
	
	


            else
            {
	 
	             
                   echo '<script type="text/javascript">';
		          echo 'alert("Entered details are not found!");';
         
		          echo 'window.location.href="updateAccount.html";';
		         echo '</script>';

	 
	 
           }	 
	 
	

		
        }
		
	
    }	
			
  $conn->close();
?>