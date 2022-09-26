<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <meta charset="UTF-8">
    <title>Cara Art Bookings</title>
</head>
<body>

<!-- SIDEBAR -->
<nav>
    <h1 class="paddingh1"> <b>CARA <br> ART </b></h1>
    <ul>
        <li><a  href="home.php"> HOME </a></li>
        <li><a  href="listArt.php"> LISTINGS </a></li>
        <li><a  class ="active" href="booking.php"> BOOKINGS </a></li>
        <li><a  href="admin.php"> ADMIN </a></li>
    </ul>
</nav>

<main>
    <div class="container">
        <h2 class="paddingh2"><b> Booking Form </b></h2>
        <p>Would like to visit the gallery?</p>
        <p>Fill out the form below!</p>
    </div>

        <?php


    $id = strip_tags(isset($_POST["id"]) ? $_POST["id"] : "");
    $name = strip_tags(isset($_POST["name"]) ? $_POST["name"] : "");
    $number = strip_tags(isset($_POST["number"]) ? $_POST["number"] : "");
    $email = strip_tags(isset($_POST["email"]) ? $_POST["email"] : "");
    $date = strip_tags(isset($_POST["date"]) ? $_POST["date"] : "");
    $time = strip_tags(isset($_POST["time"]) ? $_POST["time"] : "");

        if (($number === "") || empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            //VALIDATION CHECKS

        }
?>

    <form action="booking.php" method="POST">
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" placeholder="NAME"> <br><br>
        <input type="text" id="number" name="number" value="<?php echo $number; ?>" placeholder="PHONE NUMBER" > <br><br>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" placeholder="EMAIL"><br><br>
        <input type="date" id="date" name="date" value="<?php echo $date; ?>" >
        <small>Opened Everyday</small><br><br>
        <input type="time" id="time" name="time" value="<?php echo $time; ?>" min="10:00" max="17:00" required>
        <small>Opening Hours: 10am - 5pm</small><br><br>
        <input id="submit" type="submit" value="BOOK NOW!">

    <?php
    }else{
        //connect to database
        $host = "devweb2021.cis.strath.ac.uk";
        $user = "yxb19159";
        $pass = "ahro9eeHaing";
        $dbname = $user;
        $conn = new mysqli($host, $user, $pass, $dbname);

        $sql = "INSERT INTO `bookingform` (`name`, `number`, `email`, `date`, `time` ) VALUES ('$name', '$number', '$email', '$date', '$time')";
            if ($conn->query($sql) === TRUE) {
                echo "<p> Your booking to view at the gallery on  " . $date . "  has been successfully placed. </p>";
                echo "<p> An email confirmation has been sent to the provided email address. </p>";
                echo "<p> Thank you for your custom! </p>";
                ?><button class="button" onclick="history.go(-1)">BACK</button><?php
            } else {
                die ("Error " . $conn->error);
        }
        $conn->close();
        mail($email, "Booking Confirmation", "Hello $name, your booking with Cara Art on $date at $time has been confirmed.");
}
    ?>
    </form>
</main>
</body>
</html>
