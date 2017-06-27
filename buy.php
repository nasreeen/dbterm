<?php require("session.php"); ?>
<?php require("db_conn.php"); ?>

<?php

$PN=$_GET["PN"];
$sql="SELECT * FROM `product` WHERE PN='".$PN."'";
$result=mysqli_query($mysqli, $sql);
$row=mysqli_fetch_array($result);
echo "Product Name: ".$row[name]."<br>";
?>



<form action="buy2.php" method="POST">
		<input type="hidden", name="PN", value="<?php echo $PN ?>">
		<input type="hidden", name="date", value=<?php echo date("Y-m-d")."$nbsp;".date("H:i:s"); ?> >
		Quantity:<select name="Quantity">
			<?php 
			for($i=1; $i<= $row[Quantity]; $i=$i+1)
			{
				echo "<option value=\"".$i."\">".$i."</option>";
			}
			?>
			</select><br><br>
		<input type="hidden", name="originalQ", value=<?php echo $row[Quantity]; ?> >
		<input type="hidden", name="price", value="<?php echo $row["price"] ?>">
		<input type="submit", value="BUY">
		
</form>
<a href="javascript:history.go(-1)">Go back</a>