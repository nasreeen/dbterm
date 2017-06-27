<?php
require("db_conn.php");

$PN=$_POST["PN"];
$sql="UPDATE `product` SET `del`='Y' WHERE `PN`=".$PN;
mysqli_query($mysqli, $sql);
echo "DELETE SUCCESS<br>";
echo "<a href=\"main.php\">Back to Main list</a>";
?>