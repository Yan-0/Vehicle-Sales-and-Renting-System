<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="admin_panel.php" class="active">Admin Dashboard</a></li>
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
            <button class="func_button" data-modal="modal1">
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
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <div class="popup-display">
                        <a class="close">&times;</a>
                            <h2>Registered Users</h2>
                            <p><?php
                                $sql = "SELECT * FROM user";
                                $result = mysqli_query($conn, $sql);
            
                                if ($result->num_rows > 0) {
                                    echo "<ol>";
                                    while ($row = $result -> fetch_assoc()) {
                                        echo "<li>";
                                        echo "<h4>". "Username: " . $row['fullname'] . "<br>User Type: ". $row['user_type']. "</h4><hr>";
                                }}
                                echo "</li>";
                                echo "</ol>";
                            ?></p>
                    </div>
                </div>
            </div>
            <button class="func_button" data-modal="modal2">
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
            <div id="modal2" class="modal">
                <div class="modal-content">
                    <div class="popup-display">
                        <a class="close">&times;</a>
                            <h2>Total Bookings</h2>
                            <p><?php
                                $sql = "SELECT * FROM booking";
                                $result = mysqli_query($conn, $sql);
            
                                if ($result->num_rows > 0) {
                                    echo "<ol>";
                                    while ($row = $result -> fetch_assoc()) {
                                        echo "<li>";
                                        echo "<h4>". "Booked By: " . $row['booked_by'] . "<br>Vehicle: ". $row['booked_vehicle']. "<br>E-mail: ". $row['email']. "<br>Phone: ". $row['phone']. "<br>Address: ". $row['address'].", ".$row['country']. "<br>Status: ". $row['booking_status']. "</h4><hr>";
                                }}
                                echo "</li>";
                                echo "</ol>";
                            ?></p>
                    </div>
                </div>
            </div>
            <button class="func_button" data-modal="modal3">
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
            <div id="modal3" class="modal">
                <div class="modal-content">
                    <div class="popup-display">
                        <a class="close">&times;</a>
                            <h2>Total Rentals</h2>
                            <p><?php
                                $sql = "SELECT * FROM rental";
                                $result = mysqli_query($conn, $sql);
            
                                if ($result->num_rows > 0) {
                                    echo "<ol>";
                                    while ($row = $result -> fetch_assoc()) {
                                        echo "<li>";
                                        echo "<h4>". "Rental Requested By: " . $row['rented_by'] . "<br>Pickup Location: ". $row['pickup_loc']. "<br>Dropoff Location: " .$row['dropoff_loc']."<br>Vehicle Type: ".$row['vehicle_type']."<br>Duration: ".$row['duration']."<br>Start Date: ".$row['start_date']."<br>End Date: ".$row['end_date']. "</h4><hr>";
                                }}
                                echo "</li>";
                                echo "</ol>";
                            ?></p>
                    </div>
                </div>
            </div>
            <button class="func_button" data-modal="modal4">
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
            <div id="modal4" class="modal">
                <div class="modal-content">
                    <div class="popup-display">
                        <a class="close">&times;</a>
                            <h2>Listed Vehicles</h2>
                            <p><?php
                                $sql = "SELECT * FROM vehicles";
                                $result = mysqli_query($conn, $sql);

                                if ($result->num_rows > 0) {
                                    echo "<ol>";
                                    while ($row = $result -> fetch_assoc()) {
                                        echo "<li>";
                                        echo "<h4>". " " . $row['make_year']. " " . $row['vehicle_model'] . "<br>Color: " . $row['color']. "<br>Vehicle Type: " .$row['vehicle_type']. "<br>Price: ". $row['vehicle_price'] . "</h4><hr>";
                                    }}
                                    echo "</li>";
                                    echo "</ol>";
                            ?>
                                <a href="./admin_panel_func/add_vehicle.php"><button class=butt>Add Vehicle</button></a>    
                            </p>
                    </div>
                </div>
            </div>
            <button class="func_button" data-modal="modal5">
                <div class="func_count">
                <?php 
                    $sql = "SELECT COUNT(request_id) FROM vehicle_requested";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h1>" . $row['COUNT(request_id)'] . "</h1>";
                    }}
                ?>
                Requested Vehicles
                </div>
            </button>
            <div id="modal5" class="modal">
                <div class="modal-content">
                    <div class="popup-display">
                        <a class="close">&times;</a>
                            <h2>Requested Vehicles</h2>
                            <p><?php
                                $sql = "SELECT * FROM vehicle_requested";
                                $result = mysqli_query($conn, $sql);

                                if ($result->num_rows > 0) {
                                    echo "<ol>";
                                    while ($row = $result -> fetch_assoc()) {
                                        echo "<li>";
                                        echo "<h4>". "Requested By: " . $row['requested_by'] . "<br>Vehicle: ". $row['make_year']. " " .$row['brand']." ".$row['model']. "<br>Color: " . $row['vehicle_color'] . "</h4><hr>";
                                        
                                    }}
                                    echo "</li>";
                                    echo "</ol>";
                            ?></p>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <script>
        let modalBtns = [...document.querySelectorAll(".func_button")];
      modalBtns.forEach(function (btn) {
        btn.onclick = function () {
          let modal = btn.getAttribute("data-modal");
          document.getElementById(modal).style.display = "block";
        };
      });
      let closeBtns = [...document.querySelectorAll(".close")];
      closeBtns.forEach(function (btn) {
        btn.onclick = function () {
          let modal = btn.closest(".modal");
          modal.style.display = "none";
        };
      });
      window.onclick = function (event) {
        if (event.target.className === "modal") {
          event.target.style.display = "none";
        }
      };
      </script>
</body>
</html>