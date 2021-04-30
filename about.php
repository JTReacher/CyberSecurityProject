<?php

session_start();
if (!$_SESSION['loggedin']) {
    header("location: login.php");
}
?>
<html lang="en">

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
        <div class="card text-center">
            <div class="card-header">
               <b> About </b>
            </div>
            <div class="card-body">
                <p class="card-text">This simple app can be navigated using the navigation bar at the top of the page. 
                    <br>Users can register using their Oxford Brookes student number and then add module marks. 
                    <br> When a user has added all of their marks, they can view their academic record at the link above.
                    <br> Be sure to logout when you have finished your session.
                </p>
            </div>
            <div class="card-footer">
            </div>
        </div>
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