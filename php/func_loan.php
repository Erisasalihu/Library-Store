<?php  

function get_loans($conn, $user) {
   $sql = "SELECT l.id, l.loan_date, l.return_date, l.returned_date, b.id as book_id, b.isbn, b.title, b.author, u.first_name, u.last_name
            FROM loans l
            LEFT JOIN books b ON b.id = l.book_id
            LEFT JOIN users u ON u.id = l.user_id";
    
    if ($user['role'] !== 'admin') {
        $sql .= " WHERE u.id = :user_id";
    }

    $stmt = $conn->prepare($sql);

    if ($user['role'] !== 'admin') {
        $stmt->bindParam(':user_id', $user['id'], PDO::PARAM_INT);
    }

    $stmt->execute();
    $loans = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $loans;
 }

 function search_loans($conn, $key, $user){
    $key = "%{$key}%";
 
    $sql = "SELECT l.id, l.loan_date, l.return_date, l.returned_date, b.id as book_id, b.isbn, b.title, b.author, u.first_name, u.last_name FROM loans l
            LEFT JOIN books b ON b.id = l.book_id
            LEFT JOIN users u ON u.id = l.user_id
             WHERE b.title LIKE ?
             OR l.id LIKE ?
             OR b.isbn LIKE ?
             OR u.first_name LIKE ?
             OR u.last_name LIKE ?
             OR u.email LIKE ?";

   if ($user['role'] !== 'admin') {
      $sql .= " AND u.id = :user_id";
   }

    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':key', $key, PDO::PARAM_STR);

   if ($user['role'] === 'admin') {
      $stmt->execute([$key, $key, $key, $key, $key, $key]);
   } else {
      $stmt->execute([$key, $key, $key, $key, $key, $key, $user['id']]);
   }
  
   $loans = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $loans;
 }

?>