<?php
include("db.php");
include("header.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Hub - Plants Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="plantstyle.css">
    <style>
        body { font-family: Arial, sans-serif; }
        
        .plant h2 { margin: 0 0 10px; }
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
    <br>
    <h1 class="plants-shop">🛒Store🌿</h1>
    <div id="plants-list" class="plants-list"></div>

    <script>
        const plants = [
            { id: 1, name: 'Aloe Vera', description: 'Aloe Vera is a succulent plant species of the genus Aloe.', image: 'aloevera.jpg' },
            { id: 2, name: 'Basil', description: 'Basil is a culinary herb of the family Lamiaceae.', image: 'tulsi.jpg' }
            // Add more plants as needed
        ];

        const plantsList = document.getElementById('plants-list');

        plants.forEach(plant => {
            const plantDiv = document.createElement('div');
            plantDiv.classList.add('plant');
            plantDiv.innerHTML = `
                <h2><b>${plant.name}</b></h2>
                <a href="shopping.php?id=${plant.id}"><img class="plant-image" src="${plant.image}" alt="${plant.name}" style="width:200px;height:200px;"></a>
                <br><br>
                <p style="color:rgb(38, 73, 13);"><i>${plant.description}</i></p>
                <a href="shopping.php?id=${plant.id}"><button type="button" class="btn btn-outline-primary">View Details</button></a>
                
            `;
            plantsList.appendChild(plantDiv);
        });
    </script>
</body>
</html>
