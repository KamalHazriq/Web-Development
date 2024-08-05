<?php
include_once 'database.php';
include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="logo.ico" type="image/x-icon">
    <title>Disney Souvenirs : Home</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>


        body {

            background-image: url("background.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }

        @media (max-width: 768px) {
            body {
                background-size: contain;
            }
        }

        /* CSS styles for the container */
        .center-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .shop-description-container {
            background-color: #503C3C;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .shop-description-container h2 {
            font-size: 28px;
            margin-top: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .shop-description-container p {
            font-size: 16px;
            margin-bottom: 10px;
            line-height: 1.5;
        }
    </style>
</head>

<body bgcolor="#d4d4dc">
    <?php include_once 'nav_bar.php'; ?>

    <div class="center-container">
        <img src="logo.png" alt="Logo" style="height: 300px; margin-top: 15px; margin-bottom: 15px;">
        <div class="shop-description-container" style="text-align: center;">
    <h2>Welcome to Disney Collectibles by Kamal!</h2>
    <p>Explore the magic of our enchanting Disney Collectibles. Discover a curated selection of high-quality toys that bring <br> joy to collectors of all ages.</p>
    <p>Immerse yourself in timeless characters and cherished moments. Our collection contributes to your child's growth <br> and imagination, offering both entertainment and learning.</p>
    <p>Find the perfect addition to your Disney collection and relive the magic. Shop now for affordable and reliable Disney Collectibles!</p>
</div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
