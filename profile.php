<?php
include('header.php');
?>


<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: loginpage2.html");
    exit();
}

$userId = $_SESSION['user_id'];

// Fetch user details from the database
$sql = "SELECT firstname, age, mobile, email, address FROM signup WHERE id='$userId'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .profile-container{ max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color:#f8f9fa}
        .profile-container p { margin: 10px 0; }
        .profile{
            color: #008000;
            text-align: center; margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="profile-container">
    <h1 class="profile">Profile👤</h1>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['firstname']); ?></p>
    <p><strong>Age:</strong> <?php echo htmlspecialchars($user['age']); ?></p>
    <p><strong>Mobile Number:</strong> <?php echo htmlspecialchars($user['mobile']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
    <a href="edit_profile.php" class="btn btn-primary">Edit Profile✏️</a>
</div>
</body>
</html>

