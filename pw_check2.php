<?php
require("session.php");
require("db_conn.php");

$id=$_POST["id"];
$pw=$_POST["pw"];

if(isset($_SESSION["id"]))
{
	$sql="UPDATE `member_syl` SET `pw`='".$pw."' WHERE `id`='".$id."'";
	mysqli_query($mysqli, $sql);
	session_destroy();
	echo "<script>location.href='login.php'</script>";
}


else{
echo "변경실패";
}
?>
