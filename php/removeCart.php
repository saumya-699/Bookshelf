<?php
    include 'config.php';

    $id = $_GET["id"];

    
        $sql = "DELETE FROM cart WHERE book_id = $id";
    

    
    
    if($con->query($sql)) {
		echo "<html>
        <body onload='loadPage()'></body>
        </html>";
	}
	else {
		echo "Error : ".$con->error;
    }
?>
<script>
    function loadPage() {
        window.location.href = "../cart.php";
    }
</script>