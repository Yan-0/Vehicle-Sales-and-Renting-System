<?php
    include "./config.php";
    // File upload path
    $targetDir = "uploads/";

    if(isset($_POST["sub"])){
        $target_dir = "uploads/"; //  /to give filepath
        $target_file = $target_dir.basename($_FILES["fileUpload"]["name"]);
        $uploadOk = 1; //flag to check error
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if file already exists
            if(file_exists($target_file)){
                echo"Sorry, file already exists.";
                $uploadOk = 0;
            }
            //Check file size
            if($_FILES["fileUpload"]["size"] > 50000000000){
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType !="png"
                && $imageFileType !="jpeg" && $imageFileType != "gif" && $imageFileType != "dng"){
                    echo "Only JPG, JPEG, PNG, DNG & GIF files are allowed.";
                    $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if($uploadOk = 0){
                echo"Sorry, your file was not uploaded.";
                //if everything is ok, try upload file
            }else{
                if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],$target_file)){
                    echo "The file ".basename($_FILES["fileUpload"]["name"]). "has been uploaded";
                }else{
                    echo "Sorry, there was an error.";
                }
            }

        }

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
    <link rel="stylesheet" href="style.css">
    <title>Listed vehicles</title>
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
        Adding a vehicle</h1>
    <section id="rent">
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
            <label class=label_image for="file">Select image file to upload</label>
            <input type="file" name="file" id="veh_image">
            
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