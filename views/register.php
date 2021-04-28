<?php



?>

<html>
<head><title>Register User</title></head>
<body>
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
<input type="submit" name="submit" value="Submit Form"><br >
</form>
</body>
</html>