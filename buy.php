<?php
include 'widgets/config.php';
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
    <title>Buy a vehicle</title>
</head>
<body>
    <header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="buy.php" class="active">Buy a vehicle</a></li>
                <?php
                    include 'widgets/logged_in.php';
                    logged_in();
                ?>
            </ul>
        </nav>
    </header>
    <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-left: 15px; color: white;">
        Let's get you a vehicle</h1>
        <h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-left: 20px; color: white;">Currently we have these in stock</h2>
    <div class="grid_view">
        <section class="table">
        <div class="card">
            <img src="./assets/2023-BMW-3-Series-6.webp" alt="">
            <div class="details">
                <h3>
                <?php vehicle_details(1); ?>
                <a href="booking.php?no=BMWQ123TR"><button class="booking"><?php availableStock(1);?></button></a>
            </div>
        </div>
    </section>
    <section class="table">
        <div class="card">
            <img src="./assets/land-cruiser-lc-300.webp" alt="">
            <div class="details">
                <?php vehicle_details(2); ?>
                <a href="booking.php?no=TYTL123C14V"><button class="booking"><?php availableStock(2);?></button></a>
                <br><br>
            </div>
        </div>
    </section>
    <section class="table">
        <div class="card">
            <img src="./assets/2021-MB-Eclass.webp" alt="">
            <div class="details">
            <?php vehicle_details(3); ?>
                <a href="booking.php?no=MBE001C145E"><button class="booking"><?php availableStock(3);?></button></a>
            </div>
        </div>
    </section>
    <section class="table">
        <div class="card">
            <img src="./assets/Ford-F150-2023.avif" alt="">
            <div class="details">
            <?php vehicle_details(4); ?>
                <a href="booking.php?no=FF15R01459T"><button class="booking"><?php availableStock(4);?></button></a>
            </div>
        </div>
    </section>
    <section class="table">
        <div class="card">
            <img src="./assets/2023-Jeep-Compass.jpg" alt="">
            <div class="details">
            <?php vehicle_details(5); ?>
                <a href="booking.php?no=JC456S2454C"><button class="booking">
                    <?php
                        availableStock(5);
                    ?>
                </button></a>
                
            </div>
        </div>
    </section>
    <section class="table">
        <div class="card">
            <img src="./assets/2022-Toyota-Supra.jpg" alt="">
            <div class="details">
            <?php vehicle_details(6); ?>
                <a href="booking.php?no=TGR123S"><button class="booking">
                <?php
                    availableStock(6);
                    ?>
                </button></a>
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