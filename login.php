<?php
    session_start();
    include "widgets/config.php";
    if (isset($_POST['sub'])) {
        $uname = mysqli_real_escape_string($conn, $_POST['uname']);
        $pass = md5($_POST['pass']);

        $select = "SELECT * FROM user WHERE email = '$uname' or phone = '$uname' and password = '$pass'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_array($result);

            if($row['user_type'] == 'user'){
                $_SESSION['login_user'] = $row['fullname'];
                header('location:index.php');
            }
            elseif($row['user_type'] == 'admin') {
                $_SESSION['login_user'] = $row['fullname'];
                header('location:index.php');
            }
        }else{
            $error[] = 'Invalid E-mail or Password';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="Website Icon" type="png" href="./assets/Cyan on Black.png">
    <link href="style.css" rel="stylesheet"/>
</head>
<body style="background-image: url(assets/skin.jpg)">
<header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about_us.php">About</a></li>
                <li><a href="login.php" class="active">Login</a></li>
            </ul>
        </nav>
    </header>
    <section class="all">
        <div id="form">
            <h1 class="log">Login</h1>
            <form action="#" method="POST" name="login_form" enctype="multipart/form-data">
                <?php
                    if(isset($error)){
                        foreach ($error as $error) {
                        echo '<span>'.$error.'</span>';
                        }      
                    }
                ?>
                <p><input required type="text" placeholder="E-mail or Phone" name="uname" class="fin"></p>
                <p><input required type="password" placeholder="Password" name="pass" class="fin"></p>
                <p class="rem"><input type="checkbox" name="remember" class="check">Remember me</p>
                <button type="submit" class="but" name="sub" onclick="login()">Sign In</button>
                <p class="new">Don't have an account? <a href="./register.php#new_form">Register new account</a></p>
            </form>
        </div>
    </section>

    <script>
    function login(){
        id = document.login_form.uname.value;
        pass = document.login_form.pass.value;

        if (id == "" || pass == "") {
            alert("Enter login credentials");
            return false;
        }

    }
    </script>
</body>
</html>