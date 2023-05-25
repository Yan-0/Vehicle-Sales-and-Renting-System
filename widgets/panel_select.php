<?php
    include 'session.php';

    $select = "SELECT * FROM user WHERE fullname = '$login_session'";

    $result = mysqli_query($conn, $select);

    $row = mysqli_fetch_array($result);
    
    if($row['user_type'] == 'admin'){
        header('location:../admin_panel.php');
    }
    else{
        header('location:../user_panel.php');
    }
?>