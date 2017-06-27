<?php require("session.php"); ?>
<?php 
require("db_conn.php");
$PN=$_GET["PN"];
$sql="INSERT INTO `cart` (`id`, `PN`) VALUES ('".$_SESSION["id"]."',".$PN.")";
mysqli_query($mysqli,$sql);
echo "<script>alert(\"Add Success\");</script>";

echo "<script>javascript:history.go(-1);</script>";
?>