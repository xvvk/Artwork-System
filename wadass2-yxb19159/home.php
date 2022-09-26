<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="design.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<title>Cara Art Home</title>

<body>

<!-- SIDEBAR -->
<nav>
    <h1 class="paddingh1"> <b>CARA <br> ART </b></h1>
    <ul>
        <li><a  class ="active" href="home.php"> HOME </a></li>
        <li><a  href="listArt.php"> LISTINGS </a></li>
        <li><a  href="booking.php"> BOOKINGS </a></li>
        <li><a  href="admin.php"> ADMIN </a></li>
    </ul>
</nav>

<main>
    <div class="container">
        <h2 class="paddingh2"><b> WHO IS CARA? </b></h2>
            <p> I am a freelance photographer who captures depth and meaning in a photo.<br><br>
                Allowing you to see everyday objects from a new perspective.<br><br>
                I ensure you with high quality photos by using different lenses to capture the perfect shot.<br><br>
                Art listings and bookings for gallery are available.
             </p>
    </div>

    <div class="slideshow">
        <div class="myphotos fade">
            <img src="photos/mercedes.jpg" width="370" height="540" alt="mercedes" class="center">
            <div class="text">Mercedes</div>
        </div>
        <div class="myphotos fade">
            <img src="photos/coffee.jpg" width="370" height="540"  alt="coffee" class="center">
            <div class="text">Coffee</div>
        </div>
        <div class="myphotos fade">
            <img src="photos/hand.jpg" width="370" height="540" alt="hand" class="center">
            <div class="text">Hand & Leaf</div>
        </div>
        <div class="myphotos fade">
            <img src="photos/chair.jpg" width="370" height="540" alt="chair" class="center">
            <div class="text">Chair</div>
        </div>
        <div class="myphotos fade">
            <img src="photos/magazine.jpg" width="370" height="540" alt="magazine" class="center">
            <div class="text">Magazine</div>
        </div>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <button class="button" onclick="document.location='admin.php'">ADMIN LOGIN</button>

    <script>
        var slideIndex = 0;
        slide();

        function slide() {
            var i;
            var slides = document.getElementsByClassName("myphotos");
            var indicators = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            for (i = 0; i < indicators.length; i++) {
                indicators[i].className = indicators[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            indicators[slideIndex-1].className += " active";
            setTimeout(slide, 3000);
        }
    </script>

</main>
</body>
</html>