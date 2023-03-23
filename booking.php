<?php
    include "./config.php";
    if (isset($_POST['sub'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);

        $select = "SELECT * FROM login WHERE fullname = '$fullname' && email = '$email'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'You already have a booking pending.';
        }else{
            $insert = "INSERT INTO login(fullname, phone, email, address, country) VALUES('$fullname, '$phone', '$email','$address', '$country')";
            mysqli_query($conn, $insert);
            header('location:successful.php');
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
    <section class="all">
                <div id="booking_form">
                    <h1 class="log">Enter your credentials</h1>
                    <form action="" method="POST" name="login_form" enctype="multipart/form-data">
                        <?php
                            if(isset($error)){
                                foreach ($error as $error) {
                                    echo '<span>'.$error.'</span>';
                                }      
                            }
                        ?>
                        <input required type="text" placeholder="Full Name" name="fullname" class="fin"><br><br>
                        <input required type="text" placeholder="Phone" name="phone" class="fin"><br><br>
                        <input required type="text" placeholder="Address" name="address" class="fin"><br><br>
                        <select name="country" class="fin">
                            <option value="0">Select a Country</option>
                            <option value="1">Nepal</option>
                        </select><br><br>
                        <input required type="email" placeholder="E-mail" name="email" class="fin"><br><br><br><br><br>
                        <button type="submit" class="but" name="sub">Confirm Booking</button>
                        <p class="info1">*We might give you a call to confirm your booking</p>
                        <p class="info2">*Please enter all information correctly.</p>
                    </form>
                </div>
    </section>
</body>
</html>
