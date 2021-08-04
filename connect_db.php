<?php

$user = 'root';
$pass = '';
$db = 'gamestattracker';

$con = new mysqli('localhost', $user, $pass, $db) or die("Connection failed!");
if ($con->connect_error) 
{
    die("Connection failed: " . $con->connect_error);
} 

//echo("Connected successfully. <br />");
//$con ->close();
//echo("Connection closed.");
?>