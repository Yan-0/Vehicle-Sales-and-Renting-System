<?php
session_start();
    include "../widgets/config.php";
    if (isset($_POST['sub'])) {
        $uname = mysqli_real_escape_string($conn, $_POST['uname']);
        $pass = md5($_POST['pass']);

        $select = "SELECT * FROM user WHERE email = '$uname' or phone = '$uname' and password = '$pass'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);

            if($row['user_type'] == 'user'){
                $_SESSION['login_user'] = $row['fullname'];
                header('location:index.php');
            }
            elseif($row['user_type'] == 'admin') {
                $_SESSION['login_user'] = $row['fullname'];
                header('location:index.php');
            }
        }else{
            $error[] = 'Invalid E-mail or Password';
        }
    }
    
function availableStock($i){
        $conn = mysqli_connect('localhost', "root", "", "SAutomobiles");
        $sql = "SELECT quantity FROM vehicles WHERE vehicle_id='$i'";
        $result = mysqli_query($conn, $sql);
        while ($row = $result -> fetch_assoc()) {
            if($row['quantity'] > 0){
                echo "Book now";
            }
            else{
                echo "Out of stock";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercedes Sprinter</title>
    <link rel="Website Icon" type="png" href="../assets/Cyan on Black.png">
    <link href="../style.css" rel="stylesheet"/>
</head>
<body style="background-image: url(../assets/skin2.jpg)">
<header>
        <a class="logo-all" href="../welcome.php"><img class="logo" src="../assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../about_us.php">About</a></li>
            </ul>
        </nav>
    </header>
    <section class="all">
        <div class="desc_card">
            <img src="../assets/MB_Sprinter.jpg" alt="">
            <div class="desc_header">
                <div class="desc_title">
                    <div class="description">
                        <?php $sql = "SELECT * FROM vehicles WHERE vehicle_id='9'";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {
                            echo "<h2>" . $row['vehicle_model'] . "</h3>";
                            echo "<h2>" . $row['vehicle_type'] . "</h3>";
                            echo "<h1 style='color: white'>$" . $row['vehicle_price'] . "</h1>";
                            }
                        }?>
                    </div>
                    <div class="info_button">
                        <a href="../booking.php?no=MCD1205P30V"><button class="booking"><?php availableStock(9);?></button></a>
                    </div>
                </div>
                <div class="desc_info">
                    <p>
                        <?php 
                            $sql = "SELECT * FROM vehicles WHERE vehicle_id='9'";
                            $result = mysqli_query($conn, $sql);

                            if ($result->num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {
                            echo $row['description'];
                            }
                        }?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <script>
        const buttons = document.getElementsByClassName('booking');

        for (let i = 0; i < buttons.length; i++) {
            const button = buttons[i];
            if (button.innerText.toLowerCase().includes('out of stock')) {
                button.disabled = true; // Disable the button
                button.style.background = 'darkred';
                button.style.color = 'white'
            } else {
                button.disabled = false; // Enable the button
                button.style.color = '';
            }
        }
    </script>
</body>
</html>