<?php
include("header.php");
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

// Get user ID from session or URL
$userId = isset($_GET['id']) ? intval($_GET['id']) : $_SESSION['user_id'];

// Fetch user information from the database
$sql = "SELECT * FROM signup WHERE id='$userId'";
$result = $conn->query($sql);

if ($result === false) {
    echo "Error executing query: " . $conn->error;
} elseif ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];

    // Display user-specific information
    
} else {
    echo "User not found.";
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Green Hub</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
.quote{
    color: rgb(0, 0, 0);
    text-align: center;
    
}
.author{
    color: rgb(0, 0, 0);
    padding-left: 72%;
}



*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
footer{
    background-color: #1e1d1d;
}
.footercontainer{
    width: 100%;
    padding: 70px 30px 20px;
}
.socialIcons{
    display: flex;
    justify-content:center ;

}
.socialIcons a{
    text-decoration: none;
    padding: 10px;
    background-color:whitesmoke;
    margin: 13px;
    border-radius: 50%;
}
.socialIcons a{
    font-size: 2em;
    color: black;
    opacity: 0.9;
}
.socialIcons a:hover{
    background-color: #0c0101;
    transition:0.5s;

}
.socialIcons a:hover i{
    color:white;
    transition:0.5s;

}
.footernav{
    margin:30px;
}
.footernav ul{
    display: flex;
    justify-content: center;
    list-style: none;
}
.footernav ul li a{
    color: white;
    margin:20px;
    text-decoration: none;
    font-size: 1.3em;
    opacity:0.7;
    transition: 0.5s;
}
.footernav ul li a:hover{
    opacity: 1;
}
.footerbottom{
    background-color: #0b0606;
    padding: 20px;
    text-align: center;
}
.footerbottom p{
    color: white;
}
.designer{
    opacity: 0.7;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 400;
    margin: 0px 5px;
}
@media(max-width:700px){
    .footernav ul{
        flex-direction: column;
    }
    .footernav ul li{
        width:100%;
        text-align: center;
        margin: 10px;
    }
}
h4{
    font-weight: 100;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    text-align: center;
    
   }
   a{
    text-decoration: none;
    color: #f2f2f2;
   }
   a.hover{
    color: #f2f2f2;

   }


.containermt-5{
    background-color: ;
    margin: 1px;
    border: #0b0606;
   padding-right: 0%;
}
.name{
    text-align: center;
    float: center;
}
.p1{
    
    
    margin:40px auto;
    object-fit:cover;
    
    width:100vw;
}
.prev{
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: rgb(240, 238, 238);
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
}
 .next {
    cursor: pointer;
    position: absolute;
    top: 52%;
    width: auto;
    padding-right: 29%;
    margin-top: -18px;
    color: rgb(240, 238, 238);
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
  }
  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }
  .text{
    
    font-size: 2opx;
    padding-left: 20px;
    padding-bottom: 30%;
    float: left;
    display:block;
  }
  .menu{
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .home-right{
    margin-bottom:15%;
    margin-left:2%;
  }
</style>
<body>
<br>
<h3 style="color:green"><i>Welcome, <?php echo $firstname . ' ' .$lastname; ?>!</i></h3>
<div class="menu">
 <div class="p1">
 <img  class="mySlides" src="soil-8080788.jpg" alt="..." width="1100px" height="600px" >
    <img class="mySlides" src="p8.png" style="width:1100px" height="600px">
    <img class="mySlides" src="p9.png" style="width:1100px" height="600px">
    
 </div>
 <div class="home-right"><i>
    <h5>🌱 We obtain 60% of our energy intake from just three plant species.</h5>
    <br>
    <h5>🌱 Around 30,000 plant species are used in medicine.   </h5>
    <br>
    <h5>🌱 The body lotions and oils we use are mostly made from plants. There are some plants that contain moisturizing and soothing ingredients.</h5>
    <br>
    <h5>🌱 Enhances air quality which helps in increasing memory power and concentration levels .</h5></i>
</div>
 </div><br>

  <div class="name">
    <img src="greenhublogo.jpg" width="500px" height="500px">
  </div>

 
 <div >
    <h1 class="quote"><i>"Green is the prime color of the world,<br>
     and that from which its loveliness arises."</i></h1>
    <p class="author">~Pedro Calderon de la Barca</p>
</div>

  <script>
  
  var myIndex = 0;
  carousel();
  
  function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 3000);
  }
  </script>
  
    <footer>
        <div class="footercontainer">
            <div class="socialIcons">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-google-plus"></i></a>
            </div>
            <div class="footernav">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">News</a></li>
                    <li><a href="">About us</a></li>
                    <li><a href="">Help & FAQ</a></li>

                </ul>
            </div>
            <h4 style="color: #f2f2f2";>  Green Hub | <a href="greenhub.html">www.Greenhub.com</a> |<a href="#"> E-mail: xxyyz123@gmail.com </a>| +91 123456789<br>
                Raghu engnieering college, Dakamarri- 530046,visakhapatnam, India.</h4>                
            
        </div>
            
         <div class="footerbottom">
            <p>copyright &copy;2022;</p>
        </div>   
    </footer>
    
</body>
</html>
