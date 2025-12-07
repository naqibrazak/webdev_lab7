<?php
session_start();
if (!isset($_SESSION['matric'])) {
    header("Location: login.php");
    exit;
}

include "db.php";

// Get original matric from URL
$original_matric = $_GET['matric'];

//if there is no matric in the URL, send the user back to th elist page
if (!$original_matric) {
    header("Location: display.php");
    exit;
}

// Fetch the user data
$user = mysqli_fetch_assoc(mysqli_query(
    $connection, 
    "SELECT * FROM users WHERE matric='$original_matric'"
));

// If the update button is clicked
if (isset($_POST['update'])) {

    // New input values
    $new_matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Update query — IMPORTANT: use original_matric in WHERE clause
    mysqli_query($connection, 
        "UPDATE users 
         SET matric='$new_matric', name='$name', role='$role' 
         WHERE matric='$original_matric'"
    );

    // Redirect back to the main list
    header("Location: display.php");
    exit;
}
?>

<link rel="stylesheet" href="style.css">

<h2>Edit User</h2>

<form method="POST">

    Matric:
    <input type="text" name="matric" value="<?= $user['matric'] ?>" required><br><br>

    Name:
    <input type="text" name="name" value="<?= $user['name'] ?>" required><br><br>

    Role:
    <select name="role" required>
        <option value="student" <?= $user['role']=="student" ? "selected" : "" ?>>Student</option>
        <option value="lecturer" <?= $user['role']=="lecturer" ? "selected" : "" ?>>Lecturer</option>
    </select><br><br>

    <button name="update">Update</button>

    <!-- Cancel hyperlink -->
    <a href="display.php" style="margin-left:10px;">Cancel</a>

</form>
