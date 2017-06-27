<?php 
require("session.php");
require("db_conn.php");

$id=$_POST["id"];
$password=$_POST["password"];
$sql="SELECT * FROM `member_syl` WHERE `id`='".addslashes($id)."' AND `pw`='".addslashes($password)."'";

$result=mysqli_query($mysqli, $sql);
$row=mysqli_fetch_array($result);

$count=mysqli_num_rows($result);


if($count==1){
	$_SESSION["id"] = $id;
	echo $_SESSION["id"];
	if($row["admin"]=="Y"){
		$_SESSION["admin"]="Y";
	}
	echo "<script>location.href='home.php'</script>";
}
else{
	echo "incorrect";
}
?>
