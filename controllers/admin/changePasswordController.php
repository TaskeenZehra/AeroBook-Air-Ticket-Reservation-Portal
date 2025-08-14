<?php
require_once '../../models/database_connect.php';

session_start();

if (!isset($_SESSION['loggedinuser'])) {
    header("Location: ../../views/Login.php");
    exit();
}

// Initialize variables to avoid undefined variable warnings
$cpass = $npass = $cfpass = "";
$err_cpass = $wrong_cpass = $err_npass = $err_cfpass = $wrong_pass = "";
$has_err = false;

if (isset($_POST['change'])) {
    $uname = $_SESSION['loggedinuser'];

    // Validate current password
    if (empty($_POST['cpass'])) {
        $err_cpass = '*Current Password Required.';
        $has_err = true;
    } else {
        $cpass = trim($_POST['cpass']);
        // Use prepared statement to fetch current password securely
        $conn = getConnection(); // Assuming this function returns mysqli connection
        $stmt = $conn->prepare("SELECT pass FROM users WHERE uname = ?");
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $pass = $row['pass'];

            // If you store hashed passwords, verify using password_verify here
            if ($pass !== $cpass) {
                $wrong_cpass = "*Current Password Doesn't Match.";
                $has_err = true;
            }
        } else {
            $wrong_cpass = "*User not found.";
            $has_err = true;
        }

        $stmt->close();
        $conn->close();
    }

    // Validate new password
    if (empty($_POST['npass'])) {
        $err_npass = '*New Password Required.';
        $has_err = true;
    } else {
        $npass = trim($_POST['npass']);
    }

    // Validate confirm password
    if (empty($_POST['cfpass'])) {
        $err_cfpass = '*Confirm Password Required.';
        $has_err = true;
    } else {
        $cfpass = trim($_POST['cfpass']);
    }

    // Check if new password and confirm password match
    if (!$has_err && ($npass !== $cfpass)) {
        $wrong_pass = "*New Password and Confirm Password do not match.";
        $has_err = true;
    }

    // If no errors, update the password
    if (!$has_err) {
        $conn = getConnection();

        // If you hash passwords, do it here, e.g.:
        // $hashed_pass = password_hash($cfpass, PASSWORD_DEFAULT);
        // For now, plain text (not recommended):
        $hashed_pass = $cfpass;

        $stmt = $conn->prepare("UPDATE users SET pass = ? WHERE uname = ?");
        $stmt->bind_param("ss", $hashed_pass, $uname);

        if ($stmt->execute()) {
            echo "<script>alert('Password Changed!'); location.href='../../views/admin/addFlight.php';</script>";
            exit();
        } else {
            $wrong_pass = "Failed to update password. Please try again.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
