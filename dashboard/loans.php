<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    include '../db/db.php';
    include '../php/func_loan.php';

    session_start();

    if (!(isset($_SESSION['user']))) {
        header("Location: ../login.php");
        exit;
    }

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $key = $_GET['search'];
        $loans = search_loans($conn, $key, $_SESSION['user']);
    } else {
        $loans = get_loans($conn, $_SESSION['user']);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Loans</title>
    <link rel="stylesheet" href="../dashboard.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <main>
        <?php if (isset($_SESSION['success_message'])) { ?>
        <div class="alert success"><?= htmlspecialchars($_SESSION["success_message"]); ?></div>
        <?php unset($_SESSION['success_message']) ?>
        <?php } ?>

        <?php if (isset($_SESSION['error_message'])) { ?>
        <div class="alert error"><?=htmlspecialchars($_SESSION["error_message"]); ?></div>
        <?php unset($_SESSION['error_message']) ?>
        <?php } ?>

        <?php include '../includes/sidebar.php'; ?>
        <section class="content">
            <div class="content_wrapper">
                <h2 class="content_title">Loans</h2>
                <div class="content_wrapper_top">
                    <form action="./loans.php">
                        <input type="text" name="search" class="input_search" placeholder="Search"
                            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" />
                    </form>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th class="table_id">Id</th>
                            <th>ISBN</th>
                            <th>Title</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Loan Date</th>
                            <th>Return Date</th>
                            <th>Returned Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($loans as $loan): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($loan['id']); ?></td>
                            <td><?php echo htmlspecialchars($loan['isbn']); ?></td>
                            <td><?php echo htmlspecialchars($loan['title']); ?></td>
                            <td><?php echo htmlspecialchars($loan['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($loan['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($loan['loan_date']); ?></td>
                            <td><?php echo htmlspecialchars($loan['return_date']); ?></td>
                            <td><?php echo htmlspecialchars($loan['returned_date'] ?? 'Not returned'); ?></td>
                            <td>
                                <div class="table_actions">
                                    <?php if (empty($loan['returned_date'])): ?>
                                    <form action="../php/return_book.php" method="POST">
                                        <input type="hidden" name="loan_id"
                                            value="<?php echo htmlspecialchars($loan['id']); ?>" />
                                        <input type="hidden" name="book_id"
                                            value="<?php echo htmlspecialchars($loan['book_id']); ?>" />
                                        <button type="submit">Return</button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if (count($loans) > 0) { ?>
                <div class="table_count">
                    <?php echo "Total: " . count($loans); ?>
                </div>
                <?php }?>
                <?php if (count($loans) === 0) { ?>
                <div class="table_no_data">
                    No data
                </div>
                <?php }?>
            </div>
        </section>
    </main>

    <script src="../script.js"></script>
</body>

</html>