<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    include './db/db.php';
    include './php/func_book.php';

    session_start();

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $key = $_GET['search'];
        $books = search_books($conn, $key);
    } else {
        $books = get_books($conn);
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="books.css" />
    <link rel="stylesheet" href="nav.css" />
    <title>Books</title>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
</head>
<body>
    <div class="container">
        <nav class="links">
            <ul>
                <a href="./library.php">HOME</a>
                <a href="./about.php">ABOUT</a>
                <a href="./books.php">BOOKS</a>
                <a href="./contact.php">CONTACT</a>
                <a href="<?php echo ($_SESSION['user']['role'] === 'admin') ? './dashboard/books.php' : './dashboard/loans.php'; ?>">DASHBOARD</a>
                </ul>
            <div class="icons">
                <a href="#"><i class='bx bx-heart'></i></i></a>
                <a href="#"><i class='bx bx-cart'></i></a>
                <a href="./login.php" class="icons_login">Login</a>
            </div>
        </nav>
    </div>
    <div class="search-bar">
        <input type="search" placeholder="What are you looking for?">
        <a href="#" class="search-icon"><i class='bx bx-search'></i></a>
    </div>

    <img src="./images/Screenshot_3.png" class="foto1">


    <!-- BOOKS -->
    <div class="featured-books">
        <h1>Featured Books</h1>

        <?php if (count($books) === 0) { ?>
            <div class="empty_data">No data</div>
            <?php } ?>

            <?php if (count($books) > 0) { ?>
    <div class="featured-book-box">
        
        <?php foreach ($books as $book): ?>
        <div class="featured-book-card">
         <div class="featured-book-img">
                <img src="./uploads/<?php echo htmlspecialchars($book['image']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
            </div>

            <div class="featured-book-tag">
                <h2 class="tittle"><?php echo htmlspecialchars($book['title']); ?></h2>
                <p class="writer"><?php echo htmlspecialchars($book['author']); ?></p>
                
                <a href="./borrow.php?id=<?php echo htmlspecialchars($book['id']); ?>" class="f-btn">Read More</a>
        </div>
    </div>
<?php endforeach; ?>
</div>
<?php } ?>


          
    </div>

    <!-- BOOKS -->
    <div class="more-books">
        <img src="./images/bookss1.png" class="groups">
        <img src="./images/bookss2.png" class="groups">
        <img src="./images/bookss3.png" class="groups">
    </div>

    <!-- BESTSELLER -->

        <?php include './best_books.php'; ?>


        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
            <div class="footer-info">
                <div class="left-side">
                    <h2>THE LIBRARY STORE</h2>
                    <a href="">About Us</a>
                    <a href="">Contact Us</a>
                    <a href="">Library Foundation</a>
                    <a href="">Privacy Policy</a>
                    <a href="">Terms of Service</a>
                    <a href="">Refund policy</a>
                </div>

                <div class="middle-side">
                    <p>The Library Store is part of the Library Foundation of Pristina, which supports the Pristinas
                        Public Library</p>
                </div>

                <div class="right-side">
                    <h2>Keep in touch</h2>
                    <p>Never Miss a Beat! Sign up for our newsletter and be the first to hear about new products,
                        professional resources, limited edition merchandise, discounts and more when you sign up for our
                        emails</p>
                    <input type="email" placeholder="email@example.com" class="email">
                </div>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <script>
            $('.featured-book-box').slick({
                dots: true,
                slidesToShow: 5,
                slidesToScroll: 5
            })
        </script>
</body>

</html>