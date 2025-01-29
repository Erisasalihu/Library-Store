<?php
    session_start();

    if (!(isset($_SESSION['user'])) || $_SESSION['user']['role'] !== 'admin') {
        header("Location: ../library.php");
        exit;
    }

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
                <h1 class="content_title">Add book</h1>
                <form action="../php/add_book.php" method="post" class="add_book_form" enctype="multipart/form-data">
                    <div class="form_input_wrapper">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" type="text" placeholder="Image" />
                        <div class="image_preview_wrapper">
                            <img id="imagePreview" src="" alt="Image Preview" />
                            <button type="button" id="removeImage">
                                <i class="bi bi-trash3" style="color: red;"></i></button>
                        </div>
                    </div>
                    <div class="form_input_wrapper">
                        <label for="isbn">ISBN</label>
                        <input id="isbn" name="isbn" type="text" placeholder="ISBN" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" placeholder="Title" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="author">Author</label>
                        <input id="author" name="author" type="text" placeholder="Author" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="category">Category</label>
                        <input id="category" name="category" type="text" placeholder="Category" />
                    </div>

                    <div class="form_input_wrapper">
                        <label for="published_year">Published Year</label>
                        <input id="published_year" name="published_year" type="text" placeholder="Published Year" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="copies">Copies</label>
                        <input id="copies" name="copies" type="text" placeholder="Copies" />
                    </div>
                    <button type="submit" class="submit_button">Submit</button>
                </form>
            </div>
        </section>
    </main>

    <script src="../scripts/image_viewer.js"></script>
    <script src="../script.js"></script>
</body>

</html>