<nav class="links">
            <ul>
                <a href="./library.php">HOME</a>
                <a href="./about.php">ABOUT</a>
                <a href="./books.php">BOOKS</a>
                <a href="./contact.php">CONTACT</a>
                <a href="<?php echo (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') ? './dashboard/books.php' : './dashboard/loans.php'; ?>">DASHBOARD</a>
                </ul>
            <div class="icons">
                <?php if (!isset($_SESSION['user'])) { ?>
                  <a href="./login.php" class="icons_login">Login</a>
                <?php } ?>
            </div>
        </nav>