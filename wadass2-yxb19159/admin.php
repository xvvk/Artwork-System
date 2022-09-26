<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <meta charset="UTF-8">
    <title>Cara Art Admin</title>
</head>
<body>

<!-- SIDEBAR -->
<nav>
    <h1 class="paddingh1"> <b>CARA <br> ART </b></h1>
    <ul>
        <li><a  href="home.php"> HOME </a></li>
        <li><a  href="listArt.php"> LISTINGS </a></li>
        <li><a  href="booking.php"> BOOKINGS </a></li>
        <li><a class="active" href="admin.php"> ADMIN </a></li>
    </ul>
</nav>

<main>
    <div class="container">
        <h2 class="paddingh2"><b> Administrator Only </b></h2>
    </div>

<?php
//connect to database
$host = "devweb2021.cis.strath.ac.uk";
$user = "yxb19159";
$pass = "ahro9eeHaing";
$dbname = $user;
$conn = new mysqli($host, $user, $pass, $dbname);
$password = isset($_POST["password"]) ? $conn->real_escape_string($_POST["password"]) : "";
//echo $_SERVER["REQUEST_METHOD"];
//issue the query
$sql = "SELECT * FROM `orderform`";
$result = $conn->query($sql);
if($_SERVER["REQUEST_METHOD"] === "GET"){
?>
    <form action="admin.php" method = "POST">
        <input type="password" id="pass" name="password" placeholder="PASSWORD" required> <br><br>
        <input type="submit" value="LOG IN">

    <?php
}else{
    if ($password === "caraART21") {
    //handle results
    if(!$result) {
    die("Query Failed: " . $conn->error);
}
    if($result -> num_rows > 0){
        echo "<table>";

?>
    <h3>List of Orders</h3>


    <table class="fill2">
        <thead>
    <tr>
        <th>ID</th>
        <th>Photo Name</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Address</th>
        <th>City</th>
        <th>Postcode</th>
        <th>Country</th>
    </tr>
        </thead>

        <button class="button" onclick="document.location='newPhotos.php'">ADD NEW LISTING</button>
        <button class="but" onclick="document.location='listBookings.php'">VIEW BOOKINGS</button>
        <button class="but2" onclick="document.location='log.php'">LOG OUT</button>

            <?php
        while ($row = $result->fetch_assoc()) {
            echo "<td>" . $row["ID"] . "</td>";
            echo "<td>" . $row["photoname"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["city"] . "</td>";
            echo "<td>" . $row["postcode"] . "</td>";
            echo "<td>" . $row["country"] . "</td>";
            echo "<tr>\n";
        }
    }
            echo "<table>\n";
                $conn->close();
}
    else{
        echo "INVALID PASSWORD";
        ?><button class="button" onclick="history.go(-1)">BACK</button><?php
    }
}
        ?>

    </form>
</main>
</body>
</html>