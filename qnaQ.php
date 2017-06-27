<?php require("session.php"); ?>

<?php require("db_conn.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>php</title>
</head>
<body>
	
	
	<form action="qnaQ2.php" method="POST">
	<input type="hidden", name="PN", value=<?php echo $_GET["PN"] ?> >
		<input type="hidden", name="date", value=<?php echo date("Y-m-d")."$nbsp;".date("H:i:s"); ?> >
	    Title:<input type="text", name="title"><br>
		Content: <textarea name="content"></textarea><br>
		<input type = "submit">
	</form>
<br>
</body>
</html>
