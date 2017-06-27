<?php require("session.php"); ?>
<?php require("db_conn.php");
$PN=$_GET["PN"];
$sql="DELETE FROM `cart` WHERE `PN`=".$PN." AND `id`='".$_SESSION["id"]."'";
mysqli_query($mysqli,$sql);
        echo "<script>alert(\"Deleted\");</script>";
        echo "<script>javascript:history.go(-1);</script>";
?>
