<?php
//Initialize.
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$_SESSION["username"] = $_POST['username'];
	$_SESSION["pass"] = $_POST['password'];
	$pass=crypt($_SESSION["pass"],'$1$somethin$');
	header("Location: index.php");
}
else
{
    session_unset(); 
    session_destroy(); 
?>
<html>
    <!-- Head -->
    <head>
        <title>GST</title>
        <?php include("bootstrap.html"); ?>
    </head>
    <!-- Navbar -->
    <?php include("nav.html");?>
    
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center">
                            <h5 class="card-title">Login to your account.</h5>
                        </div>
                        <div class="card-body">
                            Username<br>
                            <
                            Password<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include("scripts.html"); ?>
    </body>
</html>

<?php 
}
?>