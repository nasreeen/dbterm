<?php require("session.php"); ?>
<?php require("db_conn.php"); 
$MSN=$_GET["MSN"];
$sql="SELECT * FROM `message` WHERE `MSN`=".$MSN;
$result=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($result);
if($row["from"]==$_SESSION["id"]){
    echo "<script>alert(\"Cancelled\");</script>";
    $sql="DELETE FROM `message` WHERE `MSN`=".$MSN;
    mysqli_query($mysqli,$sql);
    echo "<script>javascript:history.go(-1);</script>";
}
else{
    echo "<script>alert(\"Wrong Access\");</script>";
    echo "<script>javascript:history.go(-1);</script>";
    
}
?>
