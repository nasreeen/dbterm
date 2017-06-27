<?php require("session.php"); ?>
<style>
td, table{
border: 1px solid gray;
}
</style>

<?php
echo "<style type=\"text/css\"> p{ border: 1px solid black; width: 400px}</style>";
require("db_conn.php");
echo "<a href=\"home.php\">Home</a> &nbsp; &nbsp <a href=\"main.php\">Main List</a>  &nbsp; &nbsp  
<a href=\"myPage.php\">My Page</a>(".$_SESSION["id"].")  &nbsp; &nbsp; 
<a href=\"message.php\">Message</a>";
        if(isset($_SESSION["admin"])){
            echo " &nbsp; &nbsp &nbsp; &nbsp <a href=\"adminPage.php\">AdminPage</a>";
        }
        echo "<br>";
$name=$_GET["PN"];
	$sql="SELECT * FROM `product` WHERE `PN`='".$name."'";
	$result=mysqli_query($mysqli, $sql);
	$row=mysqli_fetch_array($result);
	echo "<p>";
	if($row["del"]=='Y'){
		echo "------DELETED PRODUCT------<br>";
	}
	echo "Product Name: ".$row[name]."&nbsp; &nbsp; &nbsp; Quantity: ".$row[Quantity];
	echo "<br>";
	echo "Price: ".$row[price]."&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	Seller: ";
	if($row[seller]==$_SESSION["id"]){
		echo $row[seller];
		echo "<br><br>";
		echo $row[Detail];
		echo "<br>";
		if($row["del"]=='N'){
		echo "<br><a href=\"uploadUpdate.php?PN=".$row[PN]."\">Edit Detail</a><br><a href=\"uploadDelete.php?PN=".$row[PN]."\">Delete</a>";
		}
		echo "<br><br>";
	}
	else{
		echo "<a href=\"memInfo.php?info=".$row[seller]."\">".$row[seller]."</a>";
		echo "<br><br>";
		echo $row[Detail];
		echo "<br><br>";
		if($row["del"]=='N'){
		echo "<a href=\"buy.php?PN=".$row[PN]."\">Buy this product</a><br>";
		echo "<a href=\"addToCart.php?PN=".$row[PN]."\">Add to Cart</a>";
		}
		echo "<br><br>";
	}
?>
</p>
<br>
----------QnA------------
<br>
<a href="qnaQ.php?PN=<?php echo $row["PN"]; ?>">Write</a>
<br>
<?php

	$sql2="SELECT * FROM `qna_q` WHERE `PN`=".$row[PN];

	$result2=mysqli_query($mysqli, $sql2);
	echo "<table>";
	echo "<tr>
			<td>Writer</td>	
			<td>Title</td>
			<td>Date</td>
			<td>Del</td>
			<td>Reply</td>";
	if(isset($_SESSION["admin"])){
	echo		"<td>del(admin)</td>";
	}
	echo	"</tr>";
	while($row2=mysqli_fetch_array($result2))
	{
		echo "<tr>
				<td>".$row2["writer"]."</td>	
				<td>";
		echo"<a href=\"qnaQRead.php?QN=".$row2["QN"]."\">".$row2["title"]."</a></td>";
		echo "
		<td>".$row2["date"]."</td>
		<td>"; 
		
		if($row2["ans"]=="N" && $row2["writer"]==$_SESSION["id"]){
			echo "<a href=\"qnaQDel.php?QN=".$row2["QN"]."\">Delete</a>";
		}
		else {
			echo ".";
		}
		echo "</td><td>";
		
		if($row["seller"]==$_SESSION["id"]){
			if($row2["ans"]=="N")
			{
			echo  "<a href=\"qnaAnswer.php?QN=".$row2["QN"]."&PN=".$row2["PN"]."\">Reply</a>";
			}
			else{
				echo "<a href=\"qnaARead.php?QN=".$row2["QN"]."\">View answer</a>";
			}
		}
		else if($row2["ans"]=="N"){
			echo "No answer";
		}
		else{
				echo "<a href=\"qnaARead.php?QN=".$row2["QN"]."\">View answer</a>";
		}
		echo "</td>";
		
		if(isset($_SESSION["admin"])){
			echo "<td><a href=\"qnaQDel.php?QN=".$row2["QN"]."\">Delete</a></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
?>
<br><br>
<br>
---------Reviews---------
<?php

	$sql2="SELECT * FROM `review` WHERE `PN`=".$row[PN];

	$result2=mysqli_query($mysqli, $sql2);
	echo "<table>";
	echo "<tr>
			<td>Writer</td>	
			<td>Star</td>
			<td>Content</td>
			<td>etc.</td>";
	if(isset($_SESSION["admin"])){
	echo		"<td>del(admin)</td>";
	}
	echo	"</tr>";
	while($row2=mysqli_fetch_array($result2))
	{
		echo "<tr>
				<td>".$row2["writer"]."</td>	
				<td>";
				for($i=0; $i<$row2["star"]; $i=$i+1){
					echo "&#9733";
				}
				
		echo"</td>
			<td>".$row2["content"]."</td>";
		echo "<td>"; 
		
		if($row2["writer"]==$_SESSION["id"]){
			echo "<a href=\"reviewEdit.php?PN=".$row2["PN"]."&TN=".$row2["TN"]."\">Edit/Del</a>";
		}
		else if($row["seller"]==$_SESSION["id"]){
			echo "Reply";
		}
		else{
			echo ".";
		}
		
		echo "</td>";
		if(isset($_SESSION["admin"])){
			echo "<td><a href=\"reviewDelA.php?RN=".$row2["RN"]."\">Delete</a></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
?>
<br><br>