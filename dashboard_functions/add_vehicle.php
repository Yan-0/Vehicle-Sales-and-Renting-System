<?php
    include "../widgets/config.php";

        if (isset($_POST['sub'])) {
            $brand = mysqli_real_escape_string($conn, $_POST['brand']);
            $model = mysqli_real_escape_string($conn, $_POST['model']);
            $year = mysqli_real_escape_string($conn, $_POST['make_year']);
            $vehicle_type = mysqli_real_escape_string($conn, $_POST['vehicle_type']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            $color = mysqli_real_escape_string($conn, $_POST['color']);


            $insert = "INSERT INTO vehicles(vehicle_model, make_year, color, vehicle_type, vehicle_price) VALUES('$brand $model','$year', '$color', '$vehicle_type', '$price')";
            mysqli_query($conn, $insert);

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Add a vehicle</title>
    <link rel="Website Icon" type="png" href="./assets/Cyan on Black.png">
    <style type="text/css">
		.error{
			color: red;
			display: block;
		}
	</style>
</head>
<body>
    <header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="../assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="../admin_panel.php">Admin Dashboard</a></li>
                <li><a href="listed_vehicles.php" class="active">Add a Vehicle</a></li>
                
            </ul>
        </nav>
    </header>
    <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-left: 20px; color: white;">
        Adding a vehicle
    </h1>
    <section id="rent">
        <?php
            if(isset($error)){
                foreach ($error as $error) {
                    echo '<span>'.$error.'</span><br>';
                }      
            }
            if(isset($sql)){
                echo '<span style = "background: green; margin-bottom: 20px; text-align: center;">'."$message".'</span><br>';
                }
            ?>
        <form class="border" method="POST">
            <label class=label1>Vehicle Brand</label>
            <input class="pickup_loc" name="brand" type="text" placeholder="Eg: Ford" required>
            <label class=label2>Vehicle Model</label>
            <input class="dropoff" name="model" type="text" placeholder="Eg: Ranger" required>
            <label class=label3>Vehicle Type</label>
            <select class="vehicle_type"  name="vehicle_type">
                <option value="Sedan">Sedan</option>
                <option value="SUV">SUV</option>
                <option value="Pickup">Pickup</option>
                <option value="Sports car">Sports car</option>
                <option value="Bike">Bike</option>
                <option value="Hatchback">Hatchback</option>
            </select>
            <label class=label_color for="vehicle_color">Vehicle Color</label>
            <input type="text" name="color" id="veh_color" placeholder="Specify color of the vehicle">

            <label class=label_make>Select Make Year</label>
            <select class="make_year" name="make_year">
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>
            <label class=label_price>Price</label>
            <input class="av_price" name="price" type="text" placeholder="$" required>
            <input class="sub_button" name="sub" type="submit" value="Confirm">
        </form>
    </section>
</body>
</html>