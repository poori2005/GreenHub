<?php
include("header.php");
?>

<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: loginpage2.html");
    exit();
}

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

// Get plant ID from URL
$plantId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Check if plantId is valid
if ($plantId <= 0) {
    die("Invalid plant ID.");
}

// Fetch plant information from the database
$sql = "SELECT id, name, description, image, moreinfo1, moreinfo2, moreinfo3 FROM plants WHERE id='$plantId'";
$result = $conn->query($sql);

// Check for query errors
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

// Check if plant is found
if ($result->num_rows > 0) {
    $plant = $result->fetch_assoc();
} else {
    die("Plant not found.");
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        body { font-family: Arial, sans-serif; }
        .plant { margin: 20px; padding: 20px; border: 1px solid green; }
        .plant h2 { margin: 0 0 10px; color:green }
        .plant img { width: 200px; height: 200px; }
        .plant p{ font-family: system-ui; }
        
        
        .signupviagoogle{
            align-items: center;
            text-align: center;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: green;
        }
        .navbar-nav .nav-link {
            font-size: 1.2rem;
            color: #007bff;
        }
        .navbar-nav .nav-link:hover {
            color: #0056b3;
        }
        .signup-container {
            max-width: 500px;
            margin-top: 50px;
        }
        .image{
            border-width:10px;
            border-color:green;
            border-radius:10%;
        }
    </style>
</head>
<body>

    <div class="plant">
        <h2><?php echo htmlspecialchars($plant['name']); ?></h2>
        <img class="image" src="<?php echo htmlspecialchars($plant['image']); ?>" alt="<?php echo htmlspecialchars($plant['name']); ?>">
        <p><i><?php echo htmlspecialchars($plant['description']); ?></i></p>
        <h6 style="color:green;"><u>More Info</u></h6>
        <ul style="font-family: system-ui;">
            <li><i><?php echo $plant['moreinfo1'] ?></i></li>
            <li><i><?php echo $plant['moreinfo2'] ?></i></li>
            <li><i><?php echo $plant['moreinfo3'] ?></i></li>
        </ul>
        <h1>₹ 0.00/-<sub style="font-size:20px; font-family: system-ui;"><i>+ ₹20 Shipping Charges</i></sub></h1>
        <br>
        <form action="order.php" method="POST">
            <input type="hidden" name="plant_id" value="<?php echo $plant['id']; ?>">
            <input type="submit" class="btn btn-outline-primary" value="Order Now🛒">   
        </form>
    </div>
    <div class="plant">
        <h6 style="color:green"><u><b>Note</b></u></h6>
        <ul><li><p>Digital payments are currently under developing stage, Please use <span style="color:green"><b>cash on delivery!<b></span></p></li></ul>
    </div>
    <div class="plant">
        <h6 style="color:green"><u><b>Important Information</b></u></h6>
        <ul style="font-family: system-ui; font-weight:400;"><li>Please check whether <a href="profile.php" style="color:green">address</a> is updated or not before ordering.</li></ul>
    </div>
</body>
</html>
