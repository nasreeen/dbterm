<?php require("session.php"); ?>
<?php require("db_conn.php") ?>

<?php
	$title=$_POST["title"];
	$content=$_POST["content"];
	$PN=$_POST["PN"];
	$QN=$_POST["QN"];
	$writer=$_SESSION["id"];
	$date=$_POST["date"];
	$sql="INSERT INTO `qna_a` (`QN`,`PN`,`writer`,`title`,`content`,`date`)
	VALUES (".$QN.",".$PN.",'".$writer."','".$title."','".$content."','".$date."')";
	$result=mysqli_query($mysqli, $sql);
	

    $sql="UPDATE `qna_q` SET `ans`='Y' WHERE `QN`=".$QN;
    mysqli_query($mysqli, $sql);
	echo "<script>location.href='detail.php?PN=".$PN."'</script>";
?>
