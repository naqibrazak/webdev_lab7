<?php
// Start session so user data persists across pages
session_start();

// Include database connection
include 'db.php';
?>

<link rel="stylesheet" href="style.css">

<h2>Login</h2>

<!-- Login form -->

<form method = "POST">
    Matric: <input type="text" name="matric" required><br><br>
    Password: <input type="password" name="password" required><br><br>

    <button type="submit" name="login">Login</button>
</form>

<!-- Link to register page -->
<a href="register.php" class="form-link">Register</a>

<?php
// Process login form

if (isset($_POST['login'])) {

    $matric = $_POST['matric'];
    $password = md5($_POST['password']);  // encrypt passwordfor comparison

    // check if user exists
    $query = "SELECT * FROM users WHERE matric='$matric' AND password='$password'";
    $result = mysqli_query($connection, $query);

    // if a match was found, login is success 
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['matric'] = $matric;     // save user session
        header("Location: display.php");   // redirect to display page
        exit;
    } 
    
    else {
        // login failed
        echo "<p class='error-message'>Invalid username or password, try login again.</p>";
    }
}
?>
