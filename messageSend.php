<?php require("session.php"); ?>
---Send Message---
<br>
To: <?php $to=$_GET["to"]; echo $to; ?><br>
From: <?php echo $_SESSION["id"]; ?><br>
<form action="messageSend2.php" method="POST">
    Title: <input type="text", name="title"><br>
    Content: <textarea name="content"></textarea><br>
    <input type="hidden", name="from", value="<?php echo $_SESSION["id"]; ?>">
    <input type="hidden", name="to", value="<?php echo $to; ?>">
	<input type="hidden", name="date", value=<?php echo date("Y-m-d")."$nbsp;".date("H:i:s"); ?> >
    <input type="submit", value="send">
</form>
