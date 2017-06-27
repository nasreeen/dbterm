<?php require("session.php"); ?>
<?php
require("db_conn.php");
$TN=$_POST["TN"];
$sql="SELECT * FROM `transaction` WHERE `TN`=".$TN;

$result=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($result);
if($row[buyer]!=$_SESSION["id"]){
	echo "Wrong Access";
//	echo "<script>location.href='myPage.php'</script>";
}

$sql2="DELETE FROM `review` WHERE `TN`=".$TN;
mysqli_query($mysqli,$sql2);
$sql3="UPDATE `transaction` SET `rev`='N' WHERE `TN`=".$TN;
mysqli_query($mysqli,$sql3);
echo "<script>alert(\"Deleted\");</script>";

echo "<script>javascript:history.go(-2);</script>";
?>
    