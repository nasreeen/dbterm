<?php
require("session.php");
?>
<?php
require("db_conn.php");

$sql="SELECT * FROM `member_syl` WHERE `id`='".$_SESSION["id"]."'";
$sql2="DELETE FROM `member_syl` WHERE `id`='".$_SESSION["id"]."'";
$result=mysqli_query($mysqli, $sql);
$row=mysqli_fetch_array($result);


$sql3="UPDATE `product` SET `del`='Y' WHERE `seller`='".$_SESSION["id"]."'";
$sql4="DELETE FROM `cart` WHERE `id`='".$_SESSION["id"]."'";
$sql5="DELETE FROM `follow` WHERE `sid`='".$_SESSION["id"]."'";
if($row["pw"]==$_POST["originpw"])
{
    mysqli_query($mysqli, $sql2);
    mysqli_query($mysqli, $sql3);
    mysqli_query($mysqli, $sql4);
    mysqli_query($mysqli, $sql5);
    
    
    unset($_SESSION["id"]);
    echo "Deleted!";
	echo "<br><a href=\"home.php\">Go to home</a>";
}
else{
    echo "Wrong Password!";
	echo "<br><a href=\"home.php\">Go to home</a>";
}
?>
