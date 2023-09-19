<?php
    include 'config.php';

    $id = $_GET["id"];
    $name = $_GET["name"];
    $comment = $_GET["comment"];

    $read = "SELECT c_id FROM comments";
    $result = $con->query($read);
    while($row = $result->fetch_assoc()) {
        $cID = $row["c_id"] + 1;
    }

    

    $sql = "INSERT INTO comments(c_id, book_id, name, comment) VALUES('$cID', '$id', '$name', '$comment')";
    
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
        window.location.href = "<?php echo "../book.php?book_id=".$_GET["id"]."&title=".$_GET["title"] ?>";
    }
</script>