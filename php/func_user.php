<?php 

function get_users($conn) {
    $sql = "SELECT u.id, u.first_name, u.last_name, u.email, u.role, 
    COUNT(CASE WHEN l.loan_date IS NOT NULL AND l.return_date IS NULL THEN 1 END) AS borrowed_books,
    COUNT(CASE WHEN l.return_date IS NOT NULL THEN 1 END) AS returned_books
    FROM users u
    LEFT JOIN loans l ON u.id = l.user_id
    GROUP BY u.id";
    $stmt = $conn->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $users;
}

function get_user($conn, $id) {
    $sql = "SELECT *
    FROM users WHERE id=$id";
    $stmt = $conn->query($sql);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user;
}

function get_user_by_email($conn, $email) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user;
}

function search_users($conn, $key){
    $key = "%{$key}%";
 
    $sql = "SELECT u.id, u.first_name, u.last_name, u.email, u.role, 
    COUNT(CASE WHEN l.loan_date IS NOT NULL AND l.return_date IS NULL THEN 1 END) AS borrowed_books,
    COUNT(CASE WHEN l.return_date IS NOT NULL THEN 1 END) AS returned_books
    FROM users u
    LEFT JOIN loans l ON u.id = l.user_id
    WHERE u.id LIKE ?
    OR u.first_name LIKE ?
    OR u.last_name LIKE ?
    OR u.email LIKE ?
    GROUP BY u.id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$key, $key, $key, $key]);
    $users = $stmt->fetchAll();

    return $users;
 }

 function delete_user($conn, $id) {
    $sql  = "DELETE FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([intval($id)]);
 
    return $res;
  }

?>