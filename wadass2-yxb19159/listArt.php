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
        <h2 class="paddingh2">Listings</h2>
        <p>Here are the current listings available to order!</p>
        <p>All measurements are in millimetres.</p>
</div>
    <br>

    <?php
    //connect to database
    $host = "devweb2021.cis.strath.ac.uk";
    $user = "yxb19159";
    $pass = "ahro9eeHaing";
    $dbname = $user;
    $conn = new mysqli($host, $user, $pass, $dbname);

    if(!isset($_GET["page"]) || $_GET["page"]=='') {
        $page = 1;
    } else {
        $page  = $_GET["page"];
    }

    //issue the query
    $start = ($page-1) * 12;
    $sql = "SELECT * FROM `wadListings` ORDER BY ID ASC LIMIT $start, 12";
    $result = $conn->query($sql);

    //handle results
    if(!$result) {
        die("Query Failed: " . $conn->error);
    }

    if($result -> num_rows > 0){
        echo "<table>";
    }
    while ($row = $result -> fetch_assoc()) {
        ?>
    <div class="row"><?php
        echo "<p>". '<img src="data:image;base64,'.base64_encode($row['photo']).'" width="295" height="420" alt="photo" >' . "</p>";
        echo "<p>" . $row["name"] . "</p>";
        echo "<p>" . $row["price"] . "</p>";
        echo "<p> <form action='moreDetails.php' method='post'> <input type='hidden' name='id' value='" . $row["ID"] ."'/> <input type='hidden' name='pname' value='" . $row["name"] . "'/> <input type='submit' name='order' value='MORE'/></form>";
        ?>
    </div>

    <?php
    }
    $sql = "SELECT COUNT(ID) AS total FROM `wadListings`";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total= ceil($row["total"] / 12);

    ?>
    <br><br>
    <div class="pag">
        <?php
    if ($page!=1) {
        echo "<a href='listArt.php?page=".($page-1)."'>&laquo;</a>";
    }

    for ($i=1; $i<=$total; $i++) {
        echo "<a href='listArt.php?page=".$i."'> $i</a>";

    }

    if ($page!=$total) {
        echo "<a href='listArt.php?page=".($page+1)."'>&raquo;</a>";
    }
    $conn->close();

    ?>
    </div>
    <script>
        function getOrderId(ID) {
            let orderID = document.getElementById(ID).innerText;
            window.location.href = "details.php?orderID=" + orderID;
        }
    </script>
</main>
</body>
</html>