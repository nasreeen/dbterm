<?php
require("session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
</head>


<body>
	<?php
	require("db_conn.php");
	if(!($_SESSION["id"]==$_GET["id"])){
		echo "<script>location.href='home.php'</script>";
	}
	$id=$_GET["id"];
	$sql="SELECT * FROM `member_syl` WHERE `id`='".$id."'";
	$result=mysqli_query($mysqli, $sql);
	$row=mysqli_fetch_array($result);
	?>
	<form action="memUpdate2.php" method="POST">
		<input type="hidden", name="id", value="<?php echo $id ?>">
		ID: <?php echo $id."<br>"; ?>
		PW: <input type="password", name="password", value=""> *must write* <br>
		Name: <input type="text", name="nick", value="<?php echo $row["nick"]; ?>"><br>
		Email: <input type="email", name="email", value="<?php echo $row["email"]; ?>"><br>
		Phone: <input type="text", name="phone", value="<?php echo $row["phone"]; ?>"><br>
		Sex: <input type="radio", name="sex", id="sex_M", value="M"><label for="sex_M">M</label>
		<input type="radio", name="sex", id="sex_F", value="F"><label for="sex_F">F</label> 
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; *must choose* <br>
		Age:<select name="age", value="50">
			<?php 
			for($i=10; $i<91; $i=$i+1)
			{
				echo "<option value=\"".$i."\">".$i."</option>";
			}
			?>
			</select><br><br>
		Original PW: <input type="password", name="originpw", value=""><br>
		<input type="submit">
	</form>
</body>



</html>

