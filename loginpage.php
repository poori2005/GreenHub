<?php include("indexheader.html"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sign Up - Green Hub</title>
    <style>
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
        
    </style>
</head>
<body>
    <div class="container signup-container">
        <h2 class="text-center">Sign Up</h2>
        <form action="signup.php" method="post">
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </form>
    </div>
    <br>
    
 
    
    
</body>
</html>
