<?php require("session.php"); ?>

<?php
	if(isset($_POST["act2"]))
	{
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
			echo "Edit fail";
		}
		exit();
	}
?>


<?php 
	if(isset($_POST["act1"]))
	{
		require("db_conn.php");
		$id=$_POST["id"];
		$nick=$_POST["nick"];
		$sql="SELECT * FROM `member_syl` WHERE `id`='".addslashes($id)."' AND `nick`='".addslashes($nick)."'";

		$result=mysqli_query($mysqli, $sql);
		$row=mysqli_fetch_array($result);

		$count=mysqli_num_rows($result);


		if($count==1){
			$_SESSION["id"]=$id;
			echo "Write new pw<br>";
			echo"
			<form action=\"#\" method=\"POST\">
			<input type=\"hidden\" name=\"id\" value=\"".$id."\">
			<input type=\"hidden\" name=\"act2\" value=\"1\">
			<input type=\"password\" name=\"pw\">
			<input type=\"submit\">
			</form>";
		}
		else{
			echo "<br>No Information";
		}
		exit();
	}
?>

<form action="#" method="POST">
ID: <input type="text" name="id"><br>
PW: <input type="text" name="nick"><br>
<input type="hidden" name="act1" value="1">
<input type="submit">
</form>


