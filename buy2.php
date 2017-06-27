<?php require("session.php") ?>
<?php
require("db_conn.php");

$PN=$_POST["PN"];
$Quantity=$_POST["originalQ"];
$Quantity=$Quantity - $_POST["Quantity"];
$buyer=$_SESSION["id"];
$date=$_POST["date"];
$price=$_POST["price"];


$sql="SELECT * FROM `product` where `PN`=".$PN;
$result=mysqli_query($mysqli, $sql);
$row=mysqli_fetch_array($result);
$seller=$row["seller"];

$sql="SELECT * FROM `member_syl` WHERE `id`='".$seller."'";
$result=mysqli_query($mysqli, $sql);
$row=mysqli_fetch_array($result);
$point1=$row["point"]+($price*$_POST["Quantity"]);

$sql="SELECT * FROM `member_syl` WHERE `id`='".$buyer."'";
$result=mysqli_query($mysqli, $sql);
$row=mysqli_fetch_array($result);
$point2=$row["point"]-($price*$_POST["Quantity"]);

if($point2<0){
	echo "Charge your Money ;(<br>";
}
else{
$sql="UPDATE `member_syl` SET `point`=".$point1." Where `id`='".$seller."'";
mysqli_query($mysqli, $sql);
$sql="UPDATE `member_syl` SET `point`=".$point2." Where `id`='".$buyer."'";
mysqli_query($mysqli, $sql);





$sql="UPDATE `product` SET `Quantity`=".$Quantity." Where `PN`=".$PN;
mysqli_query($mysqli, $sql);


$sql="INSERT INTO `transaction` (`PN`,`buyer`,`seller`,`price`,`quantity`,`date`) 
VALUES (".$PN.",'".$buyer."','".$seller."',".$price*$_POST["Quantity"].",".$_POST["Quantity"].",'".$date."')";
mysqli_query($mysqli, $sql);


$sql="SELECT * FROM `cart` WHERE `PN`=".$PN." AND `id`='".$_SESSION["id"]."'";
$result=mysqli_query($mysqli,$sql);
$count=mysqli_num_rows($result);
if($count==1){
    $sql="DELETE FROM `cart` WHERE `PN`=".$PN." AND `id`='".$_SESSION["id"]."'";
    mysqli_query($mysqli,$sql);
}
	
echo "<script>alert(\"Purchase Success!!!!\");</script>";
echo "<script>location.href='myPage.php'</script>";
}
?>

