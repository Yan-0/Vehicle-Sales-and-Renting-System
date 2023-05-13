<?php
    include "./config.php";
    if (isset($_POST['sub'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $vehicle_booked = mysqli_real_escape_string($conn, $_GET['name']);

        $select = "SELECT * FROM booking WHERE booked_by = '$fullname' && email = '$email' && booked_vehicle = '$vehicle_booked'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'You already have the same booking pending.';
        }else{
            $insert = "INSERT INTO booking(booked_by, phone, email, address, country, booked_vehicle) VALUES('$fullname', '$phone', '$email', '$address', '$country', '$vehicle_booked')";
            mysqli_query($conn, $insert);
        }
    }

// if (isset($_POST["autofill"])) {
      
//     // Get corresponding first name and 
//     // last name for that user id    
//     $query = mysqli_query($conn, "SELECT fullname, 
//     email, phone, address, country FROM login WHERE $_SESSION['login_user']='$fullname'");
  
//     $row = mysqli_fetch_array($query);
  
//     // Get the first name
//     $fullname = $row["fullname"];
//     $phone = $row["phone"];
//     $address = $row["address"];
//     $country = $row["country"];
//     $email = $row["email"];  
    
// }
  
// // Store it in a array
// $result = array("$fullname", "$phone", "$address", "$country", "$email");
  
// // Send in JSON encoded form
// $myJSON = json_encode($result);
// echo $myJSON;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Portal</title>
    <link href="style.css" rel="stylesheet"/>
    <script src="dropdown.js"></script>
</head>
<body>
    <header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about_us.php">About</a></li>
                <?php
                    session_start();
                    if(!isset($_SESSION['login_user'])){
                        echo "<a href='login.php'>Login</a>";
                    }else {
                        echo "<div class='dropdown'><button onclick='dropdown()' class='dropbtn'>" . $_SESSION['login_user'] . "</button>
                        <div id='myDropdown' class='dropdown-content'>
                        <a href='user_panel.php'>Account Settings</a>
                        <a href='logout.php'>Logout</a>
                        </div>
                        </div>"
                        ;
                    }
                ?>
            </ul>
        </nav>
    </header>
    <section class="all">
                <div id="booking_form">
                    <h1 class="log">Enter your credentials<br>
                    <?php
                            if(isset($error)){
                                foreach ($error as $error) {
                                    echo '<span>'.$error.'</span><br>';
                                }      
                            }
                            if(isset($insert)){
                                echo '<span style = "background: green; margin-bottom: 20px;">'."Booking Successful".'</span><br>';
                            }
                        ?>
                    </h1>
                    <form action="" method="POST" name="booking_form" enctype="multipart/form-data">
                        <input required type="text" placeholder="Full Name" name="fullname" class="fin" required><br><br>
                        <input required type="text" placeholder="Phone" name="phone" class="fin" required><br><br>
                        <input required type="text" placeholder="Address" name="address" class="fin" required><br><br>
                        <select name="country" class="fin" required>
                            <option value="0">Select a Country</option>
                            <option value="Nepal">Nepal</option>
                        </select><br><br>
                        <input required type="email" placeholder="E-mail" name="email" class="fin" required><br><br><br><br><br>
                        <?php 
                        // if(isset($_SESSION['login_user'])){
                        //     echo "<button onclick='autofill()' id='auto' name='autofill'>Use account information for booking</button><br><br>";
                        // }
                        ?>
                        <button type="submit" class="but" name="sub" onclick="valid()">Confirm Booking</button>
                        <p class="info1">*We might give you a call to confirm your booking</p>
                        <p class="info2">*Please enter all information correctly.</p>
                    </form>
                </div>
    </section>
    <script>
        function valid(){

            fullname = document.booking_form.fullname.value;

            address = document.booking_form.address.value;

            phone = document.booking_form.phone.value;
            var phNum = /^98[0-9]{8}$/;

            email = document.booking_form.email.value;
            var mailformat = /^\w+([\.]?\w+)*@\w+([\.]?\w+)*(\.\w{2,3})+$/;

            country = document.booking_form.country.value;



            if (fullname == "") {
                alert("Please dont leave any field empty.");
                return false;
            }

            if(!phone.match(phNum)){
                alert("Enter valid phone number");
                return false;
            }

            if (address == "") {
                alert("Please dont leave any field empty.");
                return false;
            }

            if(country == 0){
                alert("Please select a country");
                return false;
            }

            if(!email.match(mailformat)){
                alert("Enter valid email");
                return false;
            }

        }
    </script>
</body>
</html>
