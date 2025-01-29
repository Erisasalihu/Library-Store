<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    include './db/db.php';
    include './php/func_inventory.php';
    include './php/func_book.php';

    session_start();

    $book_id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : null;
    $book = getInventoryBook($conn, $book_id);

    $datesError = isset($_SESSION['validation_errors']['dates']) ? $_SESSION['validation_errors']['dates'] : null;

    unset($_SESSION['validation_errors']);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Store</title>

    <link rel="stylesheet" href="./borrow.css">
    <link rel="stylesheet" href="./books.css">
    <link rel="stylesheet" href="nav.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
</head>

<body>
    <main>
    <div class="container">

    <?php include './includes/landing_nav.php'; ?>

        <section class="landing_content borrow_section">
            <button class="back">
                <i class="bi bi-arrow-left"></i>
                <span>Back</span>
                <a href="./library.php" id="redirectLink" style="display: none;">Go to Example</a>
            </button>
            <div class="borrow">
                <img src="./uploads/<?php echo htmlspecialchars($book['image']); ?>" alt="" class="borrow_img">
                <div class="borrow_details">
                    <h2 class="borrow_details_title"><?php echo htmlspecialchars($book['title']); ?></h2>
                    <h4 class="borrow_details_desc"><?php echo htmlspecialchars($book['description']); ?></h4>

                    <div class="borrow_details_info">
                        <div>
                            <label>ISBN</label>
                            <h4>
                                <?php echo htmlspecialchars($book['isbn']); ?>
                            </h4>
                        </div>
                        <div>
                            <label>Author</label>
                            <h4>
                                <?php echo htmlspecialchars($book['author']); ?>
                            </h4>
                        </div>
                        <div>
                            <label>Category</label>
                            <h4>
                                <?php echo htmlspecialchars($book['category']); ?>
                            </h4>
                        </div>
                        <div>
                            <label>Published Year</label>
                            <h4>
                                <?php echo htmlspecialchars($book['published_year']); ?>
                            </h4>
                        </div>
                    </div>
                    <form action="./php/borrow.php" method="post">
                        <h4>Borrow</h4>
                        <div>
                            <label for="from">From</label>
                            <input type="date" name="from" id="from">
                        </div>
                        <div>
                            <label for="to">To</label>
                            <input type="date" name="to" id="to">
                        </div>
                        <?php if ($datesError): ?>
                        <p style="color: red;"><?= htmlspecialchars($datesError); ?></p>
                        <?php endif; ?>

                        <?php if ($book['available_copies'] === 0): ?>
                        <p style="color: red;">This book is not available</p>
                        <?php endif; ?>

                        <input type="hidden" name="book_id"
                            value="<?php echo isset($book_id) ? htmlspecialchars($book_id) : ''; ?>" />
                        <button type="submit" class="book_info_cart"
                            <?php if (!(isset($_SESSION['user'])) || $book['available_copies'] === 0){ ?> disabled
                            <?php   } ?>>
                            <i class="bi bi-cart"></i>
                            <p>Borrow</p>
                        </button>
                    </form>
                </div>
            </div>
            <?php include './best_books.php'; ?>

        </section>
        </div>
    </main>

    <script>
    const backButton = document.querySelector('.back');

    backButton.addEventListener('click', function() {
        if (window.history.length > 2) {
            window.history.back();
            return;
        }
        document.getElementById('redirectLink').click();
    })
    </script>

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