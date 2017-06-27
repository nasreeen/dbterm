<?php require("session.php"); ?>
<html>
<body>
<style>
td, table{
border: 1px solid black;
}
</style>

<?php require("db_conn.php"); 
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
            if(isset($_GET["id"])){
            	$sessionid=$_GET["id"];
            }
        }
        echo "<br>";
if(!isset($_SESSION["admin"])||!isset($_GET["id"])){
$sessionid=$_SESSION["id"];
}?>
<br>
<?php
echo $sessionid."<br>";
?>
----------My Money-----------
<?php

$sql="SELECT * FROM `member_syl` WHERE `id`='".$sessionid."'";
$result=mysqli_query($mysqli, $sql);
$row=mysqli_fetch_array($result);
echo "<br>My money: ".$row["point"]."&nbsp; &nbsp; &nbsp; &nbsp; <br><a href=\"chargeHistory.php\">Charge History</a><br>";
echo "<a href=\"chargeMoney.php\">Go to charge<a/><br>";
?>
<br>
---------My Product----------
<br>
<?php
$sql="SELECT * FROM `product` WHERE `seller`='".$sessionid."'";
	$result=mysqli_query($mysqli, $sql);
	$count=mysqli_num_rows($result);
	if($count==0){
		echo "Nothing<br>";
	}
	else{
	echo "<table>";
	echo "<tr>
			<td>Product Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
			<td>Price &nbsp; &nbsp; &nbsp; &nbsp; </td>
			<td>Transaction history &nbsp; </td>
			<td>Quantity &nbsp; </td>
		</tr>";
	while($row=mysqli_fetch_array($result))
	{
	$sql2="SELECT `name` FROM `product` WHERE `PN`=".$row["PN"];
	$result2=mysqli_query($mysqli,$sql2);
	$row2=mysqli_fetch_array($result2);
		echo "<tr>
				<td><a href=\"detail.php?PN=".$row["PN"]."\">".$row2["name"]."</a></td>
				<td>".$row["price"]."</td>
				<td><a href=\"transHistory.php?PN=".$row["PN"]."\">View History</a></td>
				<td>".$row["Quantity"]."</td>
			</tr>";
	}
	echo "</table>";
	}
?>
<br>
-----------My Cart-----------
<br>

<?php
	$sql="SELECT * FROM `cart` natural join `product` WHERE `id`='".$sessionid."'";
	$result=mysqli_query($mysqli, $sql);
	$count=mysqli_num_rows($result);
	if($count==0){
		echo "Nothing<br><br>";
	}
	else{
	echo "<table>";
	echo "<tr>
			<td>Product Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
			<td>Price (ea.)</td>
			<td>Buy &nbsp; </td>
			<td>Delete &nbsp; </td>
		</tr>";
	while($row=mysqli_fetch_array($result))
	{
		echo "<tr>
				<td><a href=\"detail.php?PN=".$row["PN"]."\">".$row["name"]."</a></td>	
				<td>".$row["price"]."</td>
				<td><a href=\"buy.php?PN=".$row["PN"]."\">Buy</a></td>
				<td><a href=\"cartDelete.php?PN=".$row["PN"]."\">Delete</a></td>
			</tr>";
	}
	echo "</table>";
	}
?>

<br>
-----My Purchase History-----
<br>

<?php
	$sql="SELECT * FROM `transaction` WHERE `buyer`='".$sessionid."'";
	$result=mysqli_query($mysqli, $sql);
	$count=mysqli_num_rows($result);
	if($count==0){
		echo "Nothing<br><br>";
	}
	else{
	echo "<table>";
	echo "<tr>
			<td>Date &nbsp; </td>	
			<td>Product Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
			<td>Price (ea.)</td>
			<td>Quantity &nbsp; </td>
			<td>Review &nbsp; </td>
		</tr>";
	while($row=mysqli_fetch_array($result))
	{
	$sql2="SELECT * FROM `product` WHERE `PN`=".$row["PN"];
	$result2=mysqli_query($mysqli,$sql2);
	$row2=mysqli_fetch_array($result2);
		echo "<tr>
				<td>".$row["date"]."</td>	
				<td><a href=\"detail.php?PN=".$row["PN"]."\">".$row2["name"]."</a></td>
				<td>".$row2["price"]."</td>
				<td>".$row["quantity"]."</td>
				<td>";
		if($row[rev]=='N'){
		    echo "<a href=\"review.php?PN=".$row["PN"]."&TN=".$row["TN"]."\">Write</a>";
		}
		else{
		    echo "Done";
		}
		echo "</td>
			</tr>";
	}
	echo "</table>";
	}
?>
<br>
* I'm following...<br>
<?php
$sql="SELECT * FROM `follow` WHERE `sid`='".$sessionid."'";
$result=mysqli_query($mysqli,$sql);
$count=mysqli_num_rows($result);
if($count==0){
	echo "nobody";
}
else{
	while($row=mysqli_fetch_array($result)){
		echo "-<a href=\"memInfo.php?info=".$row["oid"]."\">".$row["oid"]."</a>";
		if($row["new"]=="Y"){
			echo "&nbsp;new";
		}
	}
}
?>
<br><br>
* I'm followed by...<br>
<?php
$sql="SELECT * FROM `follow` WHERE `oid`='".$sessionid."'";
$result=mysqli_query($mysqli,$sql);
$count=mysqli_num_rows($result);
if($count==0){
	echo "nobody";
}
else{
	while($row=mysqli_fetch_array($result)){
		echo "-<a href=\"memInfo.php?info=".$row["sid"]."\">".$row["sid"]."</a>";
	}
}
?>
<br><br>

</body>
</html>



