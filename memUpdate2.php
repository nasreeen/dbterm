<?php
require("db_conn.php");
$id=$_POST["id"];
$password=$_POST["password"];
$nick=$_POST["nick"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$sex=$_POST["sex"];
$age=$_POST["age"];
$originpw=$_POST["originpw"];

$sql="SELECT * FROM `member_syl` WHERE `id`='".$id."'";
$result=mysqli_query($mysqli, $sql);
$row=mysqli_fetch_array($result);

$update=1;
if($nick==NULL || $password==NULL || $email==NULL || $phone==NULL || $sex==NULL || $age==NULL){
	$update=0;
	echo "<br>Write all the information<br>";
	echo "<br><a href=\"home.php\">Go to home</a>";
}

if($originpw==$row["pw"] && $update){
	$sql="UPDATE `member_syl` SET `pw`='".$password."', `nick`='".$nick."', `email`='".$email."', `phone`='".$phone."', `sex`='".$sex."', `age`='".$age."' WHERE `id`='".$id."'";
	mysqli_query($mysqli, $sql);
	echo "Edit Complete";
	echo "<br><a href=\"home.php\">Go to home</a>";
}
else if($originpw!=$row["pw"] && $update){
	echo "Incorrect password";
	echo "<br><a href=\"home.php\">Go to home</a>";
}

?>
