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

    $inventories = getInventories($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory</title>
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
                <h2 class="content_title">Inventory</h2>

                <div class="content_wrapper_top">
                    <input type="text" class="input_search" placeholder="Search" />
                </div>

                <table>
                    <thead>
                        <tr>
                            <th class="table_id">Id</th>
                            <th class="table_id">Book Id</th>
                            <th>Book ISBN</th>
                            <th>Book Name</th>
                            <th>Total Copies</th>
                            <th>Available Copies</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inventories as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['id']); ?></td>
                            <td><?php echo htmlspecialchars($item['book_id']); ?></td>
                            <td><?php echo htmlspecialchars($item['isbn']); ?></td>
                            <td><?php echo htmlspecialchars($item['title']); ?></td>
                            <td><?php echo htmlspecialchars($item['total_copies']); ?></td>
                            <td><?php echo htmlspecialchars($item['available_copies']); ?></td>
                            <td>
                                <div class="table_actions">
                                    <a href="./edit_inventory.php?id=<?php echo htmlspecialchars($item['id']); ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <?php if (count($inventories) > 0) { ?>
                <div class="table_count">
                    <?php echo "Total: " . count($inventories); ?>
                </div>
                <?php }?>
            </div>
        </section>
    </main>

    <script src="../script.js"></script>
</body>

</html>