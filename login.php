<?php
    session_start();
    include "./config.php";
    if (isset($_POST['sub'])) {
        $uname = mysqli_real_escape_string($conn, $_POST['uname']);
        $pass = md5($_POST['pass']);

        $select = "SELECT * FROM login WHERE username = '$uname'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            
            $row = mysqli_fetch_array($result);

            if($row['user_type'] == 'user'){
                $_SESSION['user_name'] = $row['username'];
                header('location:user_panel.php');
            }elseif ($row['user_type'] == 'admin') {
                $SESSION['user_name'] = $row['username'];
                header('location:admin_panel.php');
            }else {
            $error[] = 'Invalid Username or Password';
            }
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
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
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
                        <p><input required type="text" placeholder="Username" name="uname" class="fin"></p>
                        <p><input required type="password" placeholder="Password" name="pass" class="fin"></p>
                        <p class="rem"><input type="checkbox" name="remember" class="check">Remember me</p>
                        <button type="submit" class="but" name="sub">Sign In</button>
                        <p class="new">Don't have and account? <a href="./register.php#new_form">Sign up</a></p>
                    </form>
                </div>
    </section>
</body>
</html>