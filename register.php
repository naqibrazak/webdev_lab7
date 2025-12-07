<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <h2>Registration Form</h2>

        <!--
            Registration form to insert new users into the database.
            Method POST ensures data is hidden in the request.
        -->

        <form method="POST">
            Matric: <input type="text" name="matric" required><br><br>
            Name: <input type="text" name="name" required><br><br>
            Password: <input type="password" name="password" required><br><br>

        <!-- Dropdown for access level -->

            Role:
            <select name="role" required>
                <option value="">Please select</option> <!-- Default placeholder -->
                <option value="student">Student</option>
                <option value="lecturer">Lecturer</option>
            </select><br><br>

            <button type="submit" name="register">Submit</button>
        </form>

        <!-- Link to Login page -->
        <a href="login.php" class="form-link">Already have an account? Login</a>

    </body>
</html>

<?php

// Process regisration form

if (isset($_POST['register'])) {

    // get values from form
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $password = md5($_POST['password']);  // encrypt password using MD5
    $role = $_POST['role'];

    // insert new user into DB
    $query = "INSERT INTO users (matric, name, password, role) 
            VALUES ('$matric', '$name', '$password', '$role')";

    mysqli_query($connection, $query);

    echo "<p class='success-message'>Registration successful!</p>";
}
?>