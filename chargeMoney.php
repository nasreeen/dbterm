<?php require("session.php"); ?>
<?php
require("db_conn.php");
$sql="SELECT * FROM `member_syl` WHERE `id`='".$_SESSION["id"]."'";
$result=mysqli_query($mysqli, $sql);
$row=mysqli_fetch_array($result);
?>
<form action="chargeMoney2.php" method="POST">
    <input type="hidden", name="id", value="<?php echo $_SESSION["id"]; ?>">
    <input type="hidden", name="date", value=<?php echo date("Y-m-d")."$nbsp;".date("H:i:s"); ?> >
    How much? <input type="int", name="amount">
    <input type="submit", value="confirm">
</form>