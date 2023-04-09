<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Buy a vehicle</title>
</head>
<body>
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
    <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-left: 20px; color: white;">
        Let's get you a vehicle</h1>
    <section id="table">
    <table>
        <tr>
            <th>S.N.</th>
            <th>Image</th>
            <th>Model Name</th>
            <th>Vehicle Type</th>
            <th>Vehicle Info</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>6</td>
            <td><img src="./assets/2023-Jeep-Compass.jpg" alt=""></td>
            <td>2023 Jeep Compass</td>
            <td>SUV</td>
            <td>The 2023 Jeep Compass has a new turbocharged 2.0-liter inline-four engine that cranks out 200 hp and 221 lb-ft of torque. This unit is replacing the older 2.4-liter four-cylinder engine with 180 hp and 175 lb-ft of torque. 
                This is an excellent power bump that should be noticeable behind the wheel. The old engine helped the Compass accelerate from 0 to 60 mph in about 10.1 seconds, which is underwhelming. 
            </td>
            <td>$35,745<br><br><a href="booking.php"><button class="booking">Book now</button></a></td>
        </tr>
        <tr>
            <td>7</td>
            <td><img src="./assets/2022-Toyota-Supra.jpg" alt=""></td>
            <td>2022 Toyota GR Supra</td>
            <td>Sports car</td>
            <td>The GR Supra's legendary performance and power is back for 2022, with the 3.0 and 3.0 Premium grades with a 382 hp 3.0-liter inline six-cylinder engine and the 2.0 grade with a turbocharged 2.0-liter four-cylinder in the 2.0 grade. Additionally, 600 special A91-Carbon Fiber Editions will be produced. The 2022 GR Supra also adds heated seats on the 3.0, full-screen Apple Car Play compatibility and a hot red leather trimmed interior on the 3.0 Premium.</td>
            <td>$63,280<br><br><a href="booking.php"><button class="booking">Book now</button></a></td>
        </tr>
        <tr>
            <td>8</td>
            <td><img src="https://hips.hearstapps.com/hmg-prod/images/large-52940-2023ioniq6-1669059842.jpg?crop=0.793xw:0.695xh;0.0863xw,0.216xh&resize=1200:*" alt=""></td>
            <td>Hyundai Ioniq 6</td>
            <td>Sedan EV</td>
            <td>Hyundai is blazing its own trail with the Ioniq 6's design. Its single-curved aerodynamic profile makes the sedan look a little like a smooshed VW Beetle, but it helped the Hyundai achieve a remarkably slippery 0.22 drag coefficient. Details like newly designed front and rear badges, pixel LED lighting, and minimal fender-well wheel gap catch the eye as you scan the outside of the new EV.
            The cabin uses eco-friendly materials including recycled plastics, recycled fishing net carpets, and leather dyed with flaxseed oil. Variable ambient lighting also makes an impression, with light bouncing off the surface of the door panels in such a way that you can't see the light source.</td>
            <td>$57,800<br><br><a href="booking.php"><button class="booking">Book now</button></a></td>
        </tr>
        <tr>
            <td>9</td>
            <td><img src="https://imgd.aeplcdn.com/1280x720/n/cw/ec/108425/sportster-s-right-front-three-quarter.jpeg" alt=""></td>
            <td>Harley-Davidson Sportster S</td>
            <td>Cruiser Bike</td>
            <td>Sportster™ S is the first chapter of a whole new book of the Sportster saga. A legacy born in 1957 that outperformed the competition is now rebuilt to blow away the standards of today.</td>
            <td>$15,599<br><br><a href="booking.php"><button class="booking">Book now</button></a></td>
        </tr>
    </table>
    <div id="req">
        <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-left: 20px; color: white; padding-top: 40px">Cannot find what you need?</h1>
        <a href="req_vehicle.php"><button class="req_but">Request for a vehicle</button></a>
    </div>
    </section>
    <footer class="pages">
        <nav class="footer_nav">
            <ul class="footer_ul">
                <li><button onclick="window.history.back()">&laquo; Previous</button></li>
                <li><button onclick="window.location.href='buy.php'">1</button></li>
                <li><button class="active" onclick="window.location.href='buy-2.php'">2</button></li>
            </ul>
        </nav>
    </footer>
</body>
</html>