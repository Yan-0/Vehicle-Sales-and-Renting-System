<?php

function vehicle_details($i){
    $conn = mysqli_connect('localhost', "root", "", "SAutomobiles");
    $sql = "SELECT * FROM vehicles WHERE vehicle_id='$i'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        while ($row = $result -> fetch_assoc()) {
            echo "<h3>" . $row['vehicle_model'] . "</h3>";
            echo "<h3>" . $row['vehicle_type'] . "</h3>";
            echo "<h1>$" . $row['vehicle_price'] . "</h1>";

        }
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
    <link rel="stylesheet" href="style.css">
    <script src="dropdown.js"></script>
    <link rel="Website Icon" type="png" href="./assets/Cyan on Black.png">
    <title>Buy a vehicle</title>
</head>
<body>
    <header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="buy-2.php" class="active">Buy a vehicle</a></li>
                <?php
                    include 'widgets/logged_in.php';
                    logged_in();
                ?>
            </ul>
        </nav>
    </header>
    <div class="grid_view">
    <section class="table">
        <div class="card">
            <a href="./desc_pages/ioniq-6.php">
            <img src="./assets/ioniq6.jpg" alt="" >
            <div class="details"  style="padding-right: 80px">
            <?php vehicle_details(7); ?>
                <a href="booking.php?no=HYI6IO459H"><button class="booking"><?php availableStock(7);?></button></a>
            </div>
            </a>
        </div>
    </section>
    <section class="table">
        <div class="card">
            <a href="./desc_pages/harley-sportster.php">
            <img src="./assets/sportster-s.webp" alt="">
            <div class="details">
            <?php vehicle_details(8); ?>
                <a href="booking.php?no=HLDS123S45D"><button class="booking"><?php availableStock(8);?></button></a>
            </div>
            </a>
        </div>
    </section>
    <section class="table">
        <div class="card">
            <a href="./desc_pages/mercedes-sprinter.php">
            <img src="assets/MB_Sprinter.jpg" alt="">
            <div class="details">
            <?php vehicle_details(9); ?>
                <a href="booking.php?no=MCD1205P30V"><button class="booking"><?php availableStock(9);?></button></a>
            </div>
            </a>
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