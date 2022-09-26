<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <meta charset="UTF-8">
    <title>Cara Art Listings</title>
</head>
<body>

<!-- SIDEBAR -->
<nav>
    <h1 class="paddingh1"> <b>CARA <br> ART </b></h1>
    <ul>
        <li><a  href="home.php"> HOME </a></li>
        <li><a  class="active" href="listArt.php"> LISTINGS </a></li>
        <li><a  href="booking.php"> BOOKINGS </a></li>
        <li><a  href="admin.php"> ADMIN </a></li>
    </ul>
</nav>

<main>
<div class="container">
    <h2 class="paddingh2">Details of Photo</h2>
</div>

    <?php

    $host = "devweb2021.cis.strath.ac.uk";
    $user = "yxb19159";
    $pass = "ahro9eeHaing";
    $dbname = $user;
    $conn = new mysqli($host, $user, $pass, $dbname);
    $id = strip_tags(isset($_POST["id"]) ? $_POST["id"] : "");

    $sql = "SELECT * FROM `wadListings` WHERE ID = '$id'";
    $result = $conn->query($sql);
    if ($result ->num_rows >0) {
        echo "<table>";
    }
    while ($row = $result -> fetch_assoc()) {
        ?>
<div class="middle"><?php
        echo "<p>" . '<img src="data:image;base64,'.base64_encode($row['photo']).'" width="295" height="420" alt="photo" >' . "</p>";
        echo "<p>" . $row["name"] . "</p>";
        echo "<p>" . $row["date"] . "</p>";
        echo "<p>" . $row["width"] . "mm x ".$row["height"]."mm</p>";
        echo "<p>" . $row["price"] . "</p>";
        echo "<p>" . $row["description"] . "</p>";
        echo "<p> <form action='orders.php' method='post'> <input type='hidden' name='id' value='" . $row["ID"]
            ."'/> <input type='hidden' name='pname' value='" . $row["name"] . "'/> <input type='submit' name='order' value='ORDER'/></form>";
        }
    ?>
</div>
<?php
$conn->close();
    ?>
    <button class="button" onclick="history.go(-1)">BACK</button>
</main>
</body>
</html>