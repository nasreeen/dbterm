<?php
require("session.php");
?>
<?php
	require("db_conn.php");
	if(!($_SESSION["id"]==$_GET["id"])){
		echo "<script>location.href='home.php'</script>";
	}
?>
    Delete Account <br>
    ID: <?php echo $_SESSION["id"]; ?>
    <br>
	<form action="memDelete2.php" method="POST">
	Enter Password: <input type="password", name="originpw", value=""><br>
	<input type="submit">
	</form>