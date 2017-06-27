<?php require("session.php"); ?>
<?php require("db_conn.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>php</title>
</head>
<body>
	<?php
	echo "<style type=\"text/css\"> p{ border: 1px solid black; width: 400px}</style>";
	$QN=$_GET["QN"];
	$sql="SELECT * FROM `qna_q` WHERE `QN`=".$QN;
	$result=mysqli_query($mysqli, $sql);
	$row=mysqli_fetch_array($result);
	?>
	<br>
Title: <?php echo $row[title]; ?><br>
Writer: <?php echo $row[writer]; ?>
<br>
<p>
    <br>
    <?php echo $row[content]; ?> 
    <br><br>
</p>
	<form action="qnaAnswer2.php" method="POST">
	<input type="hidden", name="PN", value=<?php echo $_GET["PN"] ?> >
	<input type="hidden", name="QN", value=<?php echo $_GET["QN"] ?> >
		<input type="hidden", name="date", value=<?php echo date("Y-m-d")."$nbsp;".date("H:i:s"); ?> >
	    Title:<input type="text", name="title" value="<?php echo "RE: ".$row["title"]; ?>"><br>
		Content: <textarea name="content"></textarea><br>
		<input type = "submit">
	</form>
<br>
</body>
</html>
