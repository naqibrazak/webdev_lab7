<?php

session_start();

// if not logged in, redirect to login page
if (!isset($_SESSION['matric'])) {
    header("Location: login.php");
    exit;
}

// include database connection
include 'db.php';

// fetch all users
$result = mysqli_query($connection, "SELECT * FROM users");
?>

<link rel="stylesheet" href="style.css">

<h2>User List</h2>

<!-- Display table -->
<table border="1">
    <tr>
        <th>Matric</th>
        <th>Name</th>
        <th>Level</th>
        <th>Action</th>
    </tr>

    <!-- Loop through each user in the table -->
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['matric'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['role'] ?></td>
            <td>
                <!-- Pass matric id to edit page -->
                <a href="edit.php?matric=<?= $row['matric'] ?>">Update</a> |
                <a href="delete.php?matric=<?= $row['matric'] ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<!-- Logout link -->
<br>
<a href="logout.php" class="logout-link">Logout</a>
