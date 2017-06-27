<?php require("session.php"); ?>
<?php require("db_conn.php"); ?>
<style>
td, table{
border: 1px solid black;
}
</style>

<?php
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
        echo "<br>";
echo "<br>-------Recieved Message--------";
$sql="SELECT * FROM `message` WHERE `to`='".$_SESSION["id"]."'";

	$result=mysqli_query($mysqli, $sql);
	$count=mysqli_num_rows($result);
	if($count==0){
	    echo "<br>No message<br><br>";
	}
	else {
    	echo "<table>";
    	echo "<tr>
    			<td>FROM</td>	
    			<td>TITLE</td>
    			<td>DATE</td>
    			<td>READ</td>
    		</tr>";
    	while($row=mysqli_fetch_array($result))
    	{
    		echo "<tr>
    				<td>".$row["from"]."</td>	
    				<td><a href=\"messageRead.php?MSN=".$row["MSN"]."\">".$row["title"]."</a></td>
    				<td>".$row["date"]."</td>
    				<td>".$row["read"]."</td>
    			</tr>";
    	}
    	echo "</table>";
	}
?>

---------Sent Message----------
<?php
$sql="SELECT * FROM `message` WHERE `from`='".$_SESSION["id"]."'";

	$result=mysqli_query($mysqli, $sql);
		$count=mysqli_num_rows($result);
	if($count==0){
	    echo "<br>No message<br><br>";
	}
    	else {
    	echo "<table>";
    	echo "<tr>
    			<td>To</td>	
    			<td>TITLE</td>
    			<td>DATE</td>
    			<td>READ</td>
    			<td>Cancel</td>
    		</tr>";
    	while($row=mysqli_fetch_array($result))
    	{
    		echo "<tr>
    				<td>".$row["to"]."</td>	
    				<td><a href=\"messageRead.php?MSN=".$row["MSN"]."\">".$row["title"]."</a></td>
    				<td>".$row["date"]."</td>
    				<td>".$row["read"]."</td>
    				<td>";
    		if($row["read"]=='Y'){
    		    echo ".";
    		}		
    		else{
    		    echo "<a href=\"messageCancel.php?MSN=".$row["MSN"]."\">Cancel</a>";
    		}
    		echo "</td>
    			</tr>";
    	}
    	echo "</table>";
	
	}
?>

<a href="main.php">Go to list</a>