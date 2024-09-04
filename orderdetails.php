<?php
include("header.php");
include("db.php");
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
    die("User not logged in.");
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

// Get order ID from URL
$order_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Check if order_id is valid
if ($order_id <= 0) {
    die("Invalid order ID.");
}

// Fetch order details from database
$sql = "
    SELECT orders.id, orders.order_date, plants.name AS plant_name, plants.description, plants.image
    FROM orders
    JOIN plants ON orders.plant_id = plants.id
    WHERE orders.id = ? AND orders.user_id = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $order_id, $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

// Check if order is found
if ($result->num_rows > 0) {
    $order = $result->fetch_assoc();
} else {
    die("Order not found or you do not have permission to view this order.");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .order { margin: 20px; padding: 20px; border: 1px solid green; }
        .order h2 { margin: 0 0 10px; }
        .order img { width: 200px; height: 200px; }
    </style>
</head>
<body>
    <div class="order">
        <h2 style="color:green;"><?php echo htmlspecialchars($order['plant_name']); ?></h2>
        <img style="border-radius:10%" src="<?php echo htmlspecialchars($order['image']); ?>" alt="<?php echo htmlspecialchars($order['plant_name']); ?>">
        <br><br>
        <p style="font-weight:400"><i><?php echo htmlspecialchars($order['description']); ?></i></p>
        <p><i>Ordered on: <?php echo htmlspecialchars($order['order_date']); ?></i></p>
        
        <button style="border-radius:10px" onclick="location.href='record_video.php'">🔴Record Live Video</button>
        
    </div>
    <div class="order">
        <h5 style="color:green"><u>Note</u></h5>
        <ul><li>You have to record live video to get the reward!</li></ul>
    </div>
</body>
</html>
