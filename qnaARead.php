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
?><br>
---QUESTION---
<br>
Title: <?php echo $row[title]; ?><br>
Writer: <?php echo $row[writer]; ?>
<br>
<p>
    <br>
    <?php echo $row[content]; ?> 
    <br><br>
</p>
<br>
<?php
	$sql="SELECT * FROM `qna_a` WHERE `QN`=".$QN;
	$result=mysqli_query($mysqli, $sql);
	$row=mysqli_fetch_array($result);
?>
-----ANSWER-----<br>
Title: <?php echo $row[title]; ?><br>
<p>
    <br>
    <?php echo $row[content]; ?> 
    <br><br>
    <?php
    $sql2="SELECT * FROM `product` WHERE `PN`=".$row["PN"];
    $result2=mysqli_query($mysqli,$sql2);
    $row2=mysqli_fetch_array($result2);
    if($row2["seller"]==$_SESSION["id"]){
        echo "<form action=\"qnaADel.php\" method=\"POST\">
            <input type=\"hidden\", name=\"AN\", value=".$row["AN"].">
            <input type=\"submit\", value=\"DELETE\">
            ";
    }
    ?>
</p>