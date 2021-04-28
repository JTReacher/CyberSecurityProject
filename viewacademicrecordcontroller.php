
<?php

include('db_login.php');
session_start();

$studentNumber = $_SESSION["username"];


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


//Count of A, B, C, F grades student got.
$countA;
$countB;
$countC;
$countF;

$gradeAQuery = "SELECT COUNT(grade) FROM `modules` WHERE studentNumber = '$studentNumber' AND grade = 'A'";
$query = mysqli_query($connection, $gradeAQuery);
$row = mysqli_fetch_array($query);
$countA = $row['COUNT(grade)'];

$gradeBQuery = "SELECT COUNT(grade) FROM `modules` WHERE studentNumber = '$studentNumber' AND grade = 'B'";
$query = mysqli_query($connection, $gradeBQuery);
$row = mysqli_fetch_array($query);
$countB = $row['COUNT(grade)'];

$gradeCQuery = "SELECT COUNT(grade) FROM `modules` WHERE studentNumber = '$studentNumber' AND grade = 'C'";
$query = mysqli_query($connection, $gradeCQuery);
$row = mysqli_fetch_array($query);
$countC = $row['COUNT(grade)'];

$gradeFQuery = "SELECT COUNT(grade) FROM `modules` WHERE studentNumber = '$studentNumber' AND grade = 'F'";
$query = mysqli_query($connection, $gradeFQuery);
$row = mysqli_fetch_array($query);
$countF = $row['COUNT(grade)'];


echo $creditsEarned;
echo $qualificationAward;
echo $totalAverageMarks;
echo $dissertationMark;
echo $meritDistinctionPassFail;
echo $countA;
echo $countB;
echo $countC;
echo $countF;



mysqli_close($connection);

?>


