<?php
    include '../db/db.php';
    include '../php/func_user.php';

    if (!(isset($_SESSION['user'])) || $_SESSION['user']['role'] !== 'admin') {
        header("Location: ../index.php");
        exit;
    }
    
    $user_id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : null;
    $user = get_user($conn, $user_id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit User</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <main>
        <?php include '../includes/sidebar.php'; ?>
        <section class="content add_book">
            <div class="content_wrapper">
                <h1 class="content_title">Edit user</h1>
                <form action="../php/edit_user.php" method="post" class="add_book_form">
                    <input type="hidden" id="id" name="id" type="text"
                        value="<?php echo isset($user['id']) ? htmlspecialchars($user['id']) : ''; ?>" />

                    <div class="form_input_wrapper">
                        <label for="first_name">First Name</label>
                        <input id="first_name" name="first_name" type="text" placeholder="First Name"
                            value="<?php echo isset($user['first_name']) ? htmlspecialchars($user['first_name']) : ''; ?>" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" name="last_name" type="text" placeholder="Last Name"
                            value="<?php echo isset($user['last_name']) ? htmlspecialchars($user['last_name']) : ''; ?>" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text" placeholder="Email"
                            value="<?php echo isset($user['email']) ? htmlspecialchars($user['email']) : ''; ?>" />
                    </div>
                    <div class="form_input_wrapper">
                        <label for="role">Role</label>
                        <select id="role" name="role">
                            <option value="admin"
                                <?php echo isset($user['role']) && $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin
                            </option>
                            <option value="user"
                                <?php echo isset($user['role']) && $user['role'] === 'user' ? 'selected' : ''; ?>>User
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="submit_button">Submit</button>
                </form>
            </div>
        </section>
    </main>

    <script src="../script.js"></script>
</body>

</html>