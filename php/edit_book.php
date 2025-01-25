<?php
    include '../db/db.php';
    
    session_start();

    $book_id = isset($_POST['book_id']) ? $_POST['book_id'] : null;
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $year = $_POST['published_year'];

    if ($book_id !== null) {
        $sql = "UPDATE books SET title=?, isbn=?, author=?, category=?, published_year=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([$title, $isbn, $author, $category, $year, intval($book_id)]);
        
        if ($res) {
            $_SESSION["success_message"] = "Book edited!";
            header("Location: ../dashboard/books.php");
            exit;
        } else {
            $_SESSION["error_message"] = "Error updating record: " . implode(", ", $stmt->errorInfo());
            echo "Error updating record: " . implode(", ", $stmt->errorInfo());
        }
    }
?>