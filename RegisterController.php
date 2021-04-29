<?PHP


include('db_login.php');
include('User.php');



//TODO: Encrypt the password before storage in the database



$fullName = $_POST['fullname'];
$username = $_POST['BrookesStudentId'];
$password = $_POST['password'];

$passwordHash = password_hash($password, PASSWORD_DEFAULT);


$user = new User($fullName, $username, $passwordHash);


$connection = mysqli_connect($db_host, $db_username, $db_password, $db_database);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$create_table_query_string = 'CREATE TABLE `users` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(255),
    `fullName` VARCHAR(255),
    `passwordHash` VARCHAR(255),
    `totalCreditsAchieved` INT(255),
    `qualificationAward` VARCHAR(255),
    `averageMark` INT(255),
    `meritDistinctionOrPass` VARCHAR(255),
    `createdDate` DATETIME DEFAULT CURRENT_TIMESTAMP
    )';
$query = mysqli_query($connection, $create_table_query_string);


$insert_rows_query_string = "insert into users (username, fullName, passwordHash)
values ('$username', '$fullName', '$passwordHash' )";


$query = mysqli_query($connection, $insert_rows_query_string);

mysqli_close($connection);

header("location: login.php");

