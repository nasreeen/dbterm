<?php
require("session.php");
?>
<?php

    if(isset($_SESSION["id"])){
        echo "<a href=\"home.php\">Home</a> &nbsp; &nbsp <a href=\"main.php\">Main List</a>  &nbsp; &nbsp  
<a href=\"myPage.php\">My Page</a>(".$_SESSION["id"].")  &nbsp; &nbsp; 
<a href=\"message.php\">Message</a>";
        if(isset($_SESSION["admin"])){
            echo " &nbsp; &nbsp &nbsp; &nbsp <a href=\"adminPage.php\">AdminPage</a>";
        }
        echo "<br><br>";

        echo "ID: ";
        echo $_SESSION["id"];
        if(isset($_SESSION["admin"])){
            echo " (admin)";
        }
        echo "<br><a href=\"memUpdate.php?id=".$_SESSION["id"]."\">Info Edit</a>";
        echo "<br><a href=\"logout.php\">Logout</a>";
        echo "<br><a href=\"memDelete.php?id=".$_SESSION["id"]."\">Delete Account</a>";
   }
    else {
        echo "<a href=\"home.php\">Home</a> &nbsp; &nbsp <a href=\"main.php\">Main List</a>  &nbsp; &nbsp  
<a href=\"myPage.php\">My Page</a> &nbsp; &nbsp; 
<a href=\"message.php\">Message</a><br><br>";

        echo "Welcome";
        echo "<br><a href=\"login.php\">Login</a>";
        echo "<br><a href=\"memInsert.php\">Sign Up</a>";
    }
?>

<br>
<br>

