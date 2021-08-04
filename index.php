<?php 
$_SESSION["authenticated"] = false;
$_SESSION["username"] = NULL;
$_SESSION["password"] = NULL;
session_start();

//session_unset();
//session_destroy();
?>
<html>
    <head>
        <title>GST</title>
        <?php include("html/bootstrap.html"); ?>
    </head>

    <!-- Navbar -->
    <?php include("nav.php"); ?>
    
    <body>
        <?php include("connect_db.php");?>
        <?php include("html/scripts.html"); ?>
    </body>
</html>