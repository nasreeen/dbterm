<style>
td, table{
border: 1px solid black;
}
</style>
<?php
require("db_conn.php");
$PN=$_GET["PN"];
$sql="SELECT * FROM `transaction` WHERE `PN`=".$PN;
$result=mysqli_query($mysqli, $sql);
echo "<table>";
	echo "<tr>
			<td>Date</td>
			<td>Buyer</td>	
			<td>Quantity</td>
			<td>Review</td>
		</tr>";
	while($row=mysqli_fetch_array($result)){
        $sql2="SELECT `star` FROM `transaction` natural join `review` WHERE `TN`=".$row["TN"];
        $result2=mysqli_query($mysqli,$sql2);
        $count=mysqli_num_rows($result2);
        echo "<tr>
                <td>".$row["date"]."</td>
                <td>".$row["buyer"]."</td>
                <td>".$row["quantity"]."</td>
                <td>";
            if($count==0){
                echo "No review";
            }
            else{
                $row2=mysqli_fetch_array($result2);
                for($i=0; $i<$row2["star"]; $i++){
                    echo "&#9733";
                }
            }
        echo   "</td>
             </tr>";
	}
	echo "</table>";
?>

