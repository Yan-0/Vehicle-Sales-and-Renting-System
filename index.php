<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Booking & Rental System</title>
    <link rel="Website Icon" type="png" href="./assets/Cyan on Black.png">
    <link rel="stylesheet" href="style.css">
    <script src="dropdown.js"></script>
</head>
<body>
    <header>
        <a class="logo-all" href="welcome.php"><img class="logo" src="./assets/Cyan on Black.png" alt="logo"><h4 class="am">Automobiles</h4></a>
        <nav>
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="about_us.php">About</a></li>
                <?php
                    include 'widgets/logged_in.php';
                    logged_in();
                ?>
            </ul>
        </nav>
    </header>
    <div id="main">
      <section id="billboard">
        <h1 style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Do you feel like Buying or Renting today?</h1>
        <h4 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Motorbikes, Cars, Vans, Buses. We have it all!</h4>
        <div class="option">
            <div class="opt1">
                <a id="bv" href="buy.php">
                    <img src="./assets/drive.jpg" alt="">
                    <button class="butt">I'm Buying</button>
                </a>
            </div>
            <div class="opt2">
                <a id="bv" href="rental.php">
                    <img src="./assets/rent.jpg" alt="">
                    <button class="butt">I'm Renting</button>
                </a>
            </div>
        </div>
      </section>
      <footer id="footer">
      <div class="social-links-footer">
                <h2>Follow us</h2>
        </div>
        <div class="social-links">
                    <ul>
                        <li class="fb-icon">
                            <a href="#" title="Facebook">
                                <svg aria-hidden="true" role="img" width="22" height="22">
                                    <use xlink:href="#icon-facebook" x="0" y="0"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="tw-icon">
                            <a href="#" title="Twitter">
                                <svg aria-hidden="true" role="img" width="22" height="22">
                                    <use xlink:href="#icon-twitter" x="0" y="0"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="in-icon">
                            <a href="#" title="Instagram">
                                <svg aria-hidden="true" role="img" width="22" height="22">
                                    <use xlink:href="#icon-instagram" x="0" y="0"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="yt-icon">
                            <a href="#" title="Youtube">
                                <svg aria-hidden="true" role="img" width="22" height="22">
                                    <use xlink:href="#icon-youtube" x="0" y="0"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
            </div>
        <div id="footer_contact">
            <div>
                <h3 style="margin: 0;">Contact us</h3>
                <a href="tel:+977-9861960112"><img src="./assets/Phone.png"><h5>+977-9861960112</h5></a>
                <a href="mailto:safeautomobiles@gmail.com"><img src="./assets/Email.png" alt=""><h5>vbrs@gmail.com</h5></a>
            </div>
            <div style="padding-right: 20px;">
                <h3 style="margin: 0;">Our outlets</h3>
                <h5>Budhanilkantha, Kathmandu</h5>
                <h5>Sanepa, Lalitpur</h5>
                <h5>Lakeside, Pokhara</h5>
            </div>
        </div>
      </footer>
    <svg xmlns="http://www.w3.org/2000/svg" style="height:0;position:absolute;width:0">
        <defs>
            <symbol id="icon-facebook" viewBox="0 0 32 32">
                <title>Facebook</title>
                <path fill="currentColor" stroke="" d="M29 0h-26c-1.65 0-3 1.35-3 3v26c0 1.65 1.35 3 3 3h13v-14h-4v-4h4v-2c0-3.306 2.694-6 6-6h4v4h-4c-1.1 0-2 0.9-2 2v2h6l-1 4h-5v14h9c1.65 0 3-1.35 3-3v-26c0-1.65-1.35-3-3-3z"></path>
            </symbol>
            <symbol id="icon-twitter" viewBox="0 0 32 32">
                <title>Twitter</title>
                <path fill="currentColor" stroke="" d="M32 7.075c-1.175 0.525-2.444 0.875-3.769 1.031 1.356-0.813 2.394-2.1 2.887-3.631-1.269 0.75-2.675 1.3-4.169 1.594-1.2-1.275-2.906-2.069-4.794-2.069-3.625 0-6.563 2.938-6.563 6.563 0 0.512 0.056 1.012 0.169 1.494-5.456-0.275-10.294-2.888-13.531-6.862-0.563 0.969-0.887 2.1-0.887 3.3 0 2.275 1.156 4.287 2.919 5.463-1.075-0.031-2.087-0.331-2.975-0.819 0 0.025 0 0.056 0 0.081 0 3.181 2.263 5.838 5.269 6.437-0.55 0.15-1.131 0.231-1.731 0.231-0.425 0-0.831-0.044-1.237-0.119 0.838 2.606 3.263 4.506 6.131 4.563-2.25 1.762-5.075 2.813-8.156 2.813-0.531 0-1.050-0.031-1.569-0.094 2.913 1.869 6.362 2.95 10.069 2.95 12.075 0 18.681-10.006 18.681-18.681 0-0.287-0.006-0.569-0.019-0.85 1.281-0.919 2.394-2.075 3.275-3.394z"></path>
            </symbol>
            <symbol id="icon-youtube" viewBox="0 0 32 32">
                <title>Youtube</title>
                <path fill="currentColor" stroke="" d="M31.681 9.6c0 0-0.313-2.206-1.275-3.175-1.219-1.275-2.581-1.281-3.206-1.356-4.475-0.325-11.194-0.325-11.194-0.325h-0.012c0 0-6.719 0-11.194 0.325-0.625 0.075-1.987 0.081-3.206 1.356-0.963 0.969-1.269 3.175-1.269 3.175s-0.319 2.588-0.319 5.181v2.425c0 2.587 0.319 5.181 0.319 5.181s0.313 2.206 1.269 3.175c1.219 1.275 2.819 1.231 3.531 1.369 2.563 0.244 10.881 0.319 10.881 0.319s6.725-0.012 11.2-0.331c0.625-0.075 1.988-0.081 3.206-1.356 0.962-0.969 1.275-3.175 1.275-3.175s0.319-2.587 0.319-5.181v-2.425c-0.006-2.588-0.325-5.181-0.325-5.181zM12.694 20.15v-8.994l8.644 4.513-8.644 4.481z"></path>
            </symbol>
            <symbol id="icon-instagram" viewBox="0 0 32 32">
                <title>Instagram</title>
                <path fill="currentColor" d="M16 2.881c4.275 0 4.781 0.019 6.462 0.094 1.563 0.069 2.406 0.331 2.969 0.55 0.744 0.288 1.281 0.638 1.837 1.194 0.563 0.563 0.906 1.094 1.2 1.838 0.219 0.563 0.481 1.412 0.55 2.969 0.075 1.688 0.094 2.194 0.094 6.463s-0.019 4.781-0.094 6.463c-0.069 1.563-0.331 2.406-0.55 2.969-0.288 0.744-0.637 1.281-1.194 1.837-0.563 0.563-1.094 0.906-1.837 1.2-0.563 0.219-1.413 0.481-2.969 0.55-1.688 0.075-2.194 0.094-6.463 0.094s-4.781-0.019-6.463-0.094c-1.563-0.069-2.406-0.331-2.969-0.55-0.744-0.288-1.281-0.637-1.838-1.194-0.563-0.563-0.906-1.094-1.2-1.837-0.219-0.563-0.481-1.413-0.55-2.969-0.075-1.688-0.094-2.194-0.094-6.463s0.019-4.781 0.094-6.463c0.069-1.563 0.331-2.406 0.55-2.969 0.288-0.744 0.638-1.281 1.194-1.838 0.563-0.563 1.094-0.906 1.838-1.2 0.563-0.219 1.412-0.481 2.969-0.55 1.681-0.075 2.188-0.094 6.463-0.094zM16 0c-4.344 0-4.887 0.019-6.594 0.094-1.7 0.075-2.869 0.35-3.881 0.744-1.056 0.412-1.95 0.956-2.837 1.85-0.894 0.888-1.438 1.781-1.85 2.831-0.394 1.019-0.669 2.181-0.744 3.881-0.075 1.713-0.094 2.256-0.094 6.6s0.019 4.887 0.094 6.594c0.075 1.7 0.35 2.869 0.744 3.881 0.413 1.056 0.956 1.95 1.85 2.837 0.887 0.887 1.781 1.438 2.831 1.844 1.019 0.394 2.181 0.669 3.881 0.744 1.706 0.075 2.25 0.094 6.594 0.094s4.888-0.019 6.594-0.094c1.7-0.075 2.869-0.35 3.881-0.744 1.050-0.406 1.944-0.956 2.831-1.844s1.438-1.781 1.844-2.831c0.394-1.019 0.669-2.181 0.744-3.881 0.075-1.706 0.094-2.25 0.094-6.594s-0.019-4.887-0.094-6.594c-0.075-1.7-0.35-2.869-0.744-3.881-0.394-1.063-0.938-1.956-1.831-2.844-0.887-0.887-1.781-1.438-2.831-1.844-1.019-0.394-2.181-0.669-3.881-0.744-1.712-0.081-2.256-0.1-6.6-0.1v0z"></path>
                <path fill="currentColor" d="M16 7.781c-4.537 0-8.219 3.681-8.219 8.219s3.681 8.219 8.219 8.219 8.219-3.681 8.219-8.219c0-4.537-3.681-8.219-8.219-8.219zM16 21.331c-2.944 0-5.331-2.387-5.331-5.331s2.387-5.331 5.331-5.331c2.944 0 5.331 2.387 5.331 5.331s-2.387 5.331-5.331 5.331z"></path>
                <path fill="currentColor" d="M26.462 7.456c0 1.060-0.859 1.919-1.919 1.919s-1.919-0.859-1.919-1.919c0-1.060 0.859-1.919 1.919-1.919s1.919 0.859 1.919 1.919z"></path>
            </symbol>
        </defs>
    </svg>
</body>
</html>