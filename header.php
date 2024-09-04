<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Green Hub</title>
</head>
<style>
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f4f4f4;
}

.navbar {
    font-family: system-ui;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background: linear-gradient(45deg, #2e8b57, #3cb371);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.navbar-left {
    flex: 1;
}

.navbar-brand {
    color: white;
    text-decoration: none;
    font-size: 24px;
    font-weight: bold;
}

.navbar-right {
    display: flex;
    gap: 15px;
}

.nav-item {
    color: white;
    text-decoration: none;
    font-size: 16px;
    padding: 8px 12px;
    transition: background 0.3s, color 0.3s;
}

.nav-item:hover {
    background-color: #228b22;
    color: #f0f0f0;
    border-radius: 4px;
}
</style>
<body>

    <nav class="navbar">
        <div class="navbar-left">
            <a href="#" class="navbar-brand" style="color:white;font-size:30px;padding-left:10px; ">Green Hub</a>
        </div>
        <div class="navbar-right">
            <a href="userpage.php" class="nav-item">Home</a>
            <a href="plants.php" class="nav-item">Plant</a>
            <a href="rewardspage.php" class="nav-item">Orders</a>
            <a href="received_coupons.php" class="nav-item">Rewards</a>
            <a href="profile.php" class="nav-item">Profile</a>
            <a href="aboutus.php" class="nav-item">About Us</a>
        </div>
    </nav>
</body>
</html>