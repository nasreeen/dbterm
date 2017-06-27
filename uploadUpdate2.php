
<?php require("db_conn.php") ?>

<?php
	$name=$_POST["name"];
	$category=$_POST["category"];
	$quantity=$_POST["Quantity"];
	$detail=$_POST["Detail"];
	

	$sql="UPDATE `product` SET `Quantity`=".$quantity.",`Detail`='".$detail."' WHERE PN=".$_POST["PN"];
	mysqli_query($mysqli, $sql);
	
	echo "<script>location.href='main.php'</script>";
?>
