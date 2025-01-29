<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include '../db/db.php';

session_start();

    $loan_id = $_POST['loan_id'];
    $book_id = $_POST['book_id'];

        $sql = "UPDATE loans SET returned_date=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([date('Y-m-d'), $loan_id]);


        if ($res) {
                $inventorySql = "UPDATE inventory SET available_copies=available_copies + 1 WHERE book_id=?";
                $inventoryStmt = $conn->prepare($inventorySql);
                $inventoryRes = $inventoryStmt->execute([$book_id]);
                
                if ($inventoryRes) {
                    header("Location: ../dashboard/loans.php");
                    exit;
                } else {
                    
                    header("Location: ../dashboard/loans.php");
                    exit;
                }
            } else {
                
                echo "Error borrowing the book: " . implode(", ", $stmt->errorInfo());
                exit;
            }
?>