<?php
    include 'widgets/logged_in.php';
    include "widgets/config.php";
    
    if (isset($_SESSION['login_user'])) {
        $user_check = $_SESSION['login_user'];
    
        $ses_sql = mysqli_query($conn,"select fullname from user where fullname = '$user_check'");
        
        $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
        
        $login_session = $row['fullname'];

        if (isset($_POST['sub'])) {
            $requested_by = mysqli_real_escape_string($conn, $_POST['req_by']);
            $brand = mysqli_real_escape_string($conn, $_POST['brand']);
            $model = mysqli_real_escape_string($conn, $_POST['model']);
            $make_year = mysqli_real_escape_string($conn, $_POST['make_year']);
            $vehicle_color = mysqli_real_escape_string($conn, $_POST['vehicle_color']);

            $select = "SELECT * FROM vehicle_requested WHERE requested_by = '$requested_by'";
            $result = mysqli_query($conn, $select);
        
            if(mysqli_num_rows($result) > 0){
                $error[] = 'You already have a request pending';
            }else{
                $insert = "INSERT INTO vehicle_requested(requested_by, brand, model, make_year, vehicle_color) VALUES('$requested_by','$brand','$model', '$make_year', '$vehicle_color')";
                mysqli_query($conn, $insert);
            }
        
        }
    }else {
        $error[] = 'You need to be logged in to use this feature.';
        echo ("<style>
        #req_form{
            pointer-events: none;
            opacity: 50%;
        }

        .model, .brand, #veh_color{
            height: 2.5rem;
        }
        
        </style>");
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
    <title>Request a vehicle</title>
    <link rel="Website Icon" type="png" href="./assets/Cyan on Black.png">
</head>
<body>
    <header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about_us.php">About</a></li>
                <?php
                    logged_in();
                ?>
            </ul>
        </nav>
    </header>
    <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-left: 20px; color: white;">
        What would you like to order?</h1>
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
        <form class="border" name="request" method="POST" id="req_form">
            <label class=label1>Vehicle Brand</label>
            <input class="brand" name="brand" type="text" placeholder="Eg: Ford" required>
            <label class=label2>Vehicle Model</label>
            <input class="model" name="model" type="text" placeholder="Eg: Ranger" required>
            <label class=label3>Select Make Year</label>
            <select class="build_year" name="make_year">
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
            <label class=label_color for="vehicle_color">Vehicle Color</label>
            <input type="text" name="vehicle_color" id="veh_color" placeholder="Specify color of the vehicle" required>
            <input type="text" name="req_by" value="<?php echo $login_session;?>" /hidden>
            <input class="req_sub" name="sub" type="submit" onclick="valid()" value="Confirm">
        </form>
    </section>

    <script>
        function valid(){
            brand = document.request.brand.value;
            model = document.request.model.value;
            color = document.request.vehicle_color.value;

            if (brand == "") {
                alert("Dont leave any fields empty");
                return false;
            }

            if (model == "") {
                alert("Dont leave any fields empty");
                return false;
            }

            if (color == "") {
                alert("Dont leave any fields empty");
                return false;
            }
        }
    </script>
</body>
</html>