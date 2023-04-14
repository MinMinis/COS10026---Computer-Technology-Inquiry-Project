<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/style.css" >
    <title>SE7EN | RECEIPT</title>
</head>
<body>
<?php
		if (!isset($_GET["db_msg"])) {// not from process_order.php, redirection
			header("location:enquire.php");
			exit();
		}
		else { // from process_order.php, display receipt
			echo $_GET["db_msg"];
		}
	?>
</body>
</html>