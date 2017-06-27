<?php require("session.php"); ?>
<style>
td, table{
border: 1px solid gray;
}
</style>

<?php
echo "<style type=\"text/css\"> p{ border: 1px solid black; width: 400px}</style>";
require("db_conn.php");
echo "<a href=\"home.php\">Home</a> &nbsp; &nbsp <a href=\"main.php\">Main List</a>  &nbsp; &nbsp  
<a href=\"myPage.php\">My Page</a>(".$_SESSION["id"].")  &nbsp; &nbsp; 
<a href=\"message.php\">Message</a>";
        if(isset($_SESSION["admin"])){
            echo " &nbsp; &nbsp &nbsp; &nbsp <a href=\"adminPage.php\">AdminPage</a>";
        }
        echo "<br>";
$QN=$_GET["QN"];
	$sql="SELECT * FROM `qna_q` WHERE `QN`=".$QN;
	$result=mysqli_query($mysqli, $sql);
	$row=mysqli_fetch_array($result);
?>
<br>
Title: <?php echo $row[title]; ?><br>
Writer: <?php echo $row[writer]; ?>
<br>
<p>
    <br>
    <?php echo $row[content]; ?> 
    <br><br>
</p>
