<?php

// <!-- Takes in details from add module form, instantiates and calls methods, then stores in db. -->
include('db_login.php');

$connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//TODO: Change this to actual student number from session ID when ready Maybe needs to be before db connection
$studentNumber = '45345ff';

$ModuleId = $_POST['moduleId'];
$markachieved = $_POST['markAchieved'];

//instantiate a module using these two parameters

$module = new module($ModuleId, $markachieved, $studentNumber);

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

$create_table_query_string = 'CREATE TABLE `modules` (
    `studentNumber` VARCHAR(255),
    `moduleId` VARCHAR(255),
    `markAchieved` INT,
    `credits` INT,
    `moduleName` VARCHAR(255),
    `pass` INT
    )';
$query = mysqli_query($connection, $create_table_query_string);


//check for error
if ($query) {
    echo "Create Table Query Succeeded<br>";
} else {
    echo "Create Table Query Failed<br>";
}


$insert_rows_query_string = "insert into modules (studentNumber, moduleId, markAchieved, credits, moduleName, pass)
values ('$studentNumber', '$ModuleId', '$markachieved', '$credits', '$moduleName', '$pass')";

$query = mysqli_query($connection, $insert_rows_query_string);


//Add rows

mysqli_close($connection);








?>