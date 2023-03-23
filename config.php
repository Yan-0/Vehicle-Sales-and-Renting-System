<?php
$databaseHost = 'localhost';//or localhost
$databaseName = 'SAutomobiles'; // your db_name
$databaseUsername = 'root'; 
// root by default for localhost 
$databasePassword = '';  // by defualt empty for localhost
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
?>