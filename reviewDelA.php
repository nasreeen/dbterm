<?php
require("session.php");
?>
<?php require("db_conn.php"); 

if(!isset($_SESSION["admin"])){
    echo "<script>alert(\"Wrong Access.\");</script>";
	echo "<script>javascript:history.go(-1);</script>";
	exit();
}

if(isset($_POST["real"])){
$sql2="DELETE FROM `review` WHERE `RN`=".$_POST["RN"];
mysqli_query($mysqli,$sql2);
    echo "<script>alert(\"Deleted\");</script>";
	echo "<script>javascript:history.go(-2);</script>";
}

?>

<form action="#" method="POST">
    <input type="hidden", name="real", value=1>
    <input type="hidden", name="RN", value=<?php echo $_GET["RN"] ?> >
    <input type="submit", value="DELETE">
</form>