<?php require("db_conn.php") ?>

<?php
    $TN=$_POST["TN"];
	$PN=$_POST["PN"];
	$star=$_POST["star"];
	$content=$_POST["content"];
	$writer=$_POST["writer"];
	$sql="UPDATE `review` SET `star`=".$star.", `content`='".$content."' WHERE `TN`=".$TN;
	$result=mysqli_query($mysqli, $sql);
	
	$sql2="UPDATE `transaction` SET `rev`='Y' WHERE `TN`=".$TN;
	mysqli_query($mysqli, $sql2);
	
	echo "<script>location.href='detail.php?PN=".$PN."'</script>";
?>
