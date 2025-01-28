<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include './db/db.php';
include './php/func_user.php';

session_start();

if (isset($_SESSION['user'])) {
    header("Location: ./dashboard/books.php");
    exit;
}

$errors = [];
$loginForm = isset($_POST['loginForm']);
$registerForm = isset($_POST['registerForm']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $loginForm) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    }
    if (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    }
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }

    if (empty($errors)) {
        $user = get_user_by_email($conn, $email);
        if ($user) {
            // Verify password
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user; 
                header("Location: ./library.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Invalid username or password.";
            }
        } else {
            $_SESSION['error_message'] = "User doesn't exist.";
        }
    } else {
        $_SESSION['validation_errors'] = $errors; // Store validation errors
    }
    $loginEmailError = isset($_SESSION['validation_errors']['email']) ? $_SESSION['validation_errors']['email'] : null;
    $loginPasswordError = isset($_SESSION['validation_errors']['password']) ? $_SESSION['validation_errors']['password'] : null;
    
    // Clear validation errors after displaying
    unset($_SESSION['validation_errors']);
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && $registerForm) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($first_name)) {
        $errors['first_name'] = "First Name is required.";
    } 
    if (empty($last_name)) {
        $errors['last_name'] = "Last Name is required.";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    }
    if (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    }
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }
    

    if (empty($errors)) {
        // check if user is already registered
        $user = get_user_by_email($conn, $email);

        if ($user) {
            $errors['email'] = "Email already exists.";
            $_SESSION['error_message'] = "Email already exists.";
            header("Location: ./login.php");
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$first_name, $last_name, $email, $hashedPassword]);
    
        if ($res) {
            $_SESSION['success_message'] = "Registration successful! You can now log in.";
            header("Location: ./login.php");
            exit;
        } else {
            $_SESSION['error_message'] = "Registration failed: " . $stmt->error;
        }
    } else {
        $_SESSION['validation_errors'] = $errors;
    }
    
    $firstNameError = isset($_SESSION['validation_errors']['first_name']) ? $_SESSION['validation_errors']['first_name'] : null;
    $lastNameError = isset($_SESSION['validation_errors']['last_name']) ? $_SESSION['validation_errors']['last_name'] : null;
    $emailError = isset($_SESSION['validation_errors']['email']) ? $_SESSION['validation_errors']['email'] : null;
    $passwordError = isset($_SESSION['validation_errors']['password']) ? $_SESSION['validation_errors']['password'] : null;

    unset($_SESSION['validation_errors']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="./login.css" />
    <title>LOGIN</title>
</head>

<body>
    <a href="library.php" class="back-arrow">
        <i class="fa-solid fa-arrow-left"></i>
    </a>

    <?php if (isset($_SESSION['success_message'])) { ?>
    <div class="alert success"><?= htmlspecialchars($_SESSION["success_message"]); ?></div>
    <?php unset($_SESSION['success_message']) ?>
    <?php } ?>

    <?php if (isset($_SESSION['error_message'])) { ?>
    <div class="alert error"><?=htmlspecialchars($_SESSION["error_message"]); ?></div>
    <?php unset($_SESSION['error_message']) ?>
    <?php } ?>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="./login.php" method="post" class="auth_container_box register_form">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registeration</span>
                <div class="input-wrapper">
                    <input id="register-first-name" name="first_name" type="text" placeholder="First Name" />
                    <div class="input-error"></div>
                    <?php if (!empty($firstNameError)): ?>
                    <p style="color: red;"><?= htmlspecialchars($firstNameError); ?></p>
                    <?php endif; ?>
                </div>
                <div class="input-wrapper">
                    <input id="register-last-name" name="last_name" type="text" placeholder="Last Name" />
                    <div class="input-error"></div>
                    <?php if (!empty($lastNameError)): ?>
                    <p style="color: red;"><?= htmlspecialchars($lastNameError); ?></p>
                    <?php endif; ?>
                </div>
                <div class="input-wrapper">
                    <input id="register-email" name="email" type="email" placeholder="Email" />
                    <div class="input-error"></div>
                    <?php if (!empty($emailError)): ?>
                    <p style="color: red;"><?= htmlspecialchars($emailError); ?></p>
                    <?php endif; ?>
                </div>
                <div class="input-wrapper">
                    <input id="register-password" name="password" type="password" placeholder="Password" />
                    <div class="input-error"></div>
                    <?php if (!empty($passwordError)): ?>
                    <p style="color: red;"><?= htmlspecialchars($passwordError); ?></p>
                    <?php endif; ?>
                </div>
                <input type='hidden' name='registerForm' />
                <button id="form-register-btn">Register</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="./login.php" method="post" class="auth_container_box login_form">
                <h1>Login</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <div class="input-wrapper">
                    <input id="login-email" name="email" type="email" placeholder="Email" />
                    <div class="input-error"></div>
                    <?php if (!empty($loginEmailError)): ?>
                    <p style="color: red;"><?= htmlspecialchars($loginEmailError); ?></p>
                    <?php endif; ?>
                </div>
                <div class="input-wrapper">
                    <input id="login-password" name="password" type="password" placeholder="Password" />
                    <div class="input-error"></div>
                    <?php if (!empty($loginPasswordError)): ?>
                    <p style="color: red;"><?= htmlspecialchars($loginPasswordError); ?></p>
                    <?php endif; ?>
                </div>
                <a href="#">Forget Your Password?</a>
                <input type='hidden' name='loginForm' />
                <button id="form-login-btn">Login</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Welcome!</h1>
                    <p>Register with your personal details</p>
                    <button class="hidden" id="register">Register</button>
                </div>
            </div>
        </div>
    </div>
    <script src="./script.js"></script>
</body>

</html>