<?PHP






?>
<html>
<head><title>Login User</title></head>
<body>
<h2>Form for logging in user</h2>
<!-- TODO: Add register controller for this form to call -->
<!-- TODO: Add validation in the form itself -->
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
<input type="submit" name="submit" value="Submit Form"><br >
</form>
</body>
</html>