<?php 
require("session.php");
require("db_conn.php");

$id=$_POST["id"];
$nick=$_POST["nick"];
$sql="SELECT * FROM `member_syl` WHERE `id`='".addslashes($id)."' AND `nick`='".addslashes($nick)."'";

$result=mysqli_query($mysqli, $sql);
$row=mysqli_fetch_array($result);

$count=mysqli_num_rows($result);


if($count==1){
	$_SESSION["id"]=$id;
	echo "Enter new pw<br>";
	echo"
	<form action=\"pw_check2.php\" method=\"POST\">
	<input type=\"hidden\" name=\"id\" value=\"".$id."\">
	<input type=\"password\" name=\"pw\">
	<input type=\"submit\">
	</form>";
}
else{
	echo "<br>No Information";
}
?>
