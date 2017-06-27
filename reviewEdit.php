<?php require("session.php"); ?>
<?php
require("db_conn.php");
$PN=$_GET["PN"];
$TN=$_GET["TN"];
$sql="SELECT * FROM `transaction` WHERE `TN`=".$TN;
$result=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($result);
if($row[buyer]!=$_SESSION["id"]){
	echo "Wrong Access";
	echo "<script>location.href='myPage.php'</script>";
}

$sql2="SELECT * FROM `product` WHERE `PN`=".$PN;
$result2=mysqli_query($mysqli,$sql2);
$row2=mysqli_fetch_array($result2);
?>

    <form action="reviewEdit2.php" method="POST">
    	<input type="hidden", name="PN", value="<?php echo $PN; ?>">
    	<input type="hidden", name="TN", value="<?php echo $TN; ?>">
    	<input type="hidden", name="writer", value="<?php echo $_SESSION["id"]; ?>">
        Product Name: <?php echo $row2[name]; ?><br>
        Star: <select name="star">
			<?php 
			for($i=1; $i<6; $i=$i+1)
			{
				echo "<option value=\"".$i."\">".$i."</option>";
			}
			?>
            </select><br>
		Content: <textarea name="content"></textarea><br>
		<input type = "submit", value=Edit>
    </form>
    <form action="reviewDel.php" method="POST">
        <input type="hidden", name="TN", value="<?php echo $TN; ?>">
		<input type = "submit", value=Delete>
    </form>
    <br>
    
<a href="javascript:history.go(-1)">Go back</a>
    