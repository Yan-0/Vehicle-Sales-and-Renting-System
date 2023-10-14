<?php
    include('./widgets/session.php');
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bookingId = $_POST['booking_id'];
        $stmt = $conn->prepare("UPDATE booking SET booking_status = 'confirmed' WHERE booking_id = ?");
        $stmt->bind_param("i", $bookingId);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
?>