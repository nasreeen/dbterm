<?php
echo 'hello';

$servername= getenv('IP');
$username=getenv('C9_USER');
$password="";
$database="c9";
$dbport=3306;


//create connection
$db=new mysqli($servername, $username, $password, $database, $dbport);

//check connection
if($db->connect_error){
    die("Connecton failed: " . $db->connect_error);
    
}
echo "Connected successfully(".$db->host_info.")";

$sql="INSERT INTO dep (dept_no, dept_name)
VALUES (1,'database1')";

if($db->query($sql)===TRUE){
    echo "New Record created successfully";
}
else{
    echo "Error ".$sql."<br>".$db->erroe;
}
$db->close();
?>