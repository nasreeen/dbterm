<?php
require("session.php");
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
</head>


<body>
    
    <?php
    require("db_conn.php");
    $PN=$_GET["PN"];
    $sql="SELECT * FROM `product` WHERE `PN`=".$_GET[PN];
	$result=mysqli_query($mysqli, $sql);
	$row=mysqli_fetch_array($result);
    ?>
    	<form action="uploadUpdate2.php" method="POST">
		<input type="hidden", name="PN", value="<?php echo $PN ?>">
		Product Name: <?php echo $row[name]; ?><br>
		Price: <?php echo $row[price]; ?><br>
        Category: <?php echo $row[category]; ?><br>
		Quantity: <?php echo $row[Quantity]; ?><br>
		Detail: <textarea name="Detail"><?php echo $row[Detail] ?></textarea><br>
		<input type = "submit", value="Update">
	</form>
</body>



</html>

