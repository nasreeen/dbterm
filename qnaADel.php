<?php require("session.php"); ?>
<?php
require("db_conn.php");
$AN=$_POST["AN"];
$sql="SELECT * FROM `qna_a` WHERE `AN`=".$AN;

$result=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($result);
if(isset($_POST["real"])){
$sql2="DELETE FROM `qna_a` WHERE `AN`=".$AN;
mysqli_query($mysqli,$sql2);

    $sql3="UPDATE `qna_q` SET `ans`='N' WHERE `QN`=".$row[QN];
    mysqli_query($mysqli, $sql3);
echo "<script>javascript:history.go(-3);</script>";
}
?>
<form action="#" method="POST">
    <input type="submit", value="DELETE">
    <input type="hidden", name="AN", value=<?php echo $AN; ?>>
    <input type="hidden", name="real", value=1>
</form>