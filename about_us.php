<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="Website Icon" type="png" href="./assets/Cyan on Black.png">
    <link rel="stylesheet" href="style.css">
    <script src="dropdown.js"></script>
</head>
<body>
    <header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about_us.php" class="active">About</a></li>
                <?php
                    include 'widgets/logged_in.php';
                    logged_in();
                ?>
            </ul>
        </nav>
    </header>
    <div id="main">
      <section id="billboard">
        <h1 style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Welcome to Vehicle Booking and Rental System!</h1><br>
        <h4 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">We are a team of passionate car enthusiasts who understand the importance of having a reliable and comfortable vehicle. We strive to provide our customers with the best selection of vehicles at competitive prices.
          <br><br>
          Our mission is to make buying and renting vehicles a hassle-free experience. We believe that everyone deserves to have a car that fits their needs and budget. That's why we offer a wide variety of vehicles to choose from, ranging from compact cars to luxury SUVs. We also provide flexible rental options to accommodate different lifestyles and travel plans.
          <br><br>
          At our website, we prioritize customer satisfaction above everything else. We are committed to providing excellent customer service and ensuring that each customer receives personalized attention. Our knowledgeable staff members are always ready to assist you with any questions or concerns you may have.
          <br><br>
          We believe in transparency and honesty in all our business dealings. We provide detailed information about each vehicle's features, condition, and history to help you make an informed decision. We also offer competitive pricing and financing options to ensure that you get the best value for your money.
          <br><br>
          We are proud to be a reliable and trusted source for buying and renting vehicles. We have served many satisfied customers over the years, and we look forward to helping you find the perfect vehicle for your needs. Thank you for choosing us, and we hope to see you soon!</h4>
          <br><br>
          <hr>
          <footer>
            <br>  
              <h3 style="margin: 0; text-align: left; padding-top:30px; text-align: center; font-weight: 500;">Customer Testimonials</h3>
            <br>
          <div class="test_collection">
            <div class="padding">
              <div class="test">
                <img class="avatar" src="./assets/avatar1.jpg" alt=""><h5 class=test_name>Shreyan Bhandari</h5>
                <p class="test_text">Loved the customer service. The delivery process was also great.</p>
              </div>
            </div>
            <div class="padding">
              <div class="test">
                <img class="avatar" src="./assets/avatar2.jpg" alt=""><h5 class=test_name>Raunak Khadka</h5>
                <p class="test_text">I had bought a Ford F-150 Raptor from here. The experience of buying with them was splendid😄.</p>
              </div>
            </div>
            <div class="padding">
              <div class="test">
                <img class="avatar" src="./assets/avatar3.jpg" alt=""><h5 class=test_name>Jubin Karki</h5>
                <p class="test_text">We rented a SUV for our trip to Pokhara. Our trip went great thanks to these guys at VBRS.</p>
                
              </div>
            </div>
          </div>
          </footer>
      </section>
    </div>
</body>
</html>