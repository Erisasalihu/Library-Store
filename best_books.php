<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $most_wanted_books = get_books_most_borrowed_books($conn);
?>

<?php if ((count($most_wanted_books) > 0) && (!isset($_GET['search']) || empty($_GET['search']))) { ?>
<h1 class="landing_content_header">The most wanted books</h1>
<div class="books">
    <?php foreach ($most_wanted_books as $mw_book): ?>
    <div class="book">
        <img src="./uploads/<?php echo htmlspecialchars($mw_book['image']); ?>" alt="" />
        <div class="book_info">
            <div class="book_info_title"><?php echo htmlspecialchars($mw_book['title']); ?></div>
            <div class="book_info_author"><?php echo htmlspecialchars($mw_book['author']); ?></div>
            <div class="book_info_category"><?php echo htmlspecialchars($mw_book['category']); ?></div>

            <a href="./borrow.php?id=<?php echo htmlspecialchars($mw_book['id']); ?>" class="book_info_cart">
                <p>Details</p>
            </a>

        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php } ?>