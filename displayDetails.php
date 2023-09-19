<?php require_once('config.php'); ?>

<?php
   $query="SELECT book_ID,title,author,year FROM addbooks";
   $result_set=mysqli_query($conn,$query);

  if($result_set){
	  // read data
	  echo mysqli_num_rows($result_set) . "Records found. <hr>";
	  
	  $table ='<table>';
	  $table .'</tr><th>Title</th><th>Author</th><th>Year</th>';
	  
	  
	  while ($record=mysqli_fetch_assoc($result_set)){
		  $table .= '<tr>';
		  $table .= '<td>' . $record['book_ID'] . '</td>';
		  $table .= '<td>' . $record['title'] . '</td>';
		  $table .= '<td>' . $record['author'] . '</td>';
		  $table .= '<td>' . $record['year'] . '</td>';
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