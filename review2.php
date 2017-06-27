<?php require("db_conn.php") ?>

<?php
    $TN=$_POST["TN"];
	$PN=$_POST["PN"];
	$star=$_POST["star"];
	$content=$_POST["content"];
	$writer=$_POST["writer"];
	$sql="INSERT INTO `review` (`PN`,`TN`,`star`,`content`, `writer`) VALUES (".$PN.",".$TN.",".$star.",'".$content."','".$writer."')";
	$result=mysqli_query($mysqli, $sql);
	
	$sql2="UPDATE `transaction` SET `rev`='Y' WHERE `TN`=".$TN;
	mysqli_query($mysqli, $sql2);
	
	
	$sql2="UPDATE `follow` SET `new`='Y' WHERE `oid`='".$writer."'";
	mysqli_query($mysqli, $sql2);
	echo "<script>location.href='detail.php?PN=".$PN."'</script>";
?>
