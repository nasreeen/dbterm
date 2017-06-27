<?php
require("session.php");
unset($_SESSION["id"]);
if(isset($_SESSION["admin"])){
    unset($_SESSION["admin"]);
}
echo "<script>location.href='home.php'</script>";
?>