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
    <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-left: 5px; color: white;">
        Let's get you a vehicle</h1>
        <h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-left: 10px; color: white;">Currently we have these in stock</h2>
    <div class="grid_view">
        <section class="table">
        <div class="card">
            <img src="./assets/2023-BMW-3-Series-6.webp" alt="">
            <div class="details">
                <h3>
                <?php 
                    $sql = "SELECT * FROM vehicles WHERE vehicle_id='1'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h3>" . $row['vehicle_model'] . "</h3>";
                            echo "<h3>" . $row['vehicle_type'] . "</h3>";
                            echo "<h1>$" . $row['vehicle_price'] . "</h1>";

                        }}
                ?>
                <a href="booking.php"><button class="booking" name="BMW_Series_6">Book now</button></a>
            </div>
        </div>
    </section>
    <section class="table">
        <div class="card">
            <img src="./assets/land-cruiser-lc-300.webp" alt="">
            <div class="details">
                <?php 
                    $sql = "SELECT * FROM vehicles WHERE vehicle_id='2'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h3>" . $row['vehicle_model'] . "</h3>";
                            echo "<h3>" . $row['vehicle_type'] . "</h3>";
                            echo "<h1>$" . $row['vehicle_price'] . "</h1>";

                        }}
                ?>
                <a href="booking.php"><button class="booking" name="Toyota_LC300">Book now</button></a>
                <br><br>
            </div>
        </div>
    </section>
    <section class="table">
        <div class="card">
            <img src="./assets/2021-MB-Eclass.webp" alt="">
            <div class="details">
            <?php 
                    $sql = "SELECT * FROM vehicles WHERE vehicle_id='3'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h3>" . $row['vehicle_model'] . "</h3>";
                            echo "<h3>" . $row['vehicle_type'] . "</h3>";
                            echo "<h1>$" . $row['vehicle_price'] . "</h1>";

                        }}
                ?>
                <a href="booking.php"><button class="booking" name="Mercedes_EClass">Book now</button></a>
            </div>
        </div>
    </section>
    <section class="table">
        <div class="card">
            <img src="./assets/Ford-F150-2023.avif" alt="">
            <div class="details">
            <?php 
                    $sql = "SELECT * FROM vehicles WHERE vehicle_id='4'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h3>" . $row['vehicle_model'] . "</h3>";
                            echo "<h3>" . $row['vehicle_type'] . "</h3>";
                            echo "<h1>$" . $row['vehicle_price'] . "</h1>";

                        }}
                ?>
                <a href="booking.php"><button class="booking" name="Ford_F150">Book now</button></a>
            </div>
        </div>
    </section>
    <section class="table">
        <div class="card">
            <img src="./assets/2023-Jeep-Compass.jpg" alt="">
            <div class="details">
            <?php 
                    $sql = "SELECT * FROM vehicles WHERE vehicle_id='5'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h3>" . $row['vehicle_model'] . "</h3>";
                            echo "<h3>" . $row['vehicle_type'] . "</h3>";
                            echo "<h1>$" . $row['vehicle_price'] . "</h1>";

                        }}
                ?>
                <a href="booking.php"><button class="booking" name="Jeep_Compass">Book now</button></a>
            </div>
        </div>
    </section>
    <section class="table">
        <div class="card">
            <img src="./assets/2022-Toyota-Supra.jpg" alt="">
            <div class="details">
            <?php 
                    $sql = "SELECT * FROM vehicles WHERE vehicle_id='6'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h3>" . $row['vehicle_model'] . "</h3>";
                            echo "<h3>" . $row['vehicle_type'] . "</h3>";
                            echo "<h1>$" . $row['vehicle_price'] . "</h1>";

                        }}
                ?>
                <a href="booking.php"><input type="submit" class="booking" name="Toyota_GR_Supra" value="Book now"></button></a>
                <br><br>
            </div>
        </div>
    </section>
    </div>
    <footer class="pages">
        <nav class="footer_nav">
            <ul class="footer_ul">
                <li><button class="active" onclick="window.location.href='buy.php'">1</button></li>
                <li><button onclick="window.location.href='buy-2.php'">2</button></li>
                <li><button onclick="window.location.href='buy-2.php'">Next &raquo;</button></li>
            </ul>
        </nav>
    </footer>

</body>
</html>
