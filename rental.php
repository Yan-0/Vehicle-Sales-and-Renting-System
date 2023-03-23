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
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-left: 20px; color: white;">
        Where do you feel like going today?</h1>
    <section id="rent">
        <div class="border">
            <label class=label1>Pick-up location</label>
            <input class="pickup_loc" type="text" placeholder="What's your pick-up city or airport?">
            <label>Drop-off location</label>
            <input class="dropoff" type="text" placeholder="Where is your destination?">
            <label>Vehicle needed</label>
            <select class="vehicle_type" name="vehicle_type">
                <option value="sedan">Car</option>
                <option value="sedan">Van</option>
                <option value="sedan">Bus</option>
                <option value="sedan">2-seater</option>
            </select>
            <label>Rent duration</label>
            <select class="duration_selector" name="duration">
                <option value="1">1 day</option>
                <option value="2">2 days</option>
                <option value="3">3 days</option>
                <option value="4">4 days</option>
                <option value="4">5 days</option>
                <option value="4">6 days</option>
                <option value="4">7 days</option>
            </select>
            <label>Pick-up date and time</label>
            <input class="date" type="date">
            <input class="time" type="time">
            <label>Drop-off date or time</label>
            <input class="date" type="date">
            <input class="time" type="time"><br><br>
            <a href="#"><button class="sub">Submit</button></a>
        </div>
    </section>
</body>
</html>