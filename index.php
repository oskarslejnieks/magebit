<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script src="script.js"></script>
    <script src="https://use.fontawesome.com/31621d391b.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Home Page</title>
</head>

<body>
    <div class="container">
        <div class="left-container">
            <header>
                <div class="logo">
                    <img src="images/logo.png" alt="">
                    <p>pineapple.</p>
                </div>
                <div class="header">
                    <a href="#">About</a>
                    <a href="#">How it works</a>
                    <a href="#">Contact</a>
                </div>
            </header>
            <section id="section">
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'none') {
                        echo '<img class="cupImage" id="img" src="images/cup.png" alt=""">
                        <h1 id="heading1">Thanks for subscribing!</h1>
                        <p id="paragraph1">You have successfully subscribed to our email listing. Check your email for the discount code.</p>';
                    } elseif ($_GET['error'] == 'emptyinput') {
                        echo '<img class="cupImage" id="img" src="images/cup.png" alt="" style="display:none">
                        <h1 id="heading1">Subscribe to newsletter</h1>
                        <p id="paragraph1">Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>';
                        include_once 'content/test.php';
                    } elseif ($_GET['error'] == 'emptycheckbox') {
                        echo '<img class="cupImage" id="img" src="images/cup.png" alt="" style="display:none">
                        <h1 id="heading1">Subscribe to newsletter</h1>
                        <p id="paragraph1">Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>';
                        include_once 'content/test.php';
                    } elseif ($_GET['error'] == 'invalidemail') {
                        echo '<img class="cupImage" id="img" src="images/cup.png" alt="" style="display:none">
                        <h1 id="heading1">Subscribe to newsletter</h1>
                        <p id="paragraph1">Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>';
                        include_once 'content/test.php';
                    } elseif ($_GET['error'] == 'invalidcoemail') {
                        echo '<img class="cupImage" id="img" src="images/cup.png" alt="" style="display:none">
                        <h1 id="heading1">Subscribe to newsletter</h1>
                        <p id="paragraph1">Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>';
                        include_once 'content/test.php';
                    }
                } else {
                    echo '<img class="cupImage" id="img" src="images/cup.png" alt="" style="display:none">
                    <h1 id="heading1">Subscribe to newsletter</h1>
                    <p id="paragraph1">Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>';
                    include_once 'content/test.php';
                }

                ?>


                <div class="media">
                    <div class="sp1" id="icon1"><a href="#"><span><i class="fa fa-facebook-f"></i></span></a></div>
                    <div class="sp2" id="icon2"><a href="#"><span><i class="fa fa-instagram"></i></span></a></div>
                    <div class="sp3" id="icon3"><a href="#"><span><i class="fa fa-twitter"></i></span></a></div>
                    <div class="sp4" id="icon4"><a href="#"><span><i class="fa fa-youtube-play"></i></span></a></div>
                </div>
            </section>

        </div>
        <div class="right-container">
            <a href="output.php">See emails</a>
        </div>
    </div>
</body>

</html>