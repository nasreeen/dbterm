<?php require("session.php"); ?>
<?php require("db_conn.php"); 

if(!isset($_SESSION["admin"])){
    echo "<script>alert(\"Wrong Access.\");</script>";
	echo "<script>javascript:history.go(-1);</script>";
	exit();
}
echo "<a href=\"home.php\">Home</a> &nbsp; &nbsp <a href=\"main.php\">Main List</a>  &nbsp; &nbsp  
<a href=\"myPage.php\">My Page</a>(".$_SESSION["id"].")  &nbsp; &nbsp; 
<a href=\"message.php\">Message</a>";
        if(isset($_SESSION["admin"])){
            echo " &nbsp; &nbsp &nbsp; &nbsp <a href=\"adminPage.php\">AdminPage</a>";
        }
?>

<br>
<br>
<a href="memList.php">Members</a> <br>
Category Stat <br>



