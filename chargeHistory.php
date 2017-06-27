<?php
    require("session.php");
?>
<style>
td, table{
border: 1px solid black;
}
</style>
<?php
    require("db_conn.php");
    $sql="SELECT * FROM `money` WHERE `id`='".$_SESSION["id"]."'";
    $result=mysqli_query($mysqli,$sql);
    $count=mysqli_num_rows($result);
    if($count==0){
        echo "<script>alert(\"No History\");</script>";
        echo "<script>javascript:history.go(-1);</script>";
    }
    else{
	echo "<table>";
	echo "<tr>
			<td>Date</td>	
			<td>Amount</td>
		</tr>";
	while($row=mysqli_fetch_array($result))
	{
		echo "<tr>
				<td>".$row["date"]."</td>	
				<td>".$row["amount"]."</td>
			</tr>";
	}
	echo "</table>";
    }
?>