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

// Function to issue a coupon
function issue_coupon($conn, $user_id) {
    // Find an unissued coupon
    $sql = "SELECT id, code FROM coupons WHERE issued = 0 ORDER BY RAND() LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mark the coupon as issued
        $row = $result->fetch_assoc();
        $coupon_id = $row['id'];
        $coupon_code = $row['code'];
        $update_sql = "UPDATE coupons SET issued = 1 WHERE id = $coupon_id";
        if ($conn->query($update_sql) === TRUE) {
            // Add the issued coupon to received_coupons table
            $insert_sql = "INSERT INTO received_coupons (user_id, coupon_code) VALUES ($user_id, '$coupon_code')";
            if ($conn->query($insert_sql) === TRUE) {
                return $coupon_code;
            } else {
                return "Error: " . $insert_sql . "<br>" . $conn->error;
            }
        } else {
            return "Error: " . $update_sql . "<br>" . $conn->error;
        }
    } else {
        return "No available coupons.";
    }
}

// Example user ID

$user_id = $_SESSION['user_id'];

$coupon_code = issue_coupon($conn, $user_id);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Issue Coupon</title>
</head>
<body>
    <h2 style="text-align:center"><?php echo $coupon_code ? "Your coupon code is: $coupon_code" : "No coupons available"; ?></h2>
</body>
</html>

<?php
$conn->close();
?>
