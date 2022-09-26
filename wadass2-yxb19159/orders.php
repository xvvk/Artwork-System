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
        <li><a  class="active" href="listArt.php"> LISTINGS </a></li>
        <li><a  href="booking.php"> BOOKINGS </a></li>
        <li><a  href="admin.php"> ADMIN </a></li>

    </ul>
</nav>

<main>
    <div class="container">
        <h2 class="paddingh2"><b> ORDER FORM </b></h2>
        </div>
<?php

$name = strip_tags(isset($_POST["name"]) ? $_POST["name"] : "");
$address = strip_tags(isset($_POST["address"]) ? $_POST["address"] : "");
$email = strip_tags(isset($_POST["email"]) ? $_POST["email"] : "");
$city = strip_tags(isset($_POST["city"]) ? $_POST["city"] : "");
$country = strip_tags(isset($_POST["country"]) ? $_POST["country"] : "");
$postcode = strip_tags(isset($_POST["postcode"]) ? $_POST["postcode"] : "");
$number = strip_tags(isset($_POST["number"]) ? $_POST["number"] : "");
$pName = strip_tags(isset($_POST["pname"]) ? $_POST["pname"] : "");
$pID = strip_tags(isset($_POST["id"]) ? $_POST["id"] : "");


if (($number === "") || ($email === "") || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        //ERROR CHECKING

    }

?>
    <form action="orders.php" method="POST">
        <input type="text" name="id" value="PHOTO ID: <?php echo $pID ;?>" readonly/> <br><br>
        <input type="text" name="pname" value="PHOTO NAME: <?php echo $pName;?>" readonly /><br><br>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" placeholder="NAME"> <br><br>
        <input type="text" id="number" name="number" value="<?php echo $number; ?>" placeholder="PHONE NUMBER" > <br><br>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" placeholder="EMAIL"><br><br>
        <input type="text" id="address" name="address" value="<?php echo $address; ?>" placeholder="ADDRESS"><br><br>
        <input type="text" id="city" name="city" value="<?php echo $city; ?>" placeholder="CITY"><br><br>
        <input type="text" id="postcode" name="postcode" value="<?php echo $postcode; ?>" placeholder="POSTCODE"><br><br>
        <input type="text" id="country" name="country" value="<?php echo $country; ?>" placeholder="COUNTRY"><br><br>
        <input id="submit" type="submit" value="PLACE ORDER!">

    <?php
} else {
        $host = "devweb2021.cis.strath.ac.uk";
        $user = "yxb19159";
        $pass = "ahro9eeHaing";
        $dbname = $user;
        $conn = new mysqli($host, $user, $pass, $dbname);
        $sql = "INSERT INTO `orderform` (`ID`, `photoname`, `name`, `phone`, `email`, `address`, `city`, `postcode`, `country` ) VALUES ('$pID', '$pName', '$name', '$number', '$email', '$address', '$city', '$postcode', '$country')";

        if ($conn->query($sql) === TRUE) {
            echo "<p> Order for  " . $pName . "  has been successfully placed. </p>";
            echo "<p> An email confirmation has been sent to the provided email address. </p>";
            echo "<p> Thank you for your custom! </p>";
            ?><button class="button" onclick="history.go(-1)">BACK</button><?php
        } else {
            die ("Error " . $conn->error);
        }
        $conn->close();
        mail($email, "Order Confirmation", "Hello " . $name  . ", Your order with $pID and $pName has been confirmed.");
}
    ?>
    </form>
    <button class="button" onclick="history.go(-1)">BACK</button>


</main>
</body>
</html>
