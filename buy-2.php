<?php
include './config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="dropdown.js"></script>
    <title>Buy a vehicle</title>
</head>
<body>
    <header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about_us.php">About</a></li>
                <?php
                    session_start();
                    if(!isset($_SESSION['login_user'])){
                        echo "<a href='login.php'>Login</a>";
                    }else {
                        echo "<div class='dropdown'><button onclick='dropdown()' class='dropbtn'>" . $_SESSION['login_user'] . "</button>
                        <div id='myDropdown' class='dropdown-content'>
                        <a href='user_panel.php'>Account Settings</a>
                        <a href='logout.php'>Logout</a>
                        </div>
                        </div>"
                        ;
                    }
                ?>
            </ul>
        </nav>
    </header>
    <div class="grid_view">
    <section class="table">
        <div class="card">
            <img src="./assets/ioniq6.jpg" alt="">
            <div class="details">
            <?php 
                    $sql = "SELECT * FROM vehicles WHERE vehicle_id='7'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h3>" . $row['vehicle_model'] . "</h3>";
                            echo "<h3>" . $row['vehicle_type'] . "</h3>";
                            echo "<h1>$" . $row['vehicle_price'] . "</h1>";

                        }}
                ?>
                <a href="booking.php?name=Hyundai-Ioniq6"><button class="booking">Book now</button></a>
            </div>
        </div>
    </section>
    <section class="table">
        <div class="card">
            <img src="./assets/sportster-s.webp" alt="">
            <div class="details">
            <?php 
                    $sql = "SELECT * FROM vehicles WHERE vehicle_id='8'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h3>" . $row['vehicle_model'] . "</h3>";
                            echo "<h3>" . $row['vehicle_type'] . "</h3>";
                            echo "<h1>$" . $row['vehicle_price'] . "</h1>";

                        }}
                ?>
                <a href="booking.php?name=Harley-Davidson-SportsterS"><button class="booking">Book now</button></a>
            </div>
        </div>
    </section>
    </div>
    <div id="req">
    <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-left: 20px; color: white; padding-top: 40px">Cannot find what you need?</h1>
        <a href="req_vehicle.php"><button class = "req_but">Request for a Vehicle</button></a>
    </div>
    <footer class="pages">
        <nav class="footer_nav">
            <ul class="footer_ul">
                <li><button onclick="window.history.back()">&laquo; Previous</button></li>
                <li><button onclick="window.location.href='buy.php'">1</button></li>
                <li><button class="active" onclick="window.location.href='buy-2.php'">2</button></li>
            </ul>
        </nav>
    </footer>
</body>
</html>