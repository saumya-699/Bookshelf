<?php
    include 'config.php';

    $id = $_POST["id"];

    $sql = "INSERT INTO cart(book_id, qty) VALUES('$id', '1')";
    
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