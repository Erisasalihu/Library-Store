<?php
    include '../db/db.php';
    include '../php/func_book.php';

    // if (!(isset($_SESSION['user'])) || $_SESSION['user']['role'] !== 'admin') {
    //     header("Location: ../index.php");
    //     exit;
    // }
    
    $book_id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : null;
    $book = get_book($conn, $book_id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Books</title>
    <link rel="stylesheet" href="../dashboard.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <main>
        <?php include '../includes/sidebar.php'; ?>
        <section class="content add_book">
            <div class="content_wrapper">
                <h1 class="content_title">Edit book</h1>
                <form action="../php/edit_book.php" method="post" class="add_book_form">
                    <input type="hidden" id="book_id" name="book_id" type="text"
                        value="<?php echo isset($book['id']) ? htmlspecialchars($book['id']) : ''; ?>" />

                    <div class="form_input_wrapper">
                        <label for="isbn">ISBN</label>
                        <input id="isbn" name="isbn" type="text" placeholder="ISBN"
                            value="<?php echo isset($book['isbn']) ? htmlspecialchars($book['isbn']) : ''; ?>" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" placeholder="Title"
                            value="<?php echo isset($book['title']) ? htmlspecialchars($book['title']) : ''; ?>" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="author">Author</label>
                        <input id="author" name="author" type="text" placeholder="Author"
                            value="<?php echo isset($book['author']) ? htmlspecialchars($book['author']) : ''; ?>" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="category">Category</label>
                        <input id="category" name="category" type="text" placeholder="Category"
                            value="<?php echo isset($book['category']) ? htmlspecialchars($book['category']) : ''; ?>" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="published_year">Published Year</label>
                        <input id="published_year" name="published_year" type="text" placeholder="Published Year"
                            value="<?php echo isset($book['published_year']) ? htmlspecialchars($book['published_year']) : ''; ?>" />
                    </div>
                    <button type="submit" class="submit_button">Submit</button>
                </form>
            </div>
        </section>
    </main>

    <script src="../script.js"></script>
</body>

</html>