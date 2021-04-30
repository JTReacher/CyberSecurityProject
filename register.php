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

    <script>
        function validateRegisterForm() {
            var fullname = document.forms["registerForm"]["fullname"].value;
            var BrookesStudentId = document.forms["registerForm"]["BrookesStudentId"].value;
            var password = document.forms["registerForm"]["password"].value;

            if (fullname == null || fullname == "") {
                alert("You must provide a name");
                return false;
            } else if (password.length < 12) {
                alert("Passwords must be a minimum of 12 characters");
                return false;
            } else if (BrookesStudentId.length != 8) {
                alert("Brookes Student Id must equal 8 characters");
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
                </ul>
            </div>
        </div>
    </nav>
    <!-- TODO: Add register controller for this form to call -->
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="align-self-center">
                <h5>Please register a user account</h5>
                <section class="login-clean">
                    <form name="registerForm" action="RegisterController.php" method="post" accept-charset="utf-8" onsubmit="return validateRegisterForm()">
                        <h2 class="sr-only">Login Form</h2>
                        <div class="form-group"><input class="form-control" type="text" name="fullname" placeholder="Full Name" /></div>
                        <div class="form-group"><input class="form-control" type="text" name="BrookesStudentId" placeholder="Brookes Student Id" /></div>
                        <div class="form-group"><input class="form-control" type="password" name="password" maxlength="128" placeholder="Password" /></div>
                        <div class="form-group"><input class="btn btn-primary btn-block" type="submit" value="Register" style="background: #2699FB;" /></button>
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