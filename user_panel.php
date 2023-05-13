<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="user_panel.php" class="active">User Panel</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div id="main">
      <section id="billboard">
      <div id="greeting">Welcome, 
            <?php
                include('session.php');
                echo $login_session;
            ?>
        </div>
        <div class="function">
            <button class="func_button">
                <div class="func_count">
                My Bookings
                </div>
            </button>
            <button class="func_button">
                <div class="func_count">
                Booking History
                </div>
            </button>
            <button class="func_button">
                <div class="func_count">
                Rental History
                </div>
            </button>
            <button class="func_button">
                <div class="func_count">
                Account Settings
                </div>
            </button>
        </div>
      </section>
</body>
</html>