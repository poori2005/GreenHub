<?php
    include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aboutus</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0px;
            
        }
        
        .title {
            background-color: #539243;
            scale: 1.3;
            padding-top: 2%;
            padding-bottom: 1.5%;
            color: black;
            text-align: center;
            align-items: center;
        }

        .content {
            padding-top: 3%;
            padding-left: 20%;
            padding-right: 18%;
        }

        .content div{
            margin-top: 3%;
        }

        .activityhead {
            margin-top: 3%;
            margin-bottom: 3%;
            text-align: center;
            align-items: center;
        }

        .activity {
            display: flex;
            flex-direction: row;
            width:100vw;
            margin-bottom: 5%;
            margin-left: 10px;
            text-align: center;
            align-items: center;
        }

        .support{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 49.5%;
            border: solid 2px black;
            padding: 2%;
            text-align: center;
            align-items: center;
            height:25vh;
        }

        

        .end {
            margin-bottom: 5%;
        }

        .about_icon img {
            border-radius: 50%;
        }

        .contact {
            background-color: rgb(128, 96, 67, .9);
            padding: 5%;
            text-align: center;
            align-items: center;
        }
        .center{

            display: block;
             margin-left: auto;
             margin-right: auto;
            width: 50%;
        }
    </style>
</head>

<body>
    <br><br>
    <div class="title">
        <h1>About Us</h1>
    </div>
    <div class="content">
        <div>
            <div class="article">
                <h2 style="text-align: center;
            align-items: center;">WELCOME TO GREEN HUB!</h2>
                <p>These days we can see the rapid increase in earth temperatures and the changes in seasonal patterns
                    across the world due to the Emission of green house gases and deforestation. So to overcome this,
                    <b>We're introducing the tree plantation reward system through our website GREEN HUB.</b>
                </p>
            </div>
            <div class="image">
                <img src="girl.jpg" alt="planting image" class="center">
            </div>
        </div>
        <div>
            <div class="moto">
                <div class="para">
                    <h2 style="text-align: center;
            align-items: center;">OUR MOTIVE</h2>
                    <p> Our main motive is <b>Large plantation.</b>We're passionate about creating a more sustainable
                        future
                        for our Ecosystem. Our mission is to inspire and empower individuals, communitites, and
                        organizations
                        to live green, more environmentally consious lives.We took a step forward to make the people enthusiastic for planting plants.</p>
                </div>
                <div class="img0">
                    <img src="largeplantation.jpg" alt="large plantation"  class="center">
                </div>
            </div>
        </div>
    </div>
    <h2 class="activityhead">OUR ACTIVITY</h2>
    <div class="activity">
        <div class="support">
                    <div class="about_icon">
                        <img src="ngo.jpg" alt="ngo" width="80px" height="80px">
                    </div>
                    <h5 class="text-dark text-capitalize mt-3 font-weight-bold">NGO</h5>
                    <p class="edu_desc mt-3 mb-0 text-muted"><b>We collaborate with the nearby NGO organisations to provide the plants for
                        the users.We help them to reach their goals. </b></p>
        </div>

        <div class="support">
                    <div class="about_icon">
                        <img src="coupon.jpg" alt="coupon" width="100px" height="100px">
                    </div>
                    <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Coupon</h5>
                    <p class="edu_desc mb-0 mt-3 text-muted"><b>We collaborate with some top MNCs and managed to provide the coupons to the customers.</b>
                    </p>
        </div>
    </div>
    <div class="activity">
        <div class="support">
                    <div class="about_icon">
                        <img src="educate.jpg" alt="educate" width="100px" height="100px">
                    </div>
                    <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Educate</h5>
                    <p class="edu_desc mb-0 mt-3 text-muted"><b>We organize workshops and educate people about
                        planting trees, making it as a daily habit to them.</b></p>
        </div>

        <div class="support">
                    <div class="about_icon">
                        <img src="plantingtrees.jpg" alt="plant trees" width="100px" height="100px">
                    </div>
                    <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Plant trees</h5>
                    <p class="edu_desc mb-0 mt-3 text-muted"><b>Encouraging the people as much as possible to plant trees, to make a proper Ecosystem for the future generations.</b></p>
        </div>
    </div>
    <div class="end">
        <h1 style="text-align: center;
            align-items: center;"><i><b>Plant a tree, so that the next generation can get air for free.</b></i></h1>
    </div>
    <div class="contact">
        <h2>Contact Us</h2>
        <p><b>Be part of our mission to create a greener future.</b></p>
        <div><i class="fas fa-envelope"></i>contact@email.com</div>
        <div><i class="fas fa-phone"></i>+00 0000 0000</div>
    </div>
</body>

</html>