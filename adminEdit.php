<?php
require("session.php");
?>
<?php require("db_conn.php"); 

if(!isset($_SESSION["admin"])){
    echo "<script>alert(\"Wrong Access.\");</script>";
	echo "<script>javascript:history.go(-1);</script>";
	exit();
}
$id=$_GET["id"];
$sql="SELECT * FROM `member_syl` WHERE `id`='".$id."'";
$result=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($result);
if($row["admin"]=="Y"){
    $sql="UPDATE `member_syl` SET `admin`='N' WHERE `id`='".$id."'";
    mysqli_query($mysqli,$sql);
    echo "<script>alert(\"Admin = 'N'\");</script>";
	echo "<script>javascript:history.go(-1);</script>";
}
else if($row["admin"]=="N"){
     $sql="UPDATE `member_syl` SET `admin`='Y' WHERE `id`='".$id."'";
    mysqli_query($mysqli,$sql);
    echo "<script>alert(\"Admin = 'Y'\");</script>";
	echo "<script>javascript:history.go(-1);</script>";
}

?>