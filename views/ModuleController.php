<?php

// <!-- Takes in details from add module form, instantiates and calls methods, then stores in db. -->

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
    `moduleId` VARCHAR(255),
    `markAchieved` INT,
    `credits` INT,
    `moduleName` VARCHAR(255),
    `pass` INT NOT NULL,
    `createdDate` DATETIME DEFAULT CURRENT_TIMESTAMP
    )';
$query = mysqli_query($connection, $create_table_query_string);


//TODO: Add some error checking
/* if ($query) {
    echo "Create Table Query Succeeded<br>";
} else {
    echo "Create Table Query Failed<br>";
} */


$insert_rows_query_string = "insert into modules (studentNumber, moduleId, markAchieved, credits, moduleName, pass)
values ('$studentNumber', '$ModuleId', '$markachieved', '$credits', '$moduleName', '$pass')";

$query = mysqli_query($connection, $insert_rows_query_string);


mysqli_close($connection);


header("location: addmodule.php")


?>