<?php  

function get_books($conn) {
    $sql = "SELECT * FROM books";
    $stmt = $conn->query($sql);
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $books;
 }

function get_books_most_borrowed_books($conn) {
    $sql = "SELECT 
    b.id,
    b.isbn,
    b.title, 
    b.author, 
    b.category,
    b.image,
    COUNT(l.book_id) AS borrow_count
   FROM 
    loans l
   JOIN 
    books b ON l.book_id = b.id
   GROUP BY 
    l.book_id
   ORDER BY 
    borrow_count DESC
    LIMIT 4;";
    $stmt = $conn->query($sql);
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $books;
 }

 function get_book($conn, $book_id) {
    if ($book_id !== null) {
        $sql = "SELECT * FROM books WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $book_id, PDO::PARAM_INT);
        $stmt->execute();
        $book = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $book;
    }
    return null;
 }

 function search_books($conn, $key){
    $key = "%{$key}%";
 
    $sql = "SELECT * FROM books 
             WHERE title LIKE ?
             OR id LIKE ?
             OR isbn LIKE ?
             OR category LIKE ?
             OR author LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$key, $key, $key, $key, $key]);
    $books = $stmt->fetchAll();

    return $books;
 }

 function delete_book($conn, $id) {
   $sql  = "DELETE FROM books WHERE id=?";
   $stmt = $conn->prepare($sql);
   $res = $stmt->execute([intval($id)]);

   return $res;
 }

?>