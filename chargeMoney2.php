<?php
require("db_conn.php");


$sql="SELECT * FROM `member_syl` WHERE `id`='".$_POST["id"]."'";
$result=mysqli_query($mysqli, $sql);
$row=mysqli_fetch_array($result);
$money=$row[point] + $_POST["amount"];
$date=$_POST["date"];
$sql="UPDATE `member_syl` SET `point`=".$money." WHERE `id`='".$_POST["id"]."'";
mysqli_query($mysqli, $sql);

$sql="INSERT INTO `money` (`id`, `amount`, `date`) VALUES ('".$_POST["id"]."',".$_POST["amount"].",'".$date."')";
mysqli_query($mysqli, $sql);
?>


<?php
echo "<script>alert(\"Charged~\");</script>" ;
echo "<script>location.href='myPage.php'</script>";
?>