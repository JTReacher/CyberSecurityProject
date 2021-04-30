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

?>


<html>

<head>
    <title>Add Module</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <script>
        function validateModuleForm() {
            var markAchieved = document.forms["moduleForm"]["markAchieved"].value;
            var moduleId = document.forms["moduleForm"]["moduleId"].value;



            if (markAchieved == null || markAchieved == "") {
                alert("You must specify the mark achieved for this module");
                return false;
            } else if (markAchieved < 0 || markAchieved > 100) {
                alert("The mark must be between 0 and 100");
                return false;
            } else if (moduleId == null || moduleId == "") {
                alert("You must select a module code");
                return false;

            }



        }
    </script>
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
    <!-- TODO: Add module controller for this form to call -->
    <div class="container h-100">
        <div class="row h-50 justify-content-center">
            <div class="align-self-center">
                <section class="login-clean">
                    <form action="ModuleController.php" method="post" accept-charset="utf-8" name="moduleForm" onsubmit="return validateModuleForm()">
                        <!-- create radio buttons -->
                        <p>Module: Select module and input information (to add or to overwrite) <br><br>
                            <input type="radio" name="moduleId" value="COMP7001">COMP7001 </input>
                            <input type="radio" name="moduleId" value="COMP7002">COMP7002</input>
                            <input type="radio" name="moduleId" value="TECH7005">TECH7005</input>
                            <input type="radio" name="moduleId" value="DALT7002">DALT7002</input>
                            <input type="radio" name="moduleId" value="DALT7011">DALT7011</input>
                            <input type="radio" name="moduleId" value="SOFT7003">SOFT7003</input>
                            <input type="radio" name="moduleId" value="TECH7004">TECH7004</input>
                            <input type="radio" name="moduleId" value="TECH7009">TECH7009</input>
                        </p>
                        <!-- create dropdown list -->
                        <p>Mark Achieved in module: <br><br>
                            <input type="number" name=markAchieved>
                        </p>
                        <input type="submit" name="submit" value="Submit Form"><br>
                    </form>
                </section>
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