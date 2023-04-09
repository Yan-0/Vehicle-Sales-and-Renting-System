<?php
    include "./config.php";
    if (isset($_POST['sub'])) {
        $pickup = mysqli_real_escape_string($conn, $_POST['pickup']);
        $dropoff = mysqli_real_escape_string($conn, $_POST['dropoff']);
        $vehicle_type = mysqli_real_escape_string($conn, $_POST['vehicle']);
        $duration = mysqli_real_escape_string($conn, $_POST['duration']);
        $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
        $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);


        $insert = "INSERT INTO rental(pickup_loc, dropoff_loc, vehicle_type, duration, start_date, end_date) VALUES('$pickup','$dropoff', '$vehicle_type', '$duration', '$start_date', '$end_date')";
        mysqli_query($conn, $insert);
        header('location:login.php');
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Rent a vehicle</title>
</head>
<body>
    <header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about_us.php">About</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-left: 20px; color: white;">
        Where do you feel like going today?</h1>
    <section id="rent">
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
            <input id="datetime1" name="start_date" type="datetime-local" required>
            <label class=label6 for="datetime2">Drop-off date and time</label>
            <input id="datetime2" name="end_date" type="datetime-local" required>
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