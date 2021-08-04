<?php
//Initialize.
session_start();
include("connect_db.php");

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$_SESSION["username"] = $_POST["username"];
	$_SESSION["password"] = $_POST["password"];

	$pass=crypt($_SESSION["password"],'$1$somethin$');
    if($users = $con -> query("SELECT * FROM `users`"))
    {
        while($user = mysqli_fetch_assoc($users))
        {
            if($user['username'] === $_SESSION['username'] && $user['password'] === $_SESSION['password'])
            {
                //echo("Logged in successfully.");
                $_SESSION["authenticated"] = true;
            }
            else
            {
                //echo("Incorrect credentials.");
                $_SESSION["authenticated"] = false;
            }
        }
    }
    header("Location: index.php");
}
else
{
    //session_unset(); 
    //session_destroy();
?>
<html>

    <!-- Head -->
    <head>
        <title>GST</title>
        <?php include("html/bootstrap.html"); ?>
    </head>
    <!-- Navbar -->
    <?php include("nav.php");?>
    
    <body>
        <div class="container">
            <br>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5 class="card-title">Login to your account</h5>
                        </div>
                        <div class="card-body">
                            <form class="form-group" method="POST" action="/GameStatTrackerDB/login.php">
                                <ul class="">
                                        <label for="username"><strong>Username</strong></label><br>
                                        <input class="form-control" type="text" id="username" name="username"><br>
                                        <label for="password"><strong>Password</strong></label><br>
                                        <input class="form-control" type="password" id="password" name="password"><br>
                                </ul>
                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-lg btn-primary" value = "Log in">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("html/scripts.html"); ?>
    </body>
</html>

<?php 
}

?>