<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include '../db/db.php';

session_start();

$isbn = $_POST['isbn'];
$title = $_POST['title'];
$author = $_POST['author'];
$category = $_POST['category'];
$year = isset($_POST['published_year']) ? intval($_POST['published_year']) : null;
$copies = isset($_POST['copies']) ? intval($_POST['copies']) : null;


$image_name = null; 
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_name = basename($_FILES['image']['name']);
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];

    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    
    
    if (in_array($image_type, $allowed_types)) {
        $upload_dir = '../uploads/';
        $image_path = $upload_dir . $image_name;
        
        
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        
        if (!move_uploaded_file($image_tmp_name, $image_path)) {
            $_SESSION["error_message"] = "Error moving the uploaded file.";
            header("Location: ../dashboard/books.php");
            exit;
        }
    } else {
        $_SESSION["error_message"] = "Invalid file type. Only JPG, PNG, and GIF are allowed.";
        header("Location: ../dashboard/books.php");
        exit;
    }
}


$sql = "INSERT INTO books (image, isbn, title, author, category, published_year) VALUES (?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$res = $stmt->execute([!empty($image_name) ? $image_name : null, $isbn, $title, $author, $category, $year]);


if ($res) {
    
    $book_id = $conn->lastInsertId();
    
    $inventorySql = "INSERT INTO inventory (total_copies, available_copies, book_id) VALUES (?,?,?)";
    $inventoryStmt = $conn->prepare($inventorySql);
    $inventoryRes = $inventoryStmt->execute([$copies, $copies, $book_id]);
    
    if ($inventoryRes) {
        $_SESSION["success_message"] = "Book created!";
        header("Location: ../dashboard/books.php");
        exit;
    } else {
        $_SESSION["error_message"] = "Error inserting inventory data.";
        header("Location: ../dashboard/books.php");
        exit;
    }
} else {
    $_SESSION["error_message"] = "Error creating book record: " . implode(", ", $stmt->errorInfo());
    echo "Error creating book record: " . implode(", ", $stmt->errorInfo());
    exit;
}
?>