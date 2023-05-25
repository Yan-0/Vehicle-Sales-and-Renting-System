<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="user_panel.php" class="active">User Panel</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div id="main">
      <section id="billboard">
      <div id="greeting">Welcome, 
            <?php
                include('widgets/session.php');
                echo $login_session;
            ?>
        </div>
        <div class="function">
            <a href="">
            <button class="func_button">
                <div class="func_count">
                <?php 
                    $sql = "SELECT COUNT(booked_by) FROM booking where booked_by = '$login_session'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h1>" . $row['COUNT(booked_by)'] . "</h1>";
                    }}
                ?>
                Active Bookings
                </div>
            </button>
            </a>
            <a href="">
            <button class="func_button">
                <div class="func_count">
                <?php 
                    $sql = "SELECT COUNT(rented_by) FROM rental where rented_by = '$login_session'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h1>" . $row['COUNT(rented_by)'] . "</h1>";
                    }}
                ?>
                Active Rentals
                </div>
            </button>
            </a>
            <a href="">
            <button class="func_button">
                <div class="func_count">
                <?php 
                    $sql = "SELECT COUNT(requested_by) FROM vehicle_requested where requested_by = '$login_session'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h1>" . $row['COUNT(requested_by)'] . "</h1>";
                    }}
                ?>
                My Requests
                </div>
            </button>
            </a>
            <a href="" class="func_button_a">
            <button class="func_button">
                <div class="func_count">
                My History
                </div>
            </button>
            </a>
            <a href="account_settings.php" class="func_button_a">
            <button class="func_button">
                <div class="func_count">
                Account Settings
                </div>
            </button>
            </a>
        </div>
      </section>
</body>
</html>