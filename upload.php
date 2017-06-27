<?php require("session.php"); ?>
<?php require("db_conn.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>php</title>
</head>
<body>
	
	
	<form action="upload2.php" method="POST">
	    Product Name:<input type="text", name="name"><br>
	    Price:<input type="int", name="price"><br>
	    Category:<input type="radio", name="category" id="category_dress" value="Dress"><label for="category_dress">Dress</label>
	    <input type="radio", name="category" id="category_top" value="Top"><label for="category_top">Top</label>
	    <input type="radio", name="category" id="category_outer" value="Outer"><label for="category_outer">Outer</label>
	    <input type="radio", name="category" id="category_knit" value="Knit"><label for="category_knit">Knit</label>
	    <input type="radio", name="category" id="category_skirt" value="Skirt"><label for="category_skirt">Skirt</label>
	    <input type="radio", name="category" id="category_pants" value="Pants"><label for="category_pants">Pants</label><br>
		Quantity:
		<select name="Quantity">
			<?php
				for($i=1; $i<=100; $i=$i+1){
					echo "<option value=\"".$i."\">".$i."</option>";
			}
			?>
		</select><br/>
		Detail: <textarea name="Detail"></textarea><br>
		<input type = "submit">
	</form>
<br>
<a href="javascript:history.go(-1)">Go back</a>
</body>
</html>
