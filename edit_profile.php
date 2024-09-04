<?php include("header.php"); ?>
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['firstname'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $update_sql = "UPDATE signup SET firstname='$name', age='$age', mobile='$mobile', email='$email', address='$address' WHERE id='$userId'";
    if ($conn->query($update_sql) === TRUE) {
        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .edit-container { max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px;background-color:#f8f9fa; }
        .edit-container h1 { text-align: center; margin-bottom: 20px;color: #008000; }
        .edit-container form { display: flex; flex-direction: column; }
        .edit-container form label { margin: 10px 0 5px; font-family: sans-serif;color:green; }
        .edit-container form input { padding: 10px; margin-bottom: 10px; font-family: sans-serif;}
        .edit-container form button { padding: 10px;}
    </style>
</head>
<body>
<div class="edit-container">
    <h1>Edit Profile👤</h1>
    <form method="post">
        <label for="name">Name</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($user['firstname']); ?>" required>
        <label for="age">Age</label>
        <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($user['age']); ?>" required>
        <label for="mobile">Mobile Number</label>
        <input type="text" id="mobile" name="mobile" value="<?php echo htmlspecialchars($user['mobile']); ?>" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <label for="address">Address</label>
        <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>" required>
        <button type="submit" class="btn btn-primary">Update🔃</button>
    </form>
</div>
</body>
</html>
