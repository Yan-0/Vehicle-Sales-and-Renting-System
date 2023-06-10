<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: url(assets/skin4.jpg); background-position: left; background-size: cover;">
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
            <button class="func_button" data-modal="modal01">
                <div class="func_count">
                <?php 
                    $sql = "SELECT COUNT(booked_by) FROM booking where booked_by = '$login_session' AND booking_status = 'pending'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h1>" . $row['COUNT(booked_by)'] . "</h1>";
                    }}
                ?>
                Active Bookings
                </div>
            </button>
            <div id="modal01" class="modal">
                <div class="modal-content">
                    <div class="popup-display">
                        <a class="close">&times;</a>
                            <h2>Active Bookings</h2>
                            <p><?php
                                $query = "SELECT * FROM booking where booked_by ='$login_session' and booking_status = 'pending'";
                                $result = mysqli_query($conn, $query);
                        
                                $data = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }
                                if (!empty($data)) {
                                echo '<table class="display_table">';
                                echo '<tr>';
                                
                                    foreach ($data[0] as $header => $value) {
                                        echo '<th>' . $header . '</th>';
                                }
                                echo '</tr>';
                                 foreach ($data as $row) {
                                    echo '<tr>';
                                    foreach ($row as $header => $value) {
                                            echo '<td>' . $value . '</td>';
                                    }
                                    echo '</tr>';
                                }
                                echo '</table>';
                                }else {
                                    echo "Nothing to see here.";
                                }
                                
                            ?></p>
                    </div>
                </div>
            </div>
            <button class="func_button" data-modal="modal02">
                <div class="func_count">
                <?php 
                    $sql = "SELECT COUNT(rented_by) FROM rental where rented_by = '$login_session' AND rental_status = 'pending'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h1>" . $row['COUNT(rented_by)'] . "</h1>";
                    }}
                ?>
                Active Rentals
                </div>
            </button>
            <div id="modal02" class="modal">
                <div class="modal-content">
                    <div class="popup-display">
                        <a class="close">&times;</a>
                            <h2>Active Rentals</h2>
                            <p><?php
                                $query = "SELECT * FROM rental where rented_by ='$login_session' and rental_status = 'pending'";
                                $result = mysqli_query($conn, $query);
                        
                                $data = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }
                                if (!empty($data)) {
                                echo '<table class="display_table">';
                                echo '<tr>';
                                
                                    foreach ($data[0] as $header => $value) {
                                        echo '<th>' . $header . '</th>';
                                }
                                echo '</tr>';
                                 foreach ($data as $row) {
                                    echo '<tr>';
                                    foreach ($row as $header => $value) {
                                            echo '<td>' . $value . '</td>';
                                    }
                                    echo '</tr>';
                                }
                                echo '</table>';
                                }else {
                                    echo "Nothing to see here.";
                                }
                                
                            ?></p>
                    </div>
                </div>
            </div>
            <button class="func_button" data-modal="modal03">
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
            <div id="modal03" class="modal">
                <div class="modal-content">
                    <div class="popup-display">
                        <a class="close">&times;</a>
                            <h2>Requested Vechicles</h2>
                            <p><?php
                                $query = "SELECT * FROM vehicle_requested where requested_by ='$login_session' and status = 'pending'";
                                $result = mysqli_query($conn, $query);
                        
                                $data = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }
                                if (!empty($data)) {
                                echo '<table class="display_table">';
                                echo '<tr>';
                                
                                    foreach ($data[0] as $header => $value) {
                                        echo '<th>' . $header . '</th>';
                                }
                                echo '</tr>';
                                 foreach ($data as $row) {
                                    echo '<tr>';
                                    foreach ($row as $header => $value) {
                                            echo '<td>' . $value . '</td>';
                                    }
                                    echo '</tr>';
                                }
                                echo '</table>';
                                }else {
                                    echo "Nothing to see here.";
                                }
                                
                            ?></p>
                    </div>
                </div>
            </div>
            <button class="func_button" data-modal="modal04">
                <div class="func_count">
                <div class="func_flex"><?php 
                    $sql = "SELECT COUNT(rented_by) FROM rental where rented_by = '$login_session' AND (rental_status = 'completed' or rental_status = 'cancelled')";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h1>" . $row['COUNT(rented_by)'] . " Rental |". "</h1>";
                    }}
                    ?>
                    <?php 
                    $sql = "SELECT COUNT(booked_by) FROM booking where booked_by = '$login_session' AND (booking_status = 'completed' or booking_status = 'cancelled')";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        
                        while ($row = $result -> fetch_assoc()) {
                            echo "<h1>". "| " . $row['COUNT(booked_by)'] . " Booking" . "</h1>";
                    }}
                    ?>
                </div>
                My History
                </div>
            </button>
            <div id="modal04" class="modal">
                <div class="modal-content">
                    <div class="popup-display">
                        <a class="close">&times;</a>
                            <h2>Booking/Rental History</h2>
                            <p><?php
                                $query = "SELECT * FROM rental where rented_by ='$login_session' and (rental_status = 'completed' or rental_status = 'cancelled')";
                                $result = mysqli_query($conn, $query);
                        
                                $data = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }
                                if (!empty($data)) {
                                echo '<table class="display_table">';
                                echo '<tr>';
                                
                                    foreach ($data[0] as $header => $value) {
                                        echo '<th>' . $header . '</th>';
                                }
                                echo '</tr>';
                                 foreach ($data as $row) {
                                    echo '<tr>';
                                    foreach ($row as $header => $value) {
                                            echo '<td>' . $value . '</td>';
                                    }
                                    echo '</tr>';
                                }
                                echo '</table>';
                                }else {
                                    echo "No rentals completed.";
                                }
                                
                            ?></p>
                            <p><?php
                                $query = "SELECT * FROM booking where booked_by ='$login_session' and (booking_status = 'completed' or booking_status = 'cancelled')";
                                $result = mysqli_query($conn, $query);
                        
                                $data = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }
                                if (!empty($data)) {
                                echo '<table class="display_table">';
                                echo '<tr>';
                                
                                    foreach ($data[0] as $header => $value) {
                                        echo '<th>' . $header . '</th>';
                                }
                                echo '</tr>';
                                 foreach ($data as $row) {
                                    echo '<tr>';
                                    foreach ($row as $header => $value) {
                                            echo '<td>' . $value . '</td>';
                                    }
                                    echo '</tr>';
                                }
                                echo '</table>';
                                }else {
                                    echo "No bookings completed.";
                                }
                            ?></p>
                    </div>
                </div>
            </div>
            <a href="dashboard_functions/account_settings.php" class="func_button_a">
            <button class="func_button">
                <div class="func_count">
                Account Settings
                </div>
            </button>
            </a>
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