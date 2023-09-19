<?php
    include 'config.php';

    $id = $_POST["book_id"];
    $qty = $_POST["qty"];

    $sql = "INSERT INTO cart(book_id, qty) VALUES('$id', '$qty')";
    
    if($con->query($sql)) {
		echo "<html>
        <body onload='loadPage()'></body>
        </html>";
	}
	else {
		echo "<html>
        <body onload='loadPage()'></body>
        </html>";
    }
?>
<script>
    function loadPage() {
        window.location.href = "../cart.php";
    }
</script>