<?php
    include "widgets/config.php";
    include "widgets/session.php";
    if (isset($_POST['sub'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = md5($_POST['nPass']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $fname = mysqli_real_escape_string($conn, $_POST['active_id']);

        $select = "SELECT * FROM user WHERE phone = '$phone' || email = '$email'";

        $result = mysqli_query($conn, $select);

        if(!mysqli_num_rows($result) > 0){
            if(!empty($email)){
                $email_update = "UPDATE user SET email = '$email' WHERE fullname = '$fname'";
                mysqli_query($conn, $email_update);
            }
            if(!empty($pass)){
                $pass_update = "UPDATE user SET password = '$pass' WHERE fullname = '$fname'";
                mysqli_query($conn, $pass_update);
            }
            if(!empty($phone)){
                $phone_update = "UPDATE user SET phone = '$phone' WHERE fullname = '$fname'";
                mysqli_query($conn, $phone_update);
            }
        }else {
            $error[] = 'Another user with same credentials already exists';
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="user_panel.php" class="active">User Settings</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div id="main">
      <section id="billboard">
      <div id="form">
            <h1 class="log">Account Settings</h1>
                <form action="" method="POST" name="acc_sett" enctype="multipart/form-data">
                    <?php
                        if(isset($error)){
                            foreach ($error as $error) {
                                echo '<span>'.$error.'</span><br><br><br>';
                            }      
                        }
                        if(isset($email_update)){
                            echo '<span style = "background: green;">'."Email Updated".'</span><br><br><br>';
                        }
                        if(isset($phone_update)){
                            echo '<span style = "background: green;">'."Phone Number Updated".'</span><br><br><br>';
                        }
                        if (isset($pass_update)) {
                            echo '<span style = "background: green;">'."Password Updated".'</span><br><br><br>';
                        }
                    ?>
                    <div id="acc_sett"> 
                    Change E-mail: <input type="email" placeholder="New e-mail" name="email" class="fin"><br>
                    Change Password: <input type="password" placeholder="New password" name="nPass" class="fin"><br>
                    Change Phone Number: <input type="text" placeholder="New phone number" name="phone" class="fin"><br>
                    <input type="text" name="active_id" value="<?php echo $login_session;?>" /hidden>
                    </div>
                    <p><button type="submit" id="sett_but" name="sub" onclick = "valid()">Confirm</button></p>
                </form>
        </div>
      </section>
      <script>
        function valid(){

        phone = document.acc_sett.phone.value;
        var phNum = /^98[0-9]{8}$/;

        pass = document.acc_sett.nPass.value;

        email = document.acc_sett.email.value;
        var mailformat = /^\w+([\.]?\w+)*@\w+([\.]?\w+)*(\.\w{2,3})$/;


        if(email.length >= 1 && !email.match(mailformat)){
            alert("Enter valid email");
            return false;
        }

        if(pass.length >=1 && pass.length < 5){
            alert("Enter a password with more than 5 characters");
            return false;
        }

        if(phone.length >= 1 && !phone.match(phNum)){
            alert("Enter valid phone number");
            return false;
        }

        }
      </script>
</body>
</html>