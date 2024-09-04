<?php

include("header.php");

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

// Example user ID
$user_id = $_SESSION['user_id'];

// Get received coupons for the user
$sql = "SELECT coupon_code, received_at FROM received_coupons WHERE user_id = $user_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Received Coupons</title>
    <style>
        th,td{border-style: inset;}
    </style>
</head>
<body>
    <h2 align="center" style="color:green">Your Received Coupons</h2>
    <table border="1" style="border-collapse:collapse; border-color:green; width:50%; text-align:center;height:70px; border-style: inset;" align="center">
        <tr>
            <th>Coupon Code</th>
            <th>Received At</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["coupon_code"] . "</td><td>" . $row["received_at"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No coupons received</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
