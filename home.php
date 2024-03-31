<?php
session_start();

require_once("header.php");
require_once("connectDB.php");
require_once("functions.php");
require_once("message.php");


$subjects = array(
    "Math" => "img/math.png",
    "Programming" => "img/programming.png",
    "Database" => "img/database.png",
    "English" => "img/english.png",
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, <?php echo $_SESSION['username']; ?>!</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        .subject-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .subject {
            width: 200px;
            margin: 10px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
        }

        .subject img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<h1>Vítej ve svém školním systému, <?php echo $_SESSION['username']; ?>!</h1>

<div class="subject-container">
    <?php foreach ($subjects as $name => $image) : ?>
        <div class="subject">
            <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
            <p><?php echo $name; ?></p>
        </div>
    <?php endforeach; ?>
</div>

<p>

</body>
</html>
