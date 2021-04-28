
<?php

include('db_login.php');
session_start();

$studentNumber = $_SESSION["username"];



/*
    TODO: Implement


    1. How many A, B, C or F grades have been obtained by a student?
    -> SQL query returning this info as a  count for each type of grade
    */

//$_SESSION["username"];
//Sum credits column where pass is true and username is username

$connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);

//Fetch and set number credits earned
$creditsEarnedQuery = "SELECT SUM(credits) FROM `modules` WHERE studentNumber = '$studentNumber' AND pass = 1";
$query = mysqli_query($connection, $creditsEarnedQuery);
$row = mysqli_fetch_array($query);
$creditsEarned = $row['SUM(credits)'];

$qualificationAward = "";
//Set qualificationAward
if ($creditsEarned >= 120 && $creditsEarned < 180 ) {
    $qualificationAward = "PG Diploma in Computing";
} elseif($creditsEarned >= 180){
    $qualificationAward = "MSc Computing Science";
} else {
    $qualificationAward = "Fail: No Award";
}


$totalAverageMarks = 0;
//Set total average marks of all the modules
$totalAverageMarksQuery = "SELECT ROUND(AVG(markAchieved)) FROM `modules` WHERE studentNumber = '$studentNumber'";
$query = mysqli_query($connection, $totalAverageMarksQuery);
$row = mysqli_fetch_array($query);
$totalAverageMarks = $row['ROUND(AVG(markAchieved))'];

//Fetch mark for disseration module separately
$dissertationMarkQuery = "SELECT markAchieved FROM `modules` WHERE studentNumber = '$studentNumber' AND moduleId = 'TECH7009'";
$query = mysqli_query($connection, $dissertationMarkQuery);
$row = mysqli_fetch_array($query);
$dissertationMark = $row['markAchieved'];

$meritDistinctionPassFail = "";
//Set degree classification
if ($totalAverageMarks >= 60 && $totalAverageMarks < 70 && $dissertationMark >= 58) {
    $meritDistinctionPassFail = "Merit";
} elseif ($totalAverageMarks >= 70 && $dissertationMark >= 68) {
    $meritDistinctionPassFail = "Distinction";
} elseif ($totalAverageMarks > 50 && $totalAverageMarks < 60) {
    $meritDistinctionPassFail = "Pass";
} else {
    $meritDistinctionPassFail = "Fail";
}


//Count of A, B, C, F grades each student got.

echo $creditsEarned;
echo $qualificationAward;
echo $totalAverageMarks;
echo $dissertationMark;
echo $meritDistinctionPassFail;


mysqli_close($connection);

?>

