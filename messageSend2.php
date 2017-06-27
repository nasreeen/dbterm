<?php require("session.php") ?>
<?php require("db_conn.php") ?>

<?php
	$title=$_POST["title"];
	$content=$_POST["content"];
	$to=$_POST["to"];
	$from=$_POST["from"];
	$date=$_POST["date"];
	$read="N";
	
	if($title==NULL || $content==NULL){
		echo "<script>alert(\"Wirte properly\"); history.go(-1);</script>";
	}
else{
	$sql2="SELECT * FROM `member_syl` WHERE `id`='".$to."'";
	$result2=mysqli_query($mysqli, $sql2);
	$row2=mysqli_fetch_array($result2);
	$count=mysqli_num_rows($result2);
}
	if($count==0){
		echo "<script>alert(\"Wrong ID\"); history.go(-1);</script>";
	}
	else{
		
	$sql="INSERT INTO `message` (`from`,`to`,`title`,`content`,`read`,`date`)
	VALUES ('".$from."','".$to."','".$title."','".$content."','".$read."','".$date."')";

	$result=mysqli_query($mysqli, $sql);
	
	echo "<script>alert(\"Send\");</script>";
    echo "<script>location.href='main.php'</script>";
	}
	
?>
