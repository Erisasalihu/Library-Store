<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    session_start();
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="nav.css" />
    <title>LIBRARY STORE</title>
</head>

<body>

    <section class="home">
        <div class="container">
        <?php include './includes/landing_nav.php'; ?>
            <div class="text-content">
                <div class="content">
                    <h1>LIBRARY-STORE</h1>
                    <p>In times when material possessions seem fleeting and uncertain, libraries stand as eternal
                        beacons of hope and wisdom, proving that the wealth of knowledge is the greatest treasure of all
                        therefore a library should never be considered a luxury, for it is, , one of life's deepest
                        necessities!</p>
                    <a class="learn-more" href="./about.php">Learn more</a>
                </div>
                <img src="./images/PHOTTO.png" alt="" class="right-image">
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="footer-info">
                <div class="left-side">
                    <h1>THE LIBRARY STORE</h1>
                    <a href="">About Us</a>
                    <a href="">Contact Us</a>
                    <a href="">Library Foundation</a>
                    <a href="">Privacy Policy</a>
                    <a href="">Terms of Service</a>
                    <a href="">Refund policy</a>
                </div>

                <div class="middle-side">
                    <p>The Library Store is part of the Library Foundation of Pristina, which supports the Pristinas
                        Public
                        Library</p>
                </div>

                <div class="right-side">
                    <h1>Keep in touch</h1>
                    <p>Never Miss a Beat! Sign up for our newsletter and be the first to hear about new products,
                        professional resources, limited edition merchandise, discounts and more when you sign up for our
                        emails</p>
                    <input type="email" placeholder="email@example.com" class="email">
                </div>
            </div>
        </div>
    </footer>
</body>

</html>