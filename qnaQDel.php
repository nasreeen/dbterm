<?php require("session.php"); ?>
<?php
require("db_conn.php");
$QN=$_GET["QN"];
$sql="SELECT * FROM `qna_q` WHERE `QN`=".$QN;

$result=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($result);
if($row[writer]!=$_SESSION["id"] && !isset($_SESSION["admin"])){
	echo "Wrong Access";
	echo "<script>location.href='myPage.php'</script>";
exit();
}

if(isset($_POST["real"])){
if($row["ans"]=='Y'){
    $sql3="DELETE FROM `qna_a` WHERE `QN`=".$QN;
mysqli_query($mysqli,$sql3);
}
$sql2="DELETE FROM `qna_q` WHERE `QN`=".$QN;
mysqli_query($mysqli,$sql2);
echo "<script>javascript:history.go(-2);</script>";
}
?>
<form action="#" method="POST">
    <input type="submit", value="DELETE">
    <input type="hidden", name="real", value=1>
</form>