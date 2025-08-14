<?php
require_once '../../models/database_connect.php';

// ✅ Start session only if not already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ✅ Redirect if user is not logged in
if (!isset($_SESSION['loggedinuser'])) {
    header("Location:../../views/Login.php");
    exit();
}

// ✅ Handle logout request
if (isset($_POST['logout'])) {
    unset($_SESSION['loggedinuser']);  // Remove session variable
    session_destroy();                 // Destroy session
    header("Location:../../views/Login.php");
    exit();
}

// ✅ Fetch user info from database
$name3 = $_SESSION['loggedinuser'];
$query = "SELECT userid, fname, lname FROM users WHERE uname='$name3'";
$userName = getU($query);

// ✅ Check if user found and assign details
if (mysqli_num_rows($userName) > 0) {
    $rows = mysqli_fetch_assoc($userName);
    $name = $rows["fname"];
    $name1 = $rows["lname"];
    $id = $rows["userid"];
}
?>
