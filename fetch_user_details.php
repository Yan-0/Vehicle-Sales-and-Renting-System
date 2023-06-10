<?php
    include 'widgets/session.php';

    $query = "SELECT * FROM user WHERE fullname = '$login_session'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $data = [
        'name' => $row['fullname'],
        'phone' => $row['phone'],
        'address' => $row['address'],
        'country' => $row['country'],
        'email' => $row['email'],
        ];
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'User not found']);
    }
?>