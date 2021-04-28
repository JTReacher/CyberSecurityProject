<?php

//TODO: Need some logic to check if user is alread in a session or not

include('db_login.php');
$connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);


//Need logic to redirect to login page if the password or username are wrong
//Check if user is loggedin, if yes redirect
//Add validation to ensure those fields are filled (just do this with html5 in the form)

//Fetch the corresponding user by username
//This gives me that users info as an array
//Prepare the SQL stmt to prevent SQL injection attacks

//What do I actually need?

//1. Fetch the right user/row based on username
//2. Save password and username from that row to variables
//3. Compare them to inputted data using password verify
//4. Start session with them logged-in if it works 


$username = $_POST['username'];
$password = $_POST['password'];


//This is working but is vulenrable to sqlinjection
$query = "SELECT id, username, passwordHash FROM users WHERE username = '$username'";
 




$result = mysqli_query($connection, $query);

//That works, so now you need to fetch and store the column data
$row = mysqli_fetch_array($result);
$passwordHash = $row['passwordHash'];
$id = $row['id'];
mysqli_close($connection);


if (password_verify($password, $passwordHash)) {
    session_start();

    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $id;
    $_SESSION["username"] = $username;

    header("location: addmodule.html");


} else{
    header("location: login.php");
}








