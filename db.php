<?php

// Database connection

$connection = mysqli_connect("localhost", "root", "", "Lab_7");


// if the connection fails, stop
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>