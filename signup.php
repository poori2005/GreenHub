<?php
include("header.php");
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set and not empty
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])) {
    // Get form data and sanitize
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Debugging: print sanitized input data
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into database
    $sql = "INSERT INTO signup (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$hashedPassword')";

    // Debugging: print SQL query
    


// Close connection

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php   if ($conn->query($sql) === TRUE) { ?>
        <h3 style="color:green; text-align:center"><i>Sign Up Successful..!!</i></h3>
        <?php  } else  { ?> <h3 style="color:green; text-align:center"><i>Problem in signup..Try again after some time..!!</i></h3> <?php } }
        else { ?> <h3 style="color:green; text-align:center">All form fields are Required...</h3> <?php  } ?>
        <h3 style="color:green; text-align:center"><a href="loginpage2.php">Click Here</a> to Login</h3>
</body>
</html>
<?php  $conn->close(); ?>
