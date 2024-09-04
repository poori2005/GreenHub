<?php
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
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Get form data and sanitize
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if user exists in the database
    $sql = "SELECT id, password FROM signup WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result === false) {
        // Query error
        echo "Error executing query: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userId = $row['id'];
        $hashedPassword = $row['password'];

        // Verify the hashed password
        if (password_verify($password, $hashedPassword)) {
            // Start a session
            session_start();
            $_SESSION['user_id'] = $userId;
            $_SESSION['email'] = $email;

            // Redirect to user-specific page
            header("Location: userpage.php?id=$userId");
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Email not found in database.";
    }
} else {
    echo "All form fields are required.";
}

// Close connection
$conn->close();
?>
