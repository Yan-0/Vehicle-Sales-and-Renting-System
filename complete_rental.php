<?php
    include('./widgets/session.php');
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $rentalId = $_POST['id'];
        $stmt = $conn->prepare("UPDATE rental SET rental_status = 'completed' WHERE id = ?");
        $stmt->bind_param("i", $rentalId);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
?>