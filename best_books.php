<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $most_wanted_books = get_books_most_borrowed_books($conn);
    if (count($most_wanted_books) === 0) {
        $most_wanted_books = get_books($conn);
    }
?>

<?php if ((count($most_wanted_books) > 0) && (!isset($_GET['search']) || empty($_GET['search']))) { ?>
    <div class="featured-books">
        <h1>Bestsellers</h1>

        <div class="featured-book-box">
    <?php foreach ($most_wanted_books as $mw_book): ?>
        <div class="featured-book-card">
         <div class="featured-book-img">
                <img src="./uploads/<?php echo htmlspecialchars($mw_book['image']); ?>" alt="<?php echo htmlspecialchars($mw_book['title']); ?>">
            </div>

            <div class="featured-book-tag">
                <h2 class="tittle"><?php echo htmlspecialchars($mw_book['title']); ?></h2>
                <p class="writer"><?php echo htmlspecialchars($mw_book['author']); ?></p>
                
                <a href="./borrow.php?id=<?php echo htmlspecialchars($mw_book['id']); ?>" class="f-btn">Read More</a>
        </div>
    </div>
    <?php endforeach; ?>
    </div>
    </div>
<?php } ?>