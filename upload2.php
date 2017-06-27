<?php require("session.php"); ?>
<?php require("db_conn.php") ?>

<?php
	$name=$_POST["name"];
	$price=$_POST["price"];
	$category=$_POST["category"];
	$quantity=$_POST["Quantity"];
	$detail=$_POST["Detail"];
	$sql="INSERT INTO `product` (`name`,`price`,`category`,`Quantity`,`Detail`,`seller`) VALUES ('".$name."',".$price.",'".$category."',".$quantity.",'".$detail."','".$_SESSION["id"]."')";
	$result=mysqli_query($mysqli, $sql);
	
	$sql2="UPDATE `follow` SET `new`='Y' WHERE `oid`='".$writer."'";
	mysqli_query($mysqli, $sql2);

	echo "<script>location.href='main.php'</script>";
?>
