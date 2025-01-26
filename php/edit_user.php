<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
    include '../db/db.php';
    
    session_start();

    $user_id = isset($_POST['id']) ? $_POST['id'] : null;
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    if ($user_id !== null) {
        $sql = "UPDATE users SET first_name=?, last_name=?, email=?, role=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$first_name, $last_name, $email, $role, intval($user_id)]);
        
        if ($res) {
            $_SESSION["success_message"] = "User edited!";
            header("Location: ../dashboard/users.php");
            exit;
        } else {
            $_SESSION["error_message"] = "Error updating record: " . implode(", ", $stmt->errorInfo());
            echo "Error updating record: " . implode(", ", $stmt->errorInfo());
        }
    }
?>