<?php
    session_start();
    function logged_in(){
        if(!isset($_SESSION['login_user'])){
            echo "<a href='login.php'>Login</a>";
        }else {
            echo "<div class='dropdown'><button onclick='dropdown()' class='dropbtn'>" . $_SESSION['login_user'] . "</button>
            <div id='myDropdown' class='dropdown-content'>
            <a href='widgets/panel_select.php'>Account Settings</a>
            <a href='logout.php'>Logout</a>
            </div>
            </div>"
            ;
        }
    }
?>