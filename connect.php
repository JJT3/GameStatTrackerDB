<?php

$user = 'root';
$pass = '';
$db = 'gamestattracker';

$con = new mysqli('localhost', $user, $pass, $db) or die("Connection failed!");
if ($con->connect_error) 
{
    die("Connection failed: " . $con->connect_error);
} 
echo("Connected successfully. <br />");

$usernames = "SELECT `username` FROM `users`";
$all_usernames = mysqli_query($con, $usernames);
while($name = mysqli_fetch_array($all_usernames)){
    $username = $name['username'];
    echo("<h3> Username: $username<br /> </h3>");
}

$con ->close();
echo("Connection closed.");
?>