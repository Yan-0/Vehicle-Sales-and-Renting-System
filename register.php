<?php
    include "widgets/config.php";
    if (isset($_POST['sub'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['nPass']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $fname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);

        $select = "SELECT * FROM user WHERE phone = '$phone' || email = '$email'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'User already exists';
        }else{
            $insert = "INSERT INTO user(email, password, phone, fullname, address) VALUES('$email', '$pass', '$phone', '$fname', '$address')";
            mysqli_query($conn, $insert);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register account</title>
    <link rel="Website Icon" type="png" href="./assets/Cyan on Black.png">
    <link href="style.css" rel="stylesheet"/>
</head>
<body style="background-image: url(assets/skin.jpg);">
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
    <section class="all">
        <div id="form">
            <h1 class="log">Register an Account</h1>
                <form action="" method="POST" name="login_form" enctype="multipart/form-data" onsubmit="return valid()">
                    <?php
                        if(isset($error)){
                            foreach ($error as $error) {
                                echo '<span>'.$error.'</span>';
                            }      
                        }
                        if(isset($insert)){
                            echo '<span style = "background: green;">'."Registration Successful".'</span>';
                        }
                    ?>
                    <p><input required type="email" placeholder="E-mail" name="email" class="fin"></p>
                    <p><input required type="password" placeholder="Password" name="nPass" class="fin"></p>
                    <p><input required type="text" placeholder="Full Name" name="fullname" class="fin"></p>
                    <p><input required type="text" placeholder="Phone" name="phone" class="fin"></p>
                    <p><input required type="text" placeholder="Address" name="address" class="fin" id="padd"></p>
                    <button type="submit" class="but" name="sub">Register</button>
                    <p class="new">Already have an account? <a href="./login.php#form">Log in</a></p>
                </form>
        </div>
    </section>
    <script>
        function valid(){

            fullname = document.login_form.fullname.value;

            address = document.login_form.address.value;

            phone = document.login_form.phone.value;
            var phNum = /^98[0-9]{8}$/;

            pass = document.login_form.nPass.value;

            email = document.login_form.email.value;
            var mailformat = /^\w+([\.]?\w+)*@\w+([\.]?\w+)*(\.\w{2,3})$/;


            if(!email.match(mailformat)){
                alert("Enter valid email");
                return false;
            }

            if(pass == "" || pass.length < 5){
                alert("Enter a password with more than 5 characters");
                return false;
            }

            if (fullname == "") {
                alert("Please dont leave fullname field empty.");
                return false;
            }

            if(!phone.match(phNum)){
                alert("Enter valid phone number");
                return false;
            }

            if (address == "") {
                alert("Please dont leave address field empty.");
                return false;
            }

        }
    </script>
</body>
</html>
