<?php require("db_conn.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>php</title>
</head>
<body>
	
	
	<form action="memInsert2.php" method="POST">
		ID:<input type = "text", name="id"> <br/>
		PW:<input type = "password", name="pw"><br/>
		Name:<input type = "text", name="nick"><br/>
		Email:<input type = "email", name="email"><br/>
		Phone:<input type = "tel", name="phone"><br/>
		Sex:<input type = "radio", name="sex" id="sex_M" value="M"><label for="sex_M">M</label>
			<input type = "radio", name="sex" id="sex_F" value="F"><label for="sex_F">F</label><br/>
		Age:
		<select name="age">
			<?php
				for($i=90; $i>=10; $i=$i-1){
					echo "<option value=\"".$i."\">".$i."</option>";
			}
			?>
		</select><br/>
		
		<input type = "submit">

	</form>

</body>
</html>
