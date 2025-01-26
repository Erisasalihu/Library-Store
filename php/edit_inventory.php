<?php
    include '../db/db.php';
    
    session_start();

    $inventory_id = isset($_POST['id']) ? $_POST['id'] : null;
    $total_copies = $_POST['copies'];
    $available_copies = $_POST['available_copies'];

    if ($inventory_id !== null) {
        $sql = "UPDATE inventory SET total_copies=?, available_copies=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $res = $stmt->execute([intval($total_copies), intval($available_copies), intval($inventory_id)]);
        
        if ($res) {
            $_SESSION["success_message"] = "Inventory edited!";
            header("Location: ../dashboard/inventory.php");
            exit;
        } else {
            $_SESSION["error_message"] = "Error updating record: " . implode(", ", $stmt->errorInfo());
            echo "Error updating record: " . implode(", ", $stmt->errorInfo());
        }
    }
?>