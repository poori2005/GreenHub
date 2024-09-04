<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
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
    echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
    exit();
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Fetch orders from database
$sql = "
    SELECT orders.id, orders.order_date, plants.name AS plant_name
    FROM orders
    JOIN plants ON orders.plant_id = plants.id
    WHERE orders.user_id = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

$orders = [];
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode(['success' => true, 'orders' => $orders]);
?>
