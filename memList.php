<?php
require("session.php");
?>
<!DOCTYPE html>

<html>
<body>
<style>
td, table{
border: 1px solid black;
}
</style>
<?php
if(!isset($_SESSION["admin"])){
    echo "<script>alert(\"Wrong Access.\");</script>";
	echo "<script>javascript:history.go(-1);</script>";
	exit();
}

	require("db_conn.php");

echo "<a href=\"home.php\">Home</a> &nbsp; &nbsp <a href=\"main.php\">Main List</a>  &nbsp; &nbsp  
<a href=\"myPage.php\">My Page</a>(".$_SESSION["id"].")  &nbsp; &nbsp; 
<a href=\"message.php\">Message</a>";
        if(isset($_SESSION["admin"])){
            echo " &nbsp; &nbsp &nbsp; &nbsp <a href=\"adminPage.php\">AdminPage</a><br><br>";
        }
        

	$sql="SELECT * FROM `member_syl` WHERE 1";

	$result=mysqli_query($mysqli, $sql);
	echo "<table>";
	echo "<tr>
			<td>ID</td>	
			<td>Name</td>
			<td>Email</td>
			<td>Phone</td>
			<td>Sex</td>
			<td>Age</td>
			<td>Admin</td>
			<td>Info</td>
		</tr>";
	while($row=mysqli_fetch_array($result))
	{
		echo "<tr>
				<td>".$row["id"]."</td>	
				<td>".$row["nick"]."</td>
				<td>".$row["email"]."</td>
				<td>".$row["phone"]."</td>
				<td>".$row["sex"]."</td>
				<td>".$row["age"]."</td>
				<td><a href=\"adminEdit.php?id=".$row["id"]."\">";
				echo $row["admin"]."</a>";
				echo "</td>
				<td><a href=\"myPage.php?id=".$row["id"]."\">Info</a>
			</tr>";
	}
	echo "</table>";
?>
</body>
</html>


