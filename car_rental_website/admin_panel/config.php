<?php
//Database connection
$servername = "localhost";
$server_username = "root";
$server_password = "";
$dbname = "administrator";
       // Create connection
       $conn = mysqli_connect($servername, $server_username, $server_password, $dbname);
       // Check connection
       if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
       }
       ?>

