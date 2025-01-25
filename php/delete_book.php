<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    session_start();

    include '../db/db.php';
    include './func_book.php';
    
    $book_id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : null;

    if ($book_id !== null) {
        $res = delete_book($conn, $book_id);

        if ($res) {
            $_SESSION["success_message"] = "Book deleted!";
            header("Location: ../dashboard/books.php");
            exit;
        } else {
            $_SESSION["error_message"] = "Error deleting record: " . implode(", ", $stmt->errorInfo());
            echo "Error updating record: " . implode(", ", $stmt->errorInfo());
        }
    }

?>