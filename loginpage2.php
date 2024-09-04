<?php include("indexheader.html"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login - Green Hub</title>
    <style>
        .googleimage{
            height: 20px;
            width: 20px;
        }
        .signupviagoogle{
            align-items: center;
            text-align: center;
        }
        
        
        
        .login-container {
            max-width: 500px;
            margin-top: 50px;
        }
        .google-btn {
            background-color: #db4437;
            color: white;
        }
        .google-btn:hover {
            background-color: #c23321;
        }
        .google-icon {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <h2 class="text-center">Login</h2>
        <form action="signin.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+Y6n4PJA5xs3mFv3//sRTtD7i0RoK" crossorigin="anonymous"></script>
</body>
</html>
