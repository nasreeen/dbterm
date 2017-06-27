<?php require("session.php"); ?>
<?php 
require("db_conn.php");
$PN=$_GET["PN"];
$sql="SELECT * FROM `product` WHERE `PN`=".$PN;
$result=mysqli_query($mysqli, $sql);
$row=mysqli_fetch_array($result);
if($row[seller]!=$_SESSION["id"] && !isset($_SESSION["admin"])){
    echo "WRONG ACCESS";
    echo "<script>location.href='main.php'</script>";
}

?>

Do you really want to delete this product?
<br>
<form action="uploadDelete2.php", method="POST">
    <input type="hidden", name="PN", value=<?php echo $PN; ?> >
    <input type="submit" value="YES">
</form>
<br>
<a href="javascript:history.go(-1)">Go back</a>
