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
        <li><a  href="listArt.php"> LISTINGS </a></li>
        <li><a  href="booking.php"> BOOKINGS </a></li>
        <li><a  class="active" href="admin.php"> ADMIN </a></li>
    </ul>
</nav>

<main>
    <div class="container">
        <h2 class="paddingh2">Bookings</h2>
        <p>Here are the current bookings!</p>

    </div>
    <br>

    <?php

    //connect to database
    $host = "devweb2021.cis.strath.ac.uk";
    $user = "yxb19159";
    $pass = "ahro9eeHaing";
    $dbname = $user;
    $conn = new mysqli($host, $user, $pass, $dbname);

    //issue the query
    $sql = "SELECT * FROM `bookingform`";
    $result = $conn->query($sql);

    //handle results
    if(!$result) {
        die("Query Failed: " . $conn->error);
    }

    if($result -> num_rows > 0){

    ?>
    <table class="fill2">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
        </thead>

<?php
while ($row = $result -> fetch_assoc()) {

    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["number"] . "</td>";
    echo "<td>" . $row["date"] . "</td>";
    echo "<td>" . $row["time"] . "</td>";
    echo "<tr>";
}
$conn->close();
}
?>
    </table>
    <button class="button" onclick="history.go(-1)">BACK</button>
</main>
</body>
</html>
