<?php require_once('config.php'); ?>

<?php
   $query="SELECT deliveryID,name,address FROM delivery";
   $result_set=mysqli_query($conn,$query);

  if($result_set){
	  // read data
	  echo mysqli_num_rows($result_set) . "Records found. <hr>";
	  
	  $table ='<table>';
	  $table .'</tr><th>Del ID</th><th>Name</th><th>Address</th>';
	  
	  
	  while ($record=mysqli_fetch_assoc($result_set)){
		  $table .= '<tr>';
		  $table .= '<td>' . $record['deliveryID'] . '</td>';
		  $table .= '<td>' . $record['name'] . '</td>';
		  $table .= '<td>' . $record['address'] . '</td>';
		 
		  $table .= '</tr>';
	  }
	  $table .='</table>';
  }
  
  
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <title>Select Query</title>
   </head>
   <body>
   <?php echo $table; ?>
   </body>
   </html>
   <?php mysqli_close($conn); ?>