<?php
    include "widgets/config.php";
    if (isset($_POST['sub'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $vehicle_booked = mysqli_real_escape_string($conn, $_GET['no']);

        $select = "SELECT * FROM booking WHERE booked_by = '$fullname' && email = '$email' && booked_vehicle = '$vehicle_booked'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'You already have the same booking pending.';
        }else{
            $insert = "INSERT INTO booking(booked_by, phone, email, address, country, booked_vehicle) VALUES('$fullname', '$phone', '$email', '$address', '$country', '$vehicle_booked')";
            mysqli_query($conn, $insert);
            $sql = "SELECT quantity FROM vehicles WHERE chassis_no = '$vehicle_booked'";
            $result = mysqli_query($conn, $sql);
            while ($row = $result -> fetch_assoc()) {
                $currentQuantity = $row['quantity'];
            }
            $bookedQuantity = 1;
            $stock = $currentQuantity - $bookedQuantity;
            $updateStock = "UPDATE vehicles SET quantity = '$stock' WHERE chassis_no = '$vehicle_booked'";
            $conn->query($updateStock);
        }
    }
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
                    include 'widgets/logged_in.php';
                    logged_in();
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
                        <input required type="text" placeholder="Full Name" name="fullname" class="fin" id="name" ><br><br>
                        <input required type="text" placeholder="Phone" name="phone" id="phone" class="fin" ><br><br>
                        <input required type="text" placeholder="Address" name="address" id="address" class="fin" ><br><br>
                        <select name="country" id="country" class="fin" >
                            <option value="0">Select a Country</option>
                            <option value="Nepal">Nepal</option>
                        </select><br><br>
                        <input required type="email" placeholder="E-mail" name="email" id="email" class="fin" ><br><br><br><br><br>
                        <button type="submit" class="but" name="sub" >Confirm Booking</button>
                        <p class="info1">*We might give you a call to confirm your booking</p>
                        <p class="info2">*Please enter all information correctly.</p>
                    </form>
                </div>
    </section>
    <script>
        // Make an AJAX request to fetch user details
        window.addEventListener('load', () => {
        // Make an AJAX request to fetch user details
        fetch('fetch_user_details.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            // Fill the form fields with the fetched data
            document.querySelector('#name').value = data.name;
            document.querySelector('#phone').value = data.phone;
            document.querySelector('#address').value = data.address;
            document.querySelector('#country').value = data.country;
            document.querySelector('#email').value = data.email;
        })
        .catch(error => {
            console.error('Error:', error);
        });
        });

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
