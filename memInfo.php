<?php require("session.php"); ?>
<style>
td, table{
border: 1px solid black;
}
</style>
<?php
require("db_conn.php");
$info=$_GET["info"];
echo "<style type=\"text/css\"> p{ border: 1px solid black; width: 400px}</style>";?>
<?php
echo "<a href=\"home.php\">Home</a> &nbsp; &nbsp <a href=\"main.php\">Main List</a>  &nbsp; &nbsp  
<a href=\"myPage.php\">My Page</a>(".$_SESSION["id"].")  &nbsp; &nbsp; 
<a href=\"message.php\">Message</a><br>";
?>

<p>
ID: <?php echo $info; ?><br><br>
* <a href="messageSend.php?to=<?php echo $info; ?>">Send Message to <?php echo $info; ?></a><br><br>
* <?php echo $info; ?>'s Product
<?php
$sql="SELECT * FROM `product` WHERE `seller`='".$info."'";
	$result=mysqli_query($mysqli, $sql);
	$count=mysqli_num_rows($result);
	if($count==0){
		echo "Nothing<br>";
	}
	else{
	echo "<table>";
	echo "<tr>
			<td>Product Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
			<td>Price &nbsp; &nbsp; &nbsp; &nbsp; </td>
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
				<td>".$row["Quantity"]."</td>
			</tr>";
	}
	echo "</table>";
	}
?><br>
* <?php echo $info; ?>'s Review<br>
<?php
$sql="SELECT * FROM `review` WHERE `writer`='".$info."'";
	$result=mysqli_query($mysqli, $sql);
	$count=mysqli_num_rows($result);
	if($count==0){
		echo "Nothing<br>";
	}
	else{
	echo "<table>";
	echo "<tr>
			<td>Product Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
			<td>content</td>
			<td>star</td>
		</tr>";
	while($row=mysqli_fetch_array($result))
	{
	$sql2="SELECT `name` FROM `product` WHERE `PN`=".$row["PN"];
	$result2=mysqli_query($mysqli,$sql2);
	$row2=mysqli_fetch_array($result2);
		echo "<tr>
				<td><a href=\"detail.php?PN=".$row["PN"]."\">".$row2["name"]."</a></td>
				<td>".$row["content"]."</td>
				<td>";
				for($i=0; $i<$row["star"]; $i++){
                    echo "&#9733";
                }
				echo "</td>
			</tr>";
	}
	echo "</table>";
	}
?><br>


<?php
$sql="SELECT * FROM `follow` WHERE sid='".$_SESSION["id"]."' AND oid='".$info."'";

$result=mysqli_query($mysqli,$sql);
$count=mysqli_num_rows($result);
if($count==0){
    echo "<form action=\"follow.php\" method=\"POST\">
            <input type=\"submit\", value=\"FOLLOW ".$info."\">
            <input type=\"hidden\", name=\"type\", value=\"follow\">
            <input type=\"hidden\", name=\"sid\", value=\"".$_SESSION["id"]."\">
            <input type=\"hidden\", name=\"oid\", value=\"".$info."\">
            </form>";
}
else{
     $sql="UPDATE `follow` SET `new`='N' WHERE `sid`='".$_SESSION["id"]."' AND `oid`='".$info."'";
     mysqli_query($mysqli, $sql);

    echo "<form action=\"follow.php\" method=\"POST\">
            <input type=\"submit\", value=\"UNFOLLOW ".$info."\">
            <input type=\"hidden\", name=\"type\", value=\"unfollow\">
            <input type=\"hidden\", name=\"sid\", value=\"".$_SESSION["id"]."\">
            <input type=\"hidden\", name=\"oid\", value=\"".$info."\">
            </form>";
}
?>
* <?php echo $info; ?> is following... <br>
<?php
$sql="SELECT * FROM `follow` WHERE `sid`='".$info."'";
$result=mysqli_query($mysqli,$sql);
while($row=mysqli_fetch_array($result)){
    if($row["oid"]!=$_SESSION[id])
    {
        echo "-<a href=\"memInfo.php?info=".$row["oid"]."\">".$row["oid"]."</a><br>";
    }
    else{
        echo "-".$row["oid"]."<br>";
    }
}
?><br>
* <?php echo $info; ?> is followed by... <br>
<?php
$sql="SELECT * FROM `follow` WHERE `oid`='".$info."'";
$result=mysqli_query($mysqli,$sql);
while($row=mysqli_fetch_array($result)){
    if($row["sid"]!=$_SESSION["id"]){
      echo "-<a href=\"memInfo.php?info=".$row["sid"]."\">".$row["sid"]."</a><br>";
        
    }
    else{
    echo "-".$row["sid"]."<br>";
        
    }
}
?><br>
</p>