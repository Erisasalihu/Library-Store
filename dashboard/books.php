<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    include '../db/db.php';
    include '../php/func_book.php';

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Books</title>
    <link rel="stylesheet" href="../dashboard.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <main>
        <?php if (isset($_SESSION['success_message'])) { ?>
        <div class="alert success"><?= htmlspecialchars($_SESSION["success_message"]); ?></div>
        <?php unset($_SESSION['success_message']); ?>
        <?php } ?>

        <?php if (isset($_SESSION['error_message'])) { ?>
        <div class="alert error"><?=htmlspecialchars($_SESSION["error_message"]); ?></div>
        <?php unset($_SESSION['error_message']); ?>
        <?php } ?>

        <?php include '../includes/sidebar.php'; ?>
        <section class="content">
            <div class="content_wrapper">
                <h2 class="content_title">Books</h2>
                <div class="content_wrapper_top">
                    <form action="./books.php">
                        <input type="text" name="search" class="input_search" placeholder="Search"
                            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" />
                    </form>
                    <a href="./add_book.php">Add book</a>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th class="table_id">Id</th>
                            <th>ISBN</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Published Year</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($book['id']); ?></td>
                            <td><?php echo htmlspecialchars($book['isbn']); ?></td>
                            <td><?php echo htmlspecialchars($book['title']); ?></td>
                            <td><?php echo htmlspecialchars($book['author']); ?></td>
                            <td><?php echo htmlspecialchars($book['category']); ?></td>
                            <td><?php echo htmlspecialchars($book['published_year']); ?></td>
                            <td>
                                <div class="table_actions">
                                    <a href="./edit_book.php?id=<?php echo htmlspecialchars($book['id']); ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button onclick="showConfirmModal(<?php echo $book['id']; ?>)">
                                        <i class="bi bi-trash3" style="color: red;"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if (count($books) > 0) { ?>
                <div class="table_count">
                    <?php echo "Total: " . count($books); ?>
                </div>
                <?php }?>
                <?php if (count($books) === 0) { ?>
                <div class="table_no_data">
                    No data
                </div>
                <?php }?>
            </div>
        </section>
    </main>
    <?php include "../includes/confirm_modal.php" ?>

    <script src="../scripts/confirmModal.js"></script>
    <script src="../script.js"></script>
</body>

</html>