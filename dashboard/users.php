<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    include '../db/db.php';
    include '../php/func_user.php';

    session_start();

    if (!(isset($_SESSION['user'])) || $_SESSION['user']['role'] !== 'admin') {
        header("Location: ../index.php");
        exit;
    }


    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $key = $_GET['search'];
        $users = search_users($conn, $key);
    } else {
        $users = get_users($conn);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Users</title>
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
                <h2 class="content_title">Users</h2>
                <div class="content_wrapper_top">
                    <form action="./users.php">
                        <input type="text" name="search" class="input_search" placeholder="Search"
                            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" />
                    </form>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th class="table_id">Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Borrowed Books</th>
                            <th>Returned Books</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['id']); ?></td>
                            <td><?php echo htmlspecialchars($user['first_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['role']); ?></td>
                            <td><?php echo htmlspecialchars($user['borrowed_books']); ?></td>
                            <td><?php echo htmlspecialchars($user['returned_books']); ?></td>
                            <td>
                                <div class="table_actions">
                                    <a href="./edit_user.php?id=<?php echo htmlspecialchars($user['id']); ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <?php if ($user['role'] !== "admin" && $user['id'] !== intval($_SESSION['user']['id'])) { ?>
                                    <button onclick="showConfirmModal(<?php echo $user['id']; ?>)">
                                        <i class="bi bi-trash3" style="color: red;"></i>
                                    </button>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if (count($users) > 0) { ?>
                <div class="table_count">
                    <?php echo "Total: " . count($users); ?>
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