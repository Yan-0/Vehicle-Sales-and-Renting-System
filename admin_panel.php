<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="admin_panel.php" class="active">Admin Panel</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div id="main">
      <section id="billboard">
        <div class="function">
            <button class="func_button">
                <div class="func_count">
                <!-- <?php
                // include "./config.php";
                // $count = "SELECT COUNT(id) FROM login";
                // if ($count >= 0) {
                //     return $count;
                // }
                ?> -->
                Registered Users
                </div>
                <a href="#">See details>></a>
            </button>
            <button class="func_button">
                <div class="func_count">
                Listed Vehicles
                </div>
                <a href="#">See details>></a>
            </button>
            <button class="func_button">
                <div class="func_count">
                Total Bookings
                </div>
                <a href="#">See details>></a>
            </button>
            <button class="func_button">
                <div class="func_count">
                Total Rentals
                </div>
                <a href="#">See details>></a>
            </button>
        </div>
      </section>
</body>
</html>