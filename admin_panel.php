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
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div id="main">
      <section id="billboard">
        <div id="greeting">Welcome, 
            <?php
                include('session.php');
                echo $login_session;
            ?>
        </div>
        <div class="function">
            <button class="func_button">
                <div class="func_count">
                <?php 
                    $sql = "SELECT COUNT(fullname) FROM user";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h1>" . $row['COUNT(fullname)'] . "</h1>";
                    }}
                ?>
                Registered Users
                </div>
            </button>
            <button class="func_button">
                <div class="func_count">
                <?php 
                    $sql = "SELECT COUNT(booked_by) FROM booking";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h1>" . $row['COUNT(booked_by)'] . "</h1>";
                    }}
                ?>
                Total Bookings
                </div>
            </button>
            <button class="func_button">
                <div class="func_count">
                <?php 
                    $sql = "SELECT COUNT(id) FROM rental";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h1>" . $row['COUNT(id)'] . "</h1>";
                    }}
                ?>
                Total Rentals
                </div>
            </button>
            <button class="func_button">
                <div class="func_count">
                <?php 
                    $sql = "SELECT COUNT(vehicle_model) FROM vehicles";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h1>" . $row['COUNT(vehicle_model)'] . "</h1>";
                    }}
                ?>
                Listed Vehicles
                </div>
            </button>
        </div>
      </section>
</body>
</html>