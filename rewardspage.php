<?php
include('header.php');

?>
<?php
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Hub - Rewards</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .order { margin: 20px; padding: 20px; border: 3px solid #668264; border-radius:10px; background-color:#E0EFD9;}
        .order:hover{ background-color:#A6DBA2;}
        .order h2 { margin: 0 0 10px; }
        .order a { text-decoration: none; color: #000; }
        .orders-sec{
            width:599px;
            height:180px;
            padding: 10px;
            margin: 20px auto;
            border:2px solid #2D4830;
            border-radius:25px;
            background-color:#52D448;
        }
        .text{
            color:#163D1B;
            margin:5px auto;

            }
        .bar{
            text-align:center;
            border-radius:10px;
            background-color:#2B3E2A;
            color:lightgrey;
            padding:5px;
        }
        .para{
            text-align:center;
            margin:10px auto;
        }

       
    
    </style>
</head>
<body>
    <div class="orders-sec">
        <h2  class="text" align="center"><b>Your orders</b></h2>
        <br>
        <br>
        
        <div class="bar">
            <p class="para">* Tap on your order and record a live  video to claim rewards *</p>
        </div>
    
    </div> 


    <div id="orders-list"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('rewards.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const ordersList = document.getElementById('orders-list');
                        data.orders.forEach(order => {
                            const orderDiv = document.createElement('div');
                            orderDiv.classList.add('order');
                            orderDiv.innerHTML = `
                                <h2><a href="orderdetails.php?id=${order.id}" >${order.plant_name}</a></h2>
                                <p>Ordered on: ${new Date(order.order_date).toLocaleDateString()}</p>
                            `;
                            ordersList.appendChild(orderDiv);
                        });
                    } else {
                        alert(data.message);
                    }
                });
        });
    </script>
</body>
</html>
