<?php require("db_conn.php") ?>

<?php
	$sid=$_POST["sid"];
	$oid=$_POST["oid"];
	$type=$_POST["type"];
	
	if($type=="follow"){
	    $sql="INSERT INTO `follow` (`sid`,`oid`,`new`) VALUES ('".$sid."','".$oid."','N')";
	    mysqli_query($mysqli, $sql);
	    echo "<script>alert(\"Follow success\"); history.go(-1);</script>";
	}
	else if($type="unfollow"){
	    $sql="DELETE FROM `follow` WHERE `sid`='".$sid."' AND `oid`='".$oid."'";
	    mysqli_query($mysqli, $sql);
	    echo "<script>alert(\"Unfollow success\"); history.go(-1);</script>";
	}
	
	
?>
