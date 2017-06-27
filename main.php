<?php require("session.php"); ?>
<!DOCTYPE html>

<html>
<body>
<style>
td, table{
border: 1px solid black;
}
</style>
<?php
	require("db_conn.php");
	if(!isset($_SESSION["id"])){
		echo "<script>alert(\"Please Login.\");</script>";
		echo "<script>javascript:history.go(-1);</script>";
		exit();
	}
echo "<a href=\"home.php\">Home</a> &nbsp; &nbsp <a href=\"main.php\">Main List</a>  &nbsp; &nbsp  
<a href=\"myPage.php\">My Page</a>(".$_SESSION["id"].")  &nbsp; &nbsp; 
<a href=\"message.php\">Message</a>";
        if(isset($_SESSION["admin"])){
            echo " &nbsp; &nbsp &nbsp; &nbsp <a href=\"adminPage.php\">AdminPage</a>";
        }
        echo "<br>";?>

<p>
-Product List-

<?php
if(isset($_SESSION["admin"])){
		if(isset($_POST["filtering"])){
		$filter=$_POST["category"];
		$sql="SELECT * FROM `product` WHERE category='".$filter."'";
	}
	else if(isset($_POST["search"])){
		$keyword=$_POST["keyword"];
		$sql="SELECT * FROM `product` WHERE name LIKE '%".$keyword."%'";
	//	echo $sql;
	//	echo "<br>";
	}
	else if(isset($_POST["all"])){
		$sql="SELECT * FROM `product` ";
	}
	else{
		$sql="SELECT * FROM `product`";
	}
}
else{
	if(isset($_POST["filtering"])){
		$filter=$_POST["category"];
		$sql="SELECT * FROM `product` WHERE del='N' AND category='".$filter."'";
	}
	else if(isset($_POST["search"])){
		$keyword=$_POST["keyword"];
		$sql="SELECT * FROM `product` WHERE del='N' AND name LIKE '%".$keyword."%'";
	//	echo $sql;
	//	echo "<br>";
	}
	else if(isset($_POST["all"])){
		$sql="SELECT * FROM `product` WHERE del='N'";
	}
	else{
		$sql="SELECT * FROM `product` WHERE del='N'";
	}
}
?>

<?php

	$result=mysqli_query($mysqli, $sql);
	echo "<table>";
	echo "<tr>
			<td># &nbsp; </td>	
			<td>Category &nbsp; &nbsp; </td>
			<td>Product Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
			<td>Price &nbsp; &nbsp; </td>
			<td>Quantity &nbsp; </td>";
			if(isset($_SESSION["admin"])){
				echo "<td>del(admin)</td>";
			}
	echo	"</tr>";
	while($row=mysqli_fetch_array($result))
	{

		echo "<tr>
				<td>";
		if($row["del"]=="Y"){
			echo "<strike>";
		}
		if($row["seller"]==$_SESSION["id"]){
			echo "<FONT COLOR=\"RED\">";
		}
		echo $row["PN"];
				if($row["seller"]==$_SESSION["id"]){
			echo "</FONT>";
		}
		
		if($row["del"]=="Y"){
			echo "</strike>";
		}
		echo  "</td>	
				<td>";
				
		if($row["del"]=="Y"){
			echo "<strike>";
		}
				if($row["seller"]==$_SESSION["id"]){
			echo "<FONT COLOR=\"RED\">";
		}
				echo $row["category"];
				if($row["seller"]==$_SESSION["id"]){
			echo "</FONT>";
		}
				if($row["del"]=="Y"){
			echo "</strike>";
		}
			echo "</td>
				<td>";
				

		echo "<a href=\"detail.php?PN=".$row["PN"]."\">";
				if($row["del"]=="Y"){
			echo "<strike>";
		}
	if($row["seller"]==$_SESSION["id"]){
			echo "<FONT COLOR=\"RED\">";
		}
		
		echo $row["name"];
		
if($row["seller"]==$_SESSION["id"]){
			echo "</FONT>";
		}
				if($row["del"]=="Y"){
			echo "</strike>";
		}
				echo "</td>
				<td>";
								if($row["del"]=="Y"){
			echo "<strike>";
		}
				if($row["seller"]==$_SESSION["id"]){
			echo "<FONT COLOR=\"RED\">";
		}	
				echo $row["price"];
		if($row["seller"]==$_SESSION["id"]){
			echo "</FONT>";
		}		
								if($row["del"]=="Y"){
			echo "</strike>";
		}
				echo "</td>
				<td>";
						if($row["del"]=="Y"){
			echo "<strike>";
		}
					if($row["seller"]==$_SESSION["id"]){
			echo "<FONT COLOR=\"RED\">";
		}	
		if($row["Quantity"]==0){
			echo "Sold Out";
		}
		else{
			echo $row["Quantity"];
		}
				if($row["seller"]==$_SESSION["id"]){
			echo "</FONT>";
		}	
			if($row["del"]=="Y"){
			echo "</strike>";
		}
		echo"</td>";
		
		
			if(isset($_SESSION["admin"])){
				echo "<td>";
				if($row["del"]=='N'){
					echo "<a href=\"uploadDelete.php?PN=".$row["PN"]."\">Delete";
				}
				else{
					echo "<strike>Deleted</strike>";
				}
				echo "</td>";
			}
		
		
		echo "</tr>";

	}
	echo "</table>";
?>
</p>
<a href="upload.php">Upload my product</a>
<br><br>
<form action="#" method="POST">
	<input type="hidden", name="filtering", value=1>
	Category: <input type="radio", name="category" id="category_dress" value="Dress"><label for="category_dress">Dress</label>
	    <input type="radio", name="category" id="category_top" value="Top"><label for="category_top">Top</label>
	    <input type="radio", name="category" id="category_outer" value="Outer"><label for="category_outer">Outer</label>
	    <input type="radio", name="category" id="category_knit" value="Knit"><label for="category_knit">Knit</label>
	    <input type="radio", name="category" id="category_skirt" value="Skirt"><label for="category_skirt">Skirt</label>
	    <input type="radio", name="category" id="category_pants" value="Pants"><label for="category_pants">Pants</label>
	<input type="submit", value="FILTER">
</form>
<br>
<form action="#" method="POST">
	<input type="hidden", name="search", value=1>
	<input type="text", name="keyword">
	<input type="submit", value="SEARCH">
</form><br>
<form action="#" method="POST">
	<input type="hidden", name="all", value=1>
	<input type="submit", value="VIEW ALL">
</form>
