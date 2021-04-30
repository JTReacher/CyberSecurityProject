<?PHP

session_start();






?>
<html>

<head>
    <title>Login User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <script>


    </script>
</head>

<body>


    <!-- TODO: Add register controller for this form to call -->
    <!-- TODO: Add validation in the form itself -->

    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="align-self-center">
                <section class="login-clean">
                    <form action="loginController.php" method="post" accept-charset="utf-8">
                        <h2 class="sr-only">Login Form</h2>
                        <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Brookes Student Id" required /></div>
                        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required /></div>
                        <div class="form-group"><button class="btn btn-primary btn-block" type="submit" value="Login" style="background: #2699FB;" />Log In</button>
                            <a href="register.php">Register</a>
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