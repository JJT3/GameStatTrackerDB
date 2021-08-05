<?php
//Initialize.
session_start();
include("connect_db.php");
include("config.php");
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if($users = $con -> query("SELECT * FROM `users`"))
    {
        $username_taken = false;
        while($user = mysqli_fetch_assoc($users))
        {
            //If this username is available...
            if($user['username'] === $_POST['username'])
            {
                $username_taken = true;
                //echo("Username is taken.");
                $_SESSION["authenticated"] = false;
                $_SESSION["username"] = NULL;
                $_SESSION["password"] = NULL;
                break;
            }
        }

        //After the loop, check if we're able to create the account.
        if($username_taken === false)
        {
            // Create new user account.
            $pass = crypt($_POST["password"],'$1$somethin$');
            $new_user = create_new_user($con, $_POST["username"], $pass);

            //Check if the account was created successfully.
            if ($new_user != NULL) 
            {
                //Log into account.
                $_SESSION["authenticated"] = true;
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["password"] = $_POST["password"];
                echo("SUCCESS");
            } 
            else 
            {
                echo "Error inserting data" . $con->error;
            }
        }
    }
    //PICK BACK UP HERE
    //ADD CONDITION FOR REDIRECTING USER BASED UPON RESULTS OF ACCOUNT CREATION
    //ALSO ADD MORE CHECKS FOR USERNAME AND PASSWORD LENGTH
    header("Location: index.php");
}
else
{

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
                            <h5 class="card-title">Create an account</h5>
                        </div>
                        <div class="card-body">
                            <form class="form-group" method="POST" action="/GameStatTrackerDB/register.php">
                                <ul class="">
                                        <label for="username"><strong>Username</strong></label><br>
                                        <input class="form-control" type="text" id="username" name="username"><br>
                                        <label for="password"><strong>Password</strong></label><br>
                                        <input class="form-control" type="password" id="password" name="password"><br>
                                </ul>
                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-lg btn-primary" value = "Create account">
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