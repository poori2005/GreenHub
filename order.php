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

// Get user ID from session
$userId = $_SESSION['user_id'];
$plantId = isset($_POST['plant_id']) ? intval($_POST['plant_id']) : 0;

// Insert order into database
$sql = "INSERT INTO orders (user_id, plant_id) VALUES ('$userId', '$plantId')";

if ($conn->query($sql) === TRUE) {
    $x=1;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



// Close connection
$conn->close();

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_SESSION['user_id'];
$sql="SELECT address FROM signup WHERE id=$userId";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$address=$row['address'];
$conn->close();
?>
<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        body { font-family: Arial, sans-serif; justify-content:center;align-items:center;height:100vh;margin:0;}
        .plant { margin: 20px; padding: 20px; border: 1px solid #ccc; }
        .plant h2 { margin: 0 0 10px; }
        .plant img { width: 200px; height: 200px; }
        .googleimage{
            height: 20px;
            width: 20px;
        }
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
        .Order-invoice{
            background-color:MintCream;
            padding: 30px;
            width:100vw;
            text-align:center;
        }
        
        
        table{
            width:100%;
            border-collapse: collapse;

        }
        th,td{
            padding:8px 12px;
        }
        th{
            text-align:left;
        }
        hr{
            border:0;
            border-top: 1px solid #000;
        }
        .para{
            padding-left:10px;
        }
        button{
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .b{
            background-color:white;
            color:blue;
            border:1px solid blue;
            border-radius:10px;
            text-align:center;
        }
        .b:hover {
            background-color:blue;
            color:white;

        }
        
        
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Green Hub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="userpage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="plants.php">Plant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rewardspage.php">Rewards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div>

        <?php
            if($x==1)
            {
                
        ?>
        <br>
        <h4 class ="para"><u>Note: </u></h4>
        <ul>
            <li>" Online Payments are temporarily unavailable. So kindly use Pay On Delivery (COD) option. "</li>
            </ul>
        <br>
        <div class="Order-invoice">
            <h3><u><b>Order Invoice</b></u></h3><br>
            <table>
                <tr>
                    <th><?php echo "User Id   " ?>&nbsp;</th>
                    <td><?php echo  $userId ?></td>
            </tr>
            <tr>
                <th><?php echo "Plant Id   " ?></th>
                <td><?php echo  $plantId ?></td>
            </tr>
            <tr>
                <th> Cost     </th>
                <td> 0.0</td>
            </tr>
            <tr>
                <th>Shipping Charges </th>
                <td>20.0</td>
            </tr>
            <tr>
                <th><?php echo "Payment Type"?></th>
                <td>Cash On Delivery</td>
            </tr>
            <tr>
                <th><?php echo "Address " ?></th>
                <td><? echo $address ?></td>
            <tr>
                <th colspan="2"><hr></th>
            </tr>
            <tr>
                <th><u><b>Total Cost <b></th>
                <td><b> 20.0<b></td>
            </tr>
            <tr>
                <th colspan="2"><hr></th>
            </tr>
            </table>
            <br>
            <form >
            <button class="b" type="submit" value="continue" onclick="showDialog()" id="but">continue</button>
            </form>
            <div><a href="rewardspage.php">Go Back</a></div>
            <br>
            <script>

            function showDialog() { 
                alert("Order Placed Sucessfully..!!!");
            } 
            </script>
            <?php   
            }
            ?>
        </div>
    </div>
</body>
</html>
