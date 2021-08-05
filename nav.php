<?php 
//This is here because of a weird issue where the session variables were not ready for the navbar.
//By re-initializing these session variables, the navbar works properly...(?)
$_SESSION["authenticated"] = $_SESSION["authenticated"];
$_SESSION["username"] = $_SESSION["username"];
$_SESSION["password"] = $_SESSION["password"];
?>

<html>
    <head>
        <?php include("html/bootstrap.html"); ?>
    </head>
    <nav class="navbar navbar-expand-sm bg-light mr-auto">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"> <h1 class="header">GameStatTrackerDB</h1> </a>
        </div>
        <ul class="navbar-nav">
            <?php
            //Here, we want to only display buttons applicable to certain users, whether they are logged in/out.
            if($_SERVER['REQUEST_METHOD'] === "GET") //Upon the loading of this page, check for authentication.
            {
                if(isset($_SESSION['authenticated']))
                {
                    //If the user is not logged in.
                    if($_SESSION['authenticated'] === false)
                    {
            ?>
            <!--Register and Login buttons for users who aren't logged in. -->
            <li class="nav-item"><a class="nav nav-link" href="register.php">Register</a></li>
            <li class="nav-item"><a class="nav nav-link" href="login.php">Login</a></li>
            <?php
                //This is pretty cool being able to alternate between PHP and HTML like this
                //It's still a pretty annoying language though
                    }
                    //If the user is logged in.
                    else
                    {
            ?>
            <?php
                    }
                }
                //If those session variables still are not initialized, let's just re-initialize them as defaults here.
                //A better way to handle this is welcome.
                else
                {
                    echo "VARIABLE NOT SET";
                    $_SESSION["authenticated"] = false;
                    $_SESSION["username"] = NULL;
                    $_SESSION["password"] = NULL;
                }
            }
            ?>
        </ul>
    </nav>
</html>
