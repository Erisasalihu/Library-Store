<?php
    $current_file = basename($_SERVER['PHP_SELF']);
    $users_files = ['users.php', 'edit_user.php'];
    $books_files = ['books.php', 'edit_book.php', 'add_book.php'];
    $inventory_files = ['inventory.php', 'edit_inventory.php'];
    $loans_files = ['loans.php'];
?>

<nav class="dashboard_nav">
    <div class="nav_header">
        <h3>Library Store</h3>
        <i class="bi bi-list"></i>
    </div>
    <div class="nav_items">
        <ul>
            <?php if ($_SESSION['user']['role'] === 'admin') : ?>
            <li class="<?php echo (in_array($current_file, $users_files)) ? 'active' : ''; ?>">
                <a href="../dashboard/users.php">
                    <i class="bi bi-person"></i>
                    <p>Users</p>
                </a>
            </li>
            <li class="<?php echo (in_array($current_file, $books_files)) ? 'active' : ''; ?>">
                <a href="../dashboard/books.php">
                    <i class="bi bi-book"></i>
                    <p>Books</p>
                </a>
            </li>
            <li class="<?php echo (in_array($current_file, $inventory_files)) ? 'active' : ''; ?>">
                <a href="../dashboard/inventory.php">
                    <i class="bi bi-box"></i>
                    <p>Inventory</p>
                </a>
            </li>
            <?php endif; ?>

            <li class="<?php echo (in_array($current_file, $loans_files)) ? 'active' : ''; ?>">
                <a href="../dashboard/loans.php">
                    <i class="bi bi-card-checklist"></i>
                    <p>Loans</p>
                </a>
            </li>
        </ul>

        <ul>
            <li>
                <a href="../library.php">
                    <i class="bi bi-arrow-left"></i>
                    <p>Web</p>
                </a>
            </li>
            <li>
                <a href="../logout.php">
                    <i class="bi bi-box-arrow-left"></i>
                    <p>Log out</p>
                </a>
            </li>
        </ul>
    </div>
</nav>