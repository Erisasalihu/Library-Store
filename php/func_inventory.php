<?php 
function getInventories($conn) {
    // SELECT i.id AS inventory_id, b.id AS book_id, i.total_copies, i.available_copies, b.isbn, b.title
    $stmt = $conn->prepare("SELECT i.id, i.total_copies, i.available_copies, b.id as book_id, b.isbn, b.title, b.author FROM inventory i JOIN books b ON i.book_id = b.id");
    $stmt->execute();
    $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $inventory;
}

function getInventory($conn, $id) {
    $stmt = $conn->prepare("SELECT i.id, i.total_copies, i.available_copies, b.id as book_id, b.isbn, b.title, b.author FROM inventory i JOIN books b ON b.id = i.book_id WHERE i.id = $id");
    $stmt->execute();
    $inventory = $stmt->fetch();
    return $inventory;
}

function getInventoryBook($conn, $book_id) {
    $stmt = $conn->prepare("SELECT i.id, i.total_copies, i.available_copies, b.id as book_id, b.isbn, b.title, b.author, b.image, b.category, b.description, b.published_year FROM inventory i JOIN books b ON b.id = i.book_id WHERE i.book_id = $book_id");
    $stmt->execute();
    $inventory = $stmt->fetch();
    return $inventory;
}

function search_inventory_books($conn, $key){
    $key = "%{$key}%";
 
    $sql = "SELECT i.id, i.total_copies, i.available_copies, b.id as book_id, b.isbn, b.title, b.author FROM inventory i JOIN books b ON b.id = i.book_id
             WHERE i.id LIKE ?
             OR b.title LIKE ?
             OR b.id LIKE ?
             OR b.isbn LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$key, $key, $key, $key, $key]);
    $books = $stmt->fetchAll();

    return $books;
 }

?>