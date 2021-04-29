<?php



?>

<html>

<head>
    <title>Register User</title>
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
    <h2>Form for registering user</h2>
    <!-- TODO: Add register controller for this form to call -->
    <form action="RegisterController.php" method="post">
        <p>
        <h2>Enter your full name</h2>
        <input type="text" name=fullname>
        </p>
        <h2>Enter your Brookes student Id. This will be your username</h2>
        <p>
            <input type="text" name=BrookesStudentId>
        </p>
        <h2>Enter your password of choice</h2>
        <p>
            <input type="text" name=password>
        </p>
        <input type="submit" name="submit" value="Submit Form"><br>
    </form>
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