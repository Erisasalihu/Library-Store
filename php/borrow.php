<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include '../db/db.php';

session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book_id'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $user_id = $_SESSION['user']['id'];

    if (empty($from) || empty($to)) {
        $errors['dates'] = "Dates are required.";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO loans (book_id, user_id, loan_date, return_date) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$book_id, $user_id, $from, $to]);


        if ($res) {
                
                $inventorySql = "UPDATE inventory SET available_copies=available_copies - 1 WHERE book_id=?";
                $inventoryStmt = $conn->prepare($inventorySql);
                $inventoryRes = $inventoryStmt->execute([$book_id]);
                
                if ($inventoryRes) {
                    
                    header("Location: ../index.php");
                    exit;
                } else {
                    
                    header("Location: ../index.php");
                    exit;
                }
            } else {
                
                echo "Error borrowing the book: " . implode(", ", $stmt->errorInfo());
                exit;
            }
    } else {
        $_SESSION['validation_errors'] = $errors;
        header("Location: ../borrow.php?id=$book_id");
        exit;
    }
}
?>