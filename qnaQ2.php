<?php require("session.php"); ?>
<?php require("db_conn.php") ?>

<?php
	$title=$_POST["title"];
	$content=$_POST["content"];
	$PN=$_POST["PN"];
	$writer=$_SESSION["id"];
	$date=$_POST["date"];
	$sql="INSERT INTO `qna_q` (`PN`,`writer`,`title`,`content`,`date`)
	VALUES (".$PN.",'".$writer."','".$title."','".$content."','".$date."')";
	$result=mysqli_query($mysqli, $sql);
	

	echo "<script>location.href='detail.php?PN=".$PN."'</script>";
?>
