<?php
    include('widgets/session.php');
    function displayTable($tableName, $excludedColumn){
        $query = "SELECT * FROM $tableName";
        $result = mysqli_query($conn, $query);

        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo '<table border="1px solid">';
        echo '<tr>';
        foreach ($data[0] as $header => $value) {
            if ($header !== $excludedColumn) {
                echo '<th>' . $header . '</th>';
            }
        }
        echo '</tr>';
         foreach ($data as $row) {
            echo '<tr>';
            foreach ($row as $header => $value) {
                if ($header !== $excludedColumn) {
                    echo '<td>' . $value . '</td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    }

    function display_Table($tableName){
        $query = "SELECT * FROM $tableName";
        $result = mysqli_query($conn, $query);

        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo '<table border="1px solid">';
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
    }

    function confirm_book($login_session){
        $stmt = $conn->prepare("UPDATE booking SET booking_status = 'completed' WHERE booking_id = ?");
        $stmt->bind_param("i", $login_session);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    function cancel_booking($booking_id){
        $stmt = $conn->prepare("UPDATE booking SET booking_status = 'cancelled' WHERE booking_id = ?");
        $stmt->bind_param("i", $booking_id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    function complete_booking($booking_id){
        $stmt = $conn->prepare("UPDATE booking SET booking_status = 'completed' WHERE booking_id = ?");
        $stmt->bind_param("i", $booking_id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    function confirm_rent($login_session){
        $stmt = $conn->prepare("UPDATE rental SET rental_status = 'completed' WHERE id = ?");
        $stmt->bind_param("i", $login_session);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    function cancel_rent($id){
        $stmt = $conn->prepare("UPDATE rental SET rental_status = 'cancelled' WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    function complete_rent($id){
        $stmt = $conn->prepare("UPDATE rental SET rental_status = 'completed' WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="Website Icon" type="png" href="./assets/Cyan on Black.png">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: url(assets/skin4.jpg); background-position: left; background-size: cover;">
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
                        <p>
                            <?php
                                $query = "SELECT * FROM user";
                                $result = mysqli_query($conn, $query);
                                $data = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }
                                echo '<table class="display_table">';
                                echo '<tr>';
                                foreach ($data[0] as $header => $value) {
                                    if ($header !== 'password') {
                                        echo '<th>' . $header . '</th>';
                                    }
                                }
                                echo '</tr>';
                                 foreach ($data as $row) {
                                    echo '<tr>';
                                    foreach ($row as $header => $value) {
                                        if ($header !== 'password') {
                                            echo '<td>' . $value . '</td>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                                echo '</table>';
                            ?>
                        </p>
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
                            <p>
                            <?php
                                $query = "SELECT * FROM booking";
                                $result = mysqli_query($conn, $query);
                        
                                $data = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }
                                echo '<table class="display_table">';
                                echo '<tr>';
                                foreach ($data[0] as $header => $value) {
                                        echo '<th>' . $header . '</th>';
                                }
                                echo '<th>Action</th>';
                                echo '</tr>';
                                 foreach ($data as $row) {
                                    echo '<tr>';
                                    foreach ($row as $header => $value) {
                                            echo '<td>' . $value . '</td>';
                                    }
                                    if ($row['booking_status'] == 'confirmed') {
                                        echo '<td><button class="button_av" onclick="completeBooking(' . $row['booking_id'] . ')">Complete</button> <button class="button_av" onclick="cancelBooking(' . $row['booking_id'] . ')">Cancel</button></td>';
                                    } elseif ($row['booking_status'] == 'completed') {
                                        echo '<td>&#10004;</td>';
                                    } elseif ($row['booking_status'] == 'cancelled') {
                                        echo '<td>&times;</td>';
                                    }elseif ($row['booking_status'] == 'pending') {
                                        echo '<td><button class="button_av" onclick="confirmBooking(' . $row['booking_id'] . ')">Confirm</button> <button class="button_av" onclick="cancelBooking(' . $row['booking_id'] . ')">Cancel</button></td>';
                                    }
                                    echo '</tr>';
                                }
                                echo '</table>';
                            ?>
                            </p>
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
                                $query = "SELECT * FROM rental";
                                $result = mysqli_query($conn, $query);
                        
                                $data = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }
                                echo '<table class="display_table">';
                                echo '<tr>';
                                foreach ($data[0] as $header => $value) {
                                        echo '<th>' . $header . '</th>';
                                }
                                echo '<th>Action</th>';
                                echo '</tr>';
                                 foreach ($data as $row) {
                                    echo '<tr>';
                                    foreach ($row as $header => $value) {
                                            echo '<td>' . $value . '</td>';
                                    }
                                    if ($row['rental_status'] == 'confirmed') {
                                        echo '<td><button class="button_av" onclick="completeRental(' . $row['id'] . ')">Complete</button> <button class="button_av" onclick="cancelRental(' . $row['id'] . ')">Cancel</button></td>';
                                    } elseif ($row['rental_status'] == 'completed') {
                                        echo '<td>&#10004;</td>';
                                    } elseif ($row['rental_status'] == 'cancelled') {
                                        echo '<td>&times;</td>';
                                    }elseif ($row['rental_status'] == 'pending') {
                                        echo '<td><button class="button_av" onclick="confirmRental(' . $row['id'] . ')">Confirm</button> <button class="button_av" onclick="cancelRental(' . $row['id'] . ')">Cancel</button></td>';
                                    }
                                    echo '</tr>';
                                }
                                echo '</table>';
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
                            <p>
                                <h3 style="text-decoration: underline;">Sales Vehicles:</h3>
                                <?php
                                $query = "SELECT * FROM vehicles";
                                $result = mysqli_query($conn, $query);
                                $data = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }
                                echo '<table class="display_table">';
                                echo '<tr>';
                                foreach ($data[0] as $header => $value) {
                                    if ($header !== 'image_name') {
                                        echo '<th>' . $header . '</th>';
                                    }
                                }
                                echo '</tr>';
                                 foreach ($data as $row) {
                                    echo '<tr>';
                                    foreach ($row as $header => $value) {
                                        if ($header !== 'image_name') {
                                            echo '<td>' . $value . '</td>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                                echo '</table><br>';
                            ?>
                            </p>
                            <p>
                            <h3 style="text-decoration: underline;">Rental Vehicles:</h3>
                            <?php
                                $query = "SELECT * FROM rental_vehicles";
                                $result = mysqli_query($conn, $query);
                                $data = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }
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
                                echo '</table><br>';
                            
                            ?>
                            </p>
                                <a href="./dashboard_functions/add_vehicle.php"><button class=button_av>Add Vehicle</button></a>    
                            
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
                                $query = "SELECT * FROM vehicle_requested";
                                $result = mysqli_query($conn, $query);
                        
                                $data = array();
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data[] = $row;
                                }
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

      function confirmBooking(bookingId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'confirm_booking.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {
                alert('Booking confirmed successfully!');
            } else {
                alert('Error confirming booking. Please try again later.');
            }
        };
        xhr.onerror = function () {
            alert('Error confirming booking. Please try again later.');
        };
        xhr.send('booking_id=' + bookingId);
    };

    function cancelBooking(bookingId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'cancel_booking.php', true); 
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {
                alert('Booking cancelled successfully!');
            } else {
                alert('Error cancelling booking. Please try again later.');
            }
        };
        xhr.onerror = function () {
            alert('Error cancelling booking. Please try again later.');
        };
        xhr.send('booking_id=' + bookingId);
    }

    function completeBooking(bookingId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'complete_booking.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {
                alert('Booking completed successfully!');
            } else {
                alert('Error completing booking. Please try again later.');
            }
        };
        xhr.onerror = function () {
            alert('Error completing booking. Please try again later.');
        };
        xhr.send('booking_id=' + bookingId);
    }

    function confirmRental(rentalId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'confirm_rental.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {
                alert('Rental confirmed successfully!');
            } else {
                alert('Error confirming rental. Please try again later.');
            }
        };
        xhr.onerror = function () {
            alert('Error confirming rental. Please try again later.');
        };
        xhr.send('id=' + rentalId);
    };

    function cancelRental(rentalId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'cancel_rental.php', true); 
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {
                alert('Rental cancelled successfully!');
            } else {
                alert('Error cancelling Rental. Please try again later.');
            }
        };
        xhr.onerror = function () {
            alert('Error cancelling rental. Please try again later.');
        };
        xhr.send('id=' + rentalId);
    }

    function completeRental(rentalId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'complete_rental.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 400) {
                alert('Rental completed successfully!');
            } else {
                alert('Error completing rental. Please try again later.');
            }
        };
        xhr.onerror = function () {
            alert('Error completing rental. Please try again later.');
        };
        xhr.send('id=' + rentalId);
    }
      </script>
</body>
</html>