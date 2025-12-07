<?php
session_start();
if (!isset($_SESSION['matric'])) {
    header("Location: login.php");
    exit;
}

include "db.php";

// Get matric from URL
$matric = $_GET['matric'];

// Delete user from database
mysqli_query($connection, 
    "DELETE FROM users WHERE matric='$matric'"
);

// Redirect back to table
header("Location: display.php");
?>
