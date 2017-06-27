<?php require("session.php"); ?>
<?php require("db_conn.php"); ?>

<?php
echo "<style type=\"text/css\"> p{ border: 1px solid black; width: 400px}</style>";
$MSN=$_GET["MSN"];
$sql="SELECT * FROM `message` WHERE `MSN`=".$MSN;
$result=mysqli_query($mysqli,$sql);
$row=mysqli_fetch_array($result);
if($row["to"]==$_SESSION["id"]){
    $sql2="UPDATE `message` SET `read`='Y' WHERE `MSN`=".$MSN;
    mysqli_query($mysqli,$sql2);
    
    echo "  <p>From: ".$row["from"]." &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Date: ".$row["date"]."<br>
            Title: ".$row["title"]."<br>
            Content: ".$row["content"]."<br>
            <form action=\"messageSend.php?to=".$row["from"]."\" method=\"POST\">
                <input type=\"submit\", value=\"reply\">
            </form>
            </p>";
}
else if($row["from"]==$_SESSION["id"]){
        echo "  <p>To: ".$row["to"]." &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Date: ".$row["date"]."<br>
            Title: ".$row["title"]."<br>
            Content: ".$row["content"]."<br><br></p>";
}
else{
    echo "Wrong access";
}

?>