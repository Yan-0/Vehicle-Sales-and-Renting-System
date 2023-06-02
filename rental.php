<?php
    include 'widgets/config.php';
    include 'widgets/logged_in.php';
    
    $dt = new DateTime(); // Date object using current date and time
    $dt = $dt->format('Y-m-d\TH:i'); 
    
    if (isset($_SESSION['login_user'])) {
        $user_check = $_SESSION['login_user'];
    
        $ses_sql = mysqli_query($conn,"select fullname from user where fullname = '$user_check'");
        
        $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
        
        $login_session = $row['fullname'];
    
        if (isset($_POST['sub'])) {
            $rented_by = mysqli_real_escape_string($conn, $_POST['rented_by']);
            $pickup = mysqli_real_escape_string($conn, $_POST['pickup']);
            $dropoff = mysqli_real_escape_string($conn, $_POST['dropoff']);
            $vehicle_type = mysqli_real_escape_string($conn, $_POST['vehicle']);
            $duration = mysqli_real_escape_string($conn, $_POST['duration']);
            $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
            $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    
            $select = "SELECT * FROM rental WHERE rented_by = '$rented_by'";
            $result = mysqli_query($conn, $select);
    
            if(mysqli_num_rows($result) > 0){
                $error[] = 'You already have a rental request pending';
            }else{
                $insert = "INSERT INTO rental(rented_by, pickup_loc, dropoff_loc, vehicle_type, duration, start_date, end_date) VALUES('$rented_by','$pickup','$dropoff', '$vehicle_type', '$duration', '$start_date', '$end_date')";
                mysqli_query($conn, $insert);
            }
            
        }
    }else {
        $error[] = 'You need to be logged in to use this feature.';
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
    <title>Rent a vehicle</title>
</head>
<body>
    <header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="rental.php" class="active">Rent a vehicle</a></li>
                <?php
                    logged_in();
                ?>
            </ul>
        </nav>
    </header>
    <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-left: 20px; color: white;">
        Where do you feel like going today?</h1>
    <section id="rent">
    <?php
            if(isset($error)){
                foreach ($error as $error) {
                    echo '<span style="text-align: center;">'.$error.'</span>';
                }      
            }
            if(isset($insert)){
                echo '<span style = "background: green; text-align: center;">'."Your request has been registered successfully".'</span>';
            }
            ?>
        <form class="border" method="POST">
            <label class=label1>Pick-up location</label>
            <input class="pickup_loc" name="pickup" type="text" placeholder="What's your pick-up city or airport?" required>
            <label class=label2>Drop-off location</label>
            <input class="dropoff" name="dropoff" type="text" placeholder="Where is your destination?" required>
            <label class=label3>Vehicle needed</label>
            <select class="vehicle_type" name="vehicle" name="vehicle_type">
                <option value="Car">Car (5-seater)</option>
                <option value="Van">Van (12-seater)</option>
                <option value="Bus">Bus (30-seater)</option>
                <option value="Bike">Motorbike (2-seater)</option>
            </select>
            <label class=label4 for="duration">Rent duration</label>
            <input type="text" name="duration" id="duration" placeholder="Select date and time for duration" readonly>
            <label class=label5 for="datetime1">Pick-up date and time</label>
            <input id="datetime1" name="start_date" type="datetime-local" required min="<?php echo $dt;?>">
            <label class=label6 for="datetime2">Drop-off date and time</label>
            <input id="datetime2" name="end_date" type="datetime-local" required min="<?php echo $dt;?>">
            <input type="text" name="rented_by" value="<?php echo $login_session;?>" /hidden>
            <input class="rent_sub" name="sub" type="submit" value="Confirm">
        </form>
    </section>

    <script>
        function calculateDifference() {
         var datetime1 = new Date(document.getElementById("datetime1").value);
        var datetime2 = new Date(document.getElementById("datetime2").value);
        if (!isNaN(datetime1) && !isNaN(datetime2)) {
            var diffInMs = Math.abs(datetime2 - datetime1);
            var diffInSecs = diffInMs / 1000;
            var days = Math.floor(diffInSecs / (3600 * 24));
            diffInSecs -= days * 3600 * 24;
            var hours = Math.floor(diffInSecs / 3600) % 24;
            diffInSecs -= hours * 3600;
            var minutes = Math.floor(diffInSecs / 60) % 60;
            diffInSecs -= minutes * 60;
            var seconds = Math.floor(diffInSecs % 60);

            document.getElementById("duration").value = days + " days, " + hours + " hours, " + minutes + " minutes";
            }
        }

        document.getElementById("datetime1").addEventListener("change", calculateDifference);
        document.getElementById("datetime2").addEventListener("change", calculateDifference);
    </script>
</body>
</html>