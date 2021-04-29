<?php

session_start();
if (!$_SESSION['loggedin']) {
    header("location: login.php");
}

include('db_login.php');
$connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);


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

    header("location: addmodule.php");


} else{
    header("location: login.php");
}







