<?php
session_start();
include("db.php");  // Make sure db.php sets up $conn

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['login_email'] ?? '';
    $password = $_POST['login_password'] ?? '';

    // Validate and sanitize
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to match email and password from userdata
    $sql = "SELECT * FROM userdata WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['userid'] = $user['id'];
        $_SESSION['username'] = $user['name'];
        $_SESSION['usertype'] = $user['type'];
        header("Location: dashboard.php"); // ✅ Redirect to dashboard
        exit();
    } else {
        // ❌ Wrong login
        header("Location: index.php?emailmsg=Invalid Email or Password");
        exit();
    }
}
?>
