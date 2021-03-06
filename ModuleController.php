<?php


session_start();
if (!$_SESSION['loggedin']) {
    header("location: login.php");
}
if (time() - $_SESSION["login_time"] > 1800) {
    session_unset();
    session_destroy();
    header("location:login.php");
}

include('db_login.php');
include('Module.php');


//TODO: Change this to actual student number from session ID when ready Maybe needs to be before db connection
$studentNumber = $_SESSION["username"];
$ModuleId = $_POST['moduleId'];
$markachieved = $_POST['markAchieved'];

//instantiate a module using these parameters
$module = new Module($ModuleId, $markachieved, $studentNumber);
//Call the logic in the model to set these fields
$module->setPass($markachieved);
$module->setGrade($markachieved);
$module->setCredits($ModuleId);
$module->setModuleName($ModuleId);

//Now we should have an object with all the relevant information
//Retrieve variables with getters

$grade = $module->getGrade();
$credits = $module->getCredits();
$moduleName = $module->getModuleName();
$pass = $module->getPass();

//Now we should have all the required info stored as variables, so we can push it to database

//If table doesn't exist, create table


$connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$create_table_query_string = 'CREATE TABLE `modules` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `studentNumber` VARCHAR(255),
    `moduleId` VARCHAR(255) UNIQUE,
    `markAchieved` INT,
    `credits` INT,
    `moduleName` VARCHAR(255),
    `pass` INT NOT NULL,
    `grade` VARCHAR(4),
    `createdDate` DATETIME DEFAULT CURRENT_TIMESTAMP
    )';
$query = mysqli_query($connection, $create_table_query_string);


//Check if there is a record for x student id and x module
//If 1 record then delete that row
//then overwrite that row

$check_if_in_db_query_string = "SELECT COUNT(moduleId) FROM `modules` WHERE studentNumber = '$studentNumber' AND moduleId = '$ModuleId';";
$query = mysqli_query($connection, $check_if_in_db_query_string);
$row = mysqli_fetch_array($query);
$moduleCount = $row['COUNT(moduleId)'];

if ($moduleCount == 0) {
    $insert_rows_query_string = "insert into modules (studentNumber, moduleId, markAchieved, credits, moduleName, pass, grade)
    values ('$studentNumber', '$ModuleId', '$markachieved', '$credits', '$moduleName', '$pass', '$grade')";
    $query = mysqli_query($connection, $insert_rows_query_string);
} else {
    //Delete all rows and then replace

    $delete_module_query = "DELETE FROM `modules` WHERE studentNumber = '$studentNumber' AND moduleId = '$ModuleId';";
    $query = mysqli_query($connection, $delete_module_query);


    $insert_rows_query_string = "insert into modules (studentNumber, moduleId, markAchieved, credits, moduleName, pass, grade)
    values ('$studentNumber', '$ModuleId', '$markachieved', '$credits', '$moduleName', '$pass', '$grade')";
    $query = mysqli_query($connection, $insert_rows_query_string);
}






mysqli_close($connection);


header("location: addmodule.php")


?>