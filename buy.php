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
    <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-left: 5px; color: white;">
        Let's get you a vehicle</h1>
        <h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; padding-left: 10px; color: white;">Currently we have these in stock</h2>
    <section id="table">
    <table>
        <tr>
            <th></th>
            <th>Model Name</th>
            <th>Vehicle Type</th>
            <th>Vehicle Info</th>
            <th>Price</th>
        </tr>
        <tr>
            <td><img src="./assets/2023-BMW-3-Series-6.webp" alt=""></td>
            <td>2023 BMW-3 Series 6</td>
            <td>Sedan</td>
            <td>BMW's quintessential sports sedan gets a tech-heavy makeover for 2023 that sees updated exterior styling and a dramatic new all-digital dashboard. Keen eyes will notice that this same monolithic display that stretches two-thirds of the 3-series's dashboard is the same design as what you'll find in the brand's flagship 7-series and electric iX SUV. </td>
            <td>$43,000<br><br><a href="booking.php"><button class="booking">Book now</button></a></td>
        </tr>
        <tr>
            <td><img src="./assets/land-cruiser-lc-300.webp" alt=""></td>
            <td>2023 Toyota LC300</td>
            <td>SUV</td>
            <td>The LandCruiser always had a spirit of exploration and discovery backed by an incredible ability to perform in the most rugged conditions the world has on offer. The LandCruiser 300 continues this spirit giving you the performance to get out there and back with confidence.</td>
            <td>$89,990<br><br><a href="booking.php"><button class="booking">Book now</button></a></td>
        </tr>
        <tr>
            <td><img src="./assets/2021-MB-Eclass.webp" alt=""></td>
            <td>2021 Mercedes-Benz E-Class</td>
            <td>Sedan</td>
            <td>The E-Class is Mercedes-Benz's well-established and highly regarded midsize offering, a luxurious model available as a 4-door sedan, a station wagon, a 2-door coupe and an open-top cabriolet.</td>
            <td>$57,800<br><br><a href="booking.php"><button class="booking">Book now</button></a></td>
        </tr>
        <tr>
            <td><img src="./assets/Ford-F150-2023.avif" alt=""></td>
            <td>2023 Ford F-150 Raptor</td>
            <td>Truck</td>
            <td>The Ford F-150 Raptor is a SCORE off-road trophy truck living in an asphalt world. It wears extra-wide fenders, long-travel suspension, big tires, and the high-performance demeanor of a Baja-bashing race truck. It even earned a place on our 10Best Trucks and SUVs list for 2023.</td>
            <td>$109,145<br><br><a href="booking.php"><button class="booking">Book now</button></a></td>
        </tr>
        <tr>
            <td><img src="./assets/RR-Sport-2023.avif" alt=""></td>
            <td>2023 Range Rover Sport</td>
            <td>SUV</td>
            <td>Handsome exterior design, high-end interior finishes, agreeable mix of comfort and sport. The latest Range Rover Sport perpetuates the nameplate's luxurious pedigree and adds more modern tech and a fresh look.</td>
            <td>$121,500<br><br><a href="booking.php"><button class="booking">Book now</button></a></td>
        </tr>
    </table>
    </section>
    <footer class="pages">
        <nav class="footer_nav">
            <ul class="footer_ul">
                <li><button class="active" onclick="window.location.href='buy.php'">1</button></li>
                <li><button onclick="window.location.href='buy-2.php'">2</button></li>
                <li><button onclick="window.location.href='buy-2.php'">Next &raquo;</button></li>
            </ul>
        </nav>
    </footer>

</body>
</html>