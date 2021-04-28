
<?php

include('db_login.php');
session_start();

$studentNumber = $_SESSION["username"];


/*  private $totalCreditsAchieved;
    private $qualificationAward;
    private $averageMark;
    private $meritDistinctionOrPass; */
/*
    TODO: Implement

    4. Total average marks of all of the modules

    5. Based on the average marks, classify  the degree as pass, merit or distinction
        -See the brief for further conditions

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




echo $creditsEarned;
echo $qualificationAward;
echo $totalAverageMarks;


mysqli_close($connection);

?>

