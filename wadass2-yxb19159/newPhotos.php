<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="design.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <meta charset="UTF-8">
    <title>Place an order</title>
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
        <h2 class="paddingh2"><b> ADD NEW LISTING </b></h2>
        <p>All measurements are in millimetres.</p>
    </div>


    <?php

    $photo = strip_tags(isset($_FILE["photo"]) ? $_FILE["photo"] : "");
    $id = strip_tags(isset($_POST["id"]) ? $_POST["id"] : "");
    $name = strip_tags(isset($_POST["name"]) ? $_POST["name"] : "");
    $date = strip_tags(isset($_POST["date"]) ? $_POST["date"] : "");
    $width = strip_tags(isset($_POST["width"]) ? $_POST["width"] : "");
    $height = strip_tags(isset($_POST["height"]) ? $_POST["height"] : "");
    $price = strip_tags(isset($_POST["price"]) ? $_POST["price"] : "");
    $description = strip_tags(isset($_POST["description"]) ? $_POST["description"] : "");

    if (($width === "") || ($height === "") || empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        //VALIDATION CHECKS

    }
    ?>
    <form action="newPhotos.php" method="POST" enctype="multipart/form-data">
        <input type="file" id="photo" name="photo" accept="image/jpeg value=<?php echo $photo ?>" required><br><br>
        <input type="text" id="id" name="id" value="<?php echo $id; ?>" placeholder="ID"><br><br>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" placeholder="NAME"><br><br>
        <input type="text" id="date" name="date" value="<?php echo $date; ?>" placeholder="DATE">
        <small>Example: 29-12-2017</small><br><br>
        <input type="text" id="width" name="width" value="<?php echo $width; ?>" placeholder="WIDTH">
        <small>Width is always 370</small><br><br>
        <input type="text" id="height" name="height" value="<?php echo $height; ?>" placeholder="HEIGHT">
        <small>Height is always 540</small><br><br>
        <input type="text" id="price" name="price" value="<?php echo $price; ?>" placeholder="PRICE"><br><br>
        <input type="text" id="description" name="description" value="<?php echo $description; ?>" placeholder="DESCRIPTION"><br><br>
        <input id="submit" type="submit" value="ADD LISTING">

        <?php
        } else {
            $host = "devweb2021.cis.strath.ac.uk";
            $user = "yxb19159";
            $pass = "ahro9eeHaing";
            $dbname = $user;
            $conn = new mysqli($host, $user, $pass, $dbname);
            $sql = "INSERT INTO `wadListings` (`photo`, `ID`, `name`, `date`, `width`, `height`, `price`, `description`) VALUES ('$photo', '$id', '$name', '$date', '$width', '$height', '$price', '$description')";

            if ($conn->query($sql) === TRUE) {
                echo "<p> Listing has been successfully added to the database. </p>";
                ?><button class="button" onclick="history.go(-1)">BACK</button><?php
            } else {
                die ("Error " . $conn->error);
            }
            $conn->close();
        }
        ?>
    </form>
    <button class="button" onclick="history.go(-1)">BACK</button>

</main>
</body>
</html>