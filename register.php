<?php
    include "./config.php";
    if (isset($_POST['sub'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $uname = mysqli_real_escape_string($conn, $_POST['nUser']);
        $pass = md5($_POST['nPass']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $fname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);

        $select = "SELECT * FROM login WHERE username = '$uname' && email = '$email'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'User already exists';
        }else{
            $insert = "INSERT INTO login(email, username, password, phone, fullname, address) VALUES('$email','$uname', '$pass', '$phone', '$fname', '$address')";
            mysqli_query($conn, $insert);
            header('location:login.php');
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
    <link href="style.css" rel="stylesheet"/>
</head>
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
            <h1 class="log">Login</h1>
                <form action="" method="POST" name="login_form" enctype="multipart/form-data">
                    <?php
                        if(isset($error)){
                            foreach ($error as $error) {
                                echo '<span>'.$error.'</span>';
                            }      
                        }
                    ?>
                    <p><input required type="email" placeholder="E-mail" name="email" class="fin"></p>
                    <p><input required type="text" placeholder="Username" name="nUser" class="fin"></p>
                    <p><input required type="password" placeholder="Password" name="nPass" class="fin"></p>
                    <p><input required type="text" placeholder="Full Name" name="fullname" class="fin"></p>
                    <p><input required type="text" placeholder="Phone" name="phone" class="fin"></p>
                    <p><input required type="text" placeholder="Address" name="address" class="fin"></p>
                    <button type="submit" class="but" name="sub">Register</button>
                    <p class="new">Already have an account? <a href="./login.php#form">Log in</a></p>
                </form>
        </div>
    </section>       
</body>
</html>
