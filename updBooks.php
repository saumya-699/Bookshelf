<?php require_once('config.php'); ?>
<?php



//delete data
$query = "UPDATE addBooks SET title='Madol doova' WHERE id = 3";
$result_set = mysqli_query($conn,$query);

if($result_set)
{
	echo mysqli_affected_rows($conn) . "Database query failed.";
	
}else{
	echo "Record Updated.";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta chareset="UTF-8">
 <title>Update Query</title>
 </head>
 <body>
 
 </body>
 </html>
 <?php mysqli_close($conn); ?>