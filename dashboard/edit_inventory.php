<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
 
    session_start();

    if (!(isset($_SESSION['user'])) || $_SESSION['user']['role'] !== 'admin') {
        header("Location: ../library.php");
        exit;
    }
    include '../db/db.php';
    include '../php/func_inventory.php';
    
    $inventory_id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : null;
    $inventory = getInventory($conn, $inventory_id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Inventory</title>
    <link rel="stylesheet" href="../dashboard.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <main>
        <?php include '../includes/sidebar.php'; ?>
        <section class="content add_book">
            <div class="content_wrapper">
                <h1 class="content_title">Edit Inventory</h1>
                <form action="../php/edit_inventory.php" method="post" class="add_book_form">
                    <input type="hidden" id="id" name="id" type="text"
                        value="<?php echo isset($inventory['id']) ? htmlspecialchars($inventory['id']) : ''; ?>" />

                    <div class="form_input_wrapper">
                        <label for="book_id">Book Id</label>
                        <input id="book_id" name="book_id" type="text" placeholder="Book Id" disabled
                            value="<?php echo isset($inventory['book_id']) ? htmlspecialchars($inventory['book_id']) : ''; ?>" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="isbn">ISBN</label>
                        <input id="isbn" name="isbn" type="text" placeholder="ISBN" disabled
                            value="<?php echo isset($inventory['isbn']) ? htmlspecialchars($inventory['isbn']) : ''; ?>" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" placeholder="Title" disabled
                            value="<?php echo isset($inventory['title']) ? htmlspecialchars($inventory['title']) : ''; ?>" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="author">Author</label>
                        <input id="author" name="author" type="text" placeholder="Author" disabled
                            value="<?php echo isset($inventory['author']) ? htmlspecialchars($inventory['author']) : ''; ?>" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="copies">Copies</label>
                        <input id="copies" name="copies" type="text" placeholder="Copies"
                            value="<?php echo isset($inventory['total_copies']) ? htmlspecialchars($inventory['total_copies']) : ''; ?>" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="available_copies">Available Copies</label>
                        <input id="available_copies" name="available_copies" type="text" placeholder="Available Copies"
                            value="<?php echo isset($inventory['available_copies']) ? htmlspecialchars($inventory['available_copies']) : ''; ?>" />
                    </div>
                    <button type="submit" class="submit_button">Submit</button>
                </form>
            </div>
        </section>
    </main>

    <script src="../script.js"></script>
</body>

</html>