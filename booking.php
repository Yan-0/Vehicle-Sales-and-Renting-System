<?php
    include "./config.php";
    if (isset($_POST['sub'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);

        $select = "SELECT * FROM bookings WHERE fullname = '$fullname' && email = '$email'";

        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){
            $error[] = 'You already have a booking pending.';
        }elseif ($country == 0) {
            $error[] = 'Please select a country.';
        }else{
            $insert = "INSERT INTO bookings(fullname, phone, email, address, country) VALUES('$fullname', '$phone', '$email', '$address', '$country')";
            mysqli_query($conn, $insert);
        }
    }

// if (isset($_POST["autofill"])) {
      
//     // Get corresponding first name and 
//     // last name for that user id    
//     $query = mysqli_query($conn, "SELECT fullname, 
//     email, phone, address, country FROM login WHERE $_SESSION['login_user']='$fullname'");
  
//     $row = mysqli_fetch_array($query);
  
//     // Get the first name
//     $fullname = $row["fullname"];
//     $phone = $row["phone"];
//     $address = $row["address"];
//     $country = $row["country"];
//     $email = $row["email"];  
    
// }
  
// // Store it in a array
// $result = array("$fullname", "$phone", "$address", "$country", "$email");
  
// // Send in JSON encoded form
// $myJSON = json_encode($result);
// echo $myJSON;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Portal</title>
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
                <div id="booking_form">
                    <h1 class="log">Enter your credentials</h1>
                    <form action="" method="POST" name="login_form" enctype="multipart/form-data">
                        <?php
                            if(isset($error)){
                                foreach ($error as $error) {
                                    echo '<span>'.$error.'</span><br>';
                                }      
                            }
                            if(isset($insert)){
                                echo '<span style = "background: green;">'."Registration Successful".'</span><br>';
                            }
                        ?>
                        <input required type="text" placeholder="Full Name" name="fullname" class="fin" required><br><br>
                        <input required type="text" placeholder="Phone" name="phone" class="fin" required><br><br>
                        <input required type="text" placeholder="Address" name="address" class="fin" required><br><br>
                        <select name="country" class="fin" required>
                            <option value="0">Select a Country</option>
                            <option value="Nepal">Nepal</option>
                        </select><br><br>
                        <input required type="email" placeholder="E-mail" name="email" class="fin" required><br><br><br><br><br>
                        <?php 
                        // if(isset($_SESSION['login_user'])){
                        //     echo "<button onclick='autofill()' id='auto' name='autofill'>Use account information for booking</button><br><br>";
                        // }
                        ?>
                        <button type="submit" class="but" name="sub" onclick="valid()">Confirm Booking</button>
                        <p class="info1">*We might give you a call to confirm your booking</p>
                        <p class="info2">*Please enter all information correctly.</p>
                    </form>
                </div>
    </section>
    <script>
        function valid(){

            phone = document.login_form.phone.value;
            var phNum = /^98[0-9]{8}$/;

            email = document.login_form.email.value;
            var mailformat = /^\w+([\.]?\w+)*@\w+([\.]?\w+)*(\.\w{2,3})+$/;


            if(!phone.match(phNum)){
                alert("Enter valid phone number");
                return false;
            }

            if(!email.match(mailformat)){
                alert("Enter valid email");
                return false;
            }

        }

        // function GetDetail(str) {
        //     if (str.length == 0) {
        //         document.getElementById("first_name").value = "";
        //         document.getElementById("last_name").value = "";
        //         return;
        //     }
        //     else {
  
        //         // Creates a new XMLHttpRequest object
        //         var xmlhttp = new XMLHttpRequest();
        //         xmlhttp.onreadystatechange = function () {
  
        //             // Defines a function to be called when
        //             // the readyState property changes
        //             if (this.readyState == 4 && 
        //                     this.status == 200) {
                          
        //                 // Typical action to be performed
        //                 // when the document is ready
        //                 var myObj = JSON.parse(this.responseText);
  
        //                 // Returns the response data as a
        //                 // string and store this array in
        //                 // a variable assign the value 
        //                 // received to first name input field
                          
        //                 document.getElementById
        //                     ("first_name").value = myObj[0];
                          
        //                 // Assign the value received to
        //                 // last name input field
        //                 document.getElementById(
        //                     "last_name").value = myObj[1];
        //             }
        //         };
  
        //         // xhttp.open("GET", "filename", true);
        //         xmlhttp.open("GET", "gfg.php?user_id=" + str, true);
                  
        //         // Sends the request to the server
        //         xmlhttp.send();
        //     }
        // }
    </script>
</body>
</html>
