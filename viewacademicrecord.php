<?php

include('db_login.php');
session_start();
if (!$_SESSION['loggedin']) {
    header("location: login.php");
}
if (time() - $_SESSION["login_time"] > 1800) {
    session_unset();
    session_destroy();
    header("location:login.php");
}

$studentNumber = $_SESSION["username"];


$connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);

//Fetch and set number credits earned
$creditsEarnedQuery = "SELECT SUM(credits) FROM `modules` WHERE studentNumber = '$studentNumber' AND pass = 1";
$query = mysqli_query($connection, $creditsEarnedQuery);
$row = mysqli_fetch_array($query);
$creditsEarned = $row['SUM(credits)'];

$qualificationAward = "";
//Set qualificationAward
if ($creditsEarned >= 120 && $creditsEarned < 180) {
    $qualificationAward = "PG Diploma in Computing";
} elseif ($creditsEarned >= 180) {
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

$check_if_in_db_query_string = "SELECT COUNT(moduleId) FROM `modules` WHERE studentNumber = '$studentNumber' AND moduleId = 'TECH7009';";
$query = mysqli_query($connection, $check_if_in_db_query_string);
$row = mysqli_fetch_array($query);
$moduleCount = $row['COUNT(moduleId)'];

if ($moduleCount != 1) {
    $dissertationMark = 0;
} else {
    $dissertationMarkQuery = "SELECT markAchieved FROM `modules` WHERE studentNumber = '$studentNumber' AND moduleId = 'TECH7009'";
    $query = mysqli_query($connection, $dissertationMarkQuery);
    $row = mysqli_fetch_array($query);
    $dissertationMark = $row['markAchieved'];
}





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


$fetchAllModulesQuery = "SELECT * FROM `modules` WHERE studentNumber = '$studentNumber'";
$query = mysqli_query($connection, $fetchAllModulesQuery);
$row = mysqli_fetch_array($query);



mysqli_close($connection);


//Add these as session variables
//Pass them redirect to view acadmeic record and display

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand" href="https://www.brookes.ac.uk/">Oxford Brookes</a>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active" href="addmodule.php">Add Module</a></li>
                    <li class="nav-item"><a class="nav-link" href="viewacademicrecord.php">View Academic Record</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Content -->

    <div class="container">
        Academic Record User: <?php echo $studentNumber; ?>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Credits Earned</th>
                    <th>Total Average Marks</th>
                    <th>Dissertation Mark</th>
                    <th>Degree Classification</th>
                    <th>Qualification Award</th>
                    <th>Count of A Grades</th>
                    <th>Count of B Grades</th>
                    <th>Count of C Grades</th>
                    <th>Count of F Grades</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $creditsEarned; ?></td>
                    <td><?php echo $totalAverageMarks; ?></td>
                    <td><?php echo $dissertationMark; ?></td>
                    <td><?php echo $meritDistinctionPassFail; ?></td>
                    <td><?php echo $qualificationAward; ?></td>
                    <td><?php echo $countA; ?></td>
                    <td><?php echo $countB; ?></td>
                    <td><?php echo $countC; ?></td>
                    <td><?php echo $countF; ?></td>
                </tr>
            </tbody>
        </table>
        <?php
        //print php table of component modules
        

        ?>
    </div>
    <div class="container">
        <footer class="footer-clean fixed-bottom">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 item social">
                        <p class="copyright">Oxford Brookes © 2021</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>