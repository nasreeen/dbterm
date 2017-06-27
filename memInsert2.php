<?php require("db_conn.php") ?>

<?php
	$id=$_POST["id"];
	$pw=$_POST["pw"];
	$nick=$_POST["nick"];
	$email=$_POST["email"];
	$phone=$_POST["phone"];
	$sex=$_POST["sex"];
	$age=$_POST["age"];
	
	if($id==NULL || $pw==NULL || $nick==NULL || $email==NULL || $phone==NULL || $sex==NULL || $age==NULL ){
		echo "<script>alert(\"Write all the information!!!!\"); history.go(-1);</script>";
	}
else{
	$sql2="SELECT * FROM `member_syl` WHERE `id`='".$id."'";
	$result2=mysqli_query($mysqli, $sql2);
	$row2=mysqli_fetch_array($result2);
	$count=mysqli_num_rows($result2);
	if($count!=0){
		echo "<script>alert(\"ID already exists!!!!\"); history.go(-1);</script>";
	}
	else{
		
	$sql="INSERT INTO `member_syl` (`id`,`pw`,`nick`,`email`,`phone`,`sex`,`age`) VALUES ('".$id."','".$pw."','".$nick."','".$email."','".$phone."','".$sex."',".$age.")";

	$result=mysqli_query($mysqli, $sql);
	
	echo "<script>alert(\"Success!!!!\");</script>";
	echo "<script>location.href='home.php'</script>";
	}
	
}
?>
