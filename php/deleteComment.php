<?php
    include 'config.php';

    $id = $_GET["book_id"];
    $c_id = $_GET["c_id"];

    $read = "SELECT c_id FROM comments";
    $result = $con->query($read);

    while($row = $result->fetch_assoc()) {
        $sql = "DELETE FROM comments WHERE c_id = $c_id";
    }

    
    
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
        window.location.href = "<?php echo "../book.php?book_id=".$id."&title=".$_GET["title"] ?>";
    }
</script>