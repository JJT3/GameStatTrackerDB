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

function get_db_connection($db ="")
{
	
	
	// Create connection. Either include globally and use $GLOBALS['variable_name'], or include locally
	$con = @new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $db);

	// Check connection
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	
	return $con;
	
}
function create_new_user($con, $new_username, $new_password)
{
    $result = NULL;
    // prepare and bind
    $stmt = $con->prepare("INSERT INTO `users` (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    // set parameters and execute
    $username = $new_username;
    $password = $new_password;
    $stmt->execute();

    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //mysqli_free_result($result);
    echo "New records created successfully";
    echo $result["username"];
    $stmt->close();
    //$con->close();
    return $result;
}
?>

