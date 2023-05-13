<?php
    include "./config.php";
    
    // $sql = "CREATE TABLE payment(
    //     payment_id INT NOT NULL,
    //     payment_date DATE NOT NULL,
    //     mode VARCHAR(20) NOT NULL,
    //     amount INT NOT NULL,
    //     customer_id bigint NOT NULL,
    //     FOREIGN KEY(customer_id) references login(id)
    // )";

    // mysqli_query($conn, $sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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
        <div id="form">
            <h1 class="log">Payment Portal</h1>
            <form action="#" method="POST" name="payment" enctype="multipart/form-data">
                <?php
                    if(isset($error)){
                        foreach ($error as $error) {
                        echo '<span>'.$error.'</span>';
                        }      
                    }
                ?>
                <p><input required type="text" placeholder="Payment Id" name="pid" class="fin"></p>
                <p><input required type="text" placeholder="Payment Date" name="pdate" class="fin"></p>
                <p><input required type="text" placeholder="Mode" name="mode" class="fin"></p>
                <p><input required type="text" placeholder="Amount" name="amount" class="fin"></p>
                <p><select name="uid" class="fin">
                    <?php
                        $sql = "SELECT id FROM user";
                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result -> fetch_assoc()) {?>
                            <option value="<?php echo $row['id'];?>">
                                <?php echo $row ['id'];?>
                            </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </p>
                <button type="submit" class="but" name="sub">Pay</button>
            </form>
        </div>
    </section>
</body>
</html>