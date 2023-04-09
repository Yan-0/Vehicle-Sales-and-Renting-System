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
    <title>Request a vehicle</title>
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
        What would you like to order?</h1>
    <section id="rent">
        <form class="border" method="POST">
            <label class=label1>Vehicle Brand</label>
            <input class="pickup_loc" name="pickup" type="text" placeholder="Eg: Ford" required>
            <label class=label2>Vehicle Model</label>
            <input class="dropoff" name="dropoff" type="text" placeholder="Eg: Ranger" required>
            <label class=label3>Select Make Year</label>
            <select class="vehicle_type" name="make_year" name="vehicle_type">
                <option value="Car">2019</option>
                <option value="Car">2020</option>
                <option value="Van">2021</option>
                <option value="Bus">2022</option>
                <option value="Bike">2023</option>
            </select>
            <label class=label_color for="vehicle_color">Vehicle Color</label>
            <input type="text" name="duration" id="veh_color" placeholder="Specify color of the vehicle">
            <input class="req_sub" name="sub" type="submit" value="Confirm">
        </form>
    </section>
</body>
</html>