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
</head>

<body>
    <h2>Form for logging in user</h2>
    <!-- TODO: Add register controller for this form to call -->
    <!-- TODO: Add validation in the form itself -->
    <div class="container">
        <div class="row justify-content-center">
            <form action="loginController.php" method="post">
                <p>
                <h2>username</h2>
                <input type="text" name=username>
                </p>
                <p>
                <h2>Password</h2>
                <input type="password" name=password>
                </p>
                <p>
                    <a href="register.php">Register</a>
                </p>
                <input type="submit" name="submit" value="Submit Form"><br>
            </form>
        </div>
        </div>
        <div class="container">
            <footer class="footer-clean fixed-bottom" >
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