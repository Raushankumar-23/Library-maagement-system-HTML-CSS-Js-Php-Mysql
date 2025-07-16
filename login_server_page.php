<?php
session_start();
include("data_class.php");

if (isset($_POST['login_email']) && isset($_POST['login_password'])) {
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    $obj = new data();
    $obj->setconnection();
    $conn = $obj->getconnection(); // ✅ Use getter method

    $stmt = $conn->prepare("SELECT * FROM userdata WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['userid'] = $user['id'];
        $_SESSION['username'] = $user['name'];
        $_SESSION['usertype'] = $user['type'];
        $_SESSION['email'] = $user['email'];

        header("Location: student_dashboard.php");
        exit();
    } else {
        header("Location: login.php?msg=Invalid+Email+or+Password");
        exit();
    }
} else {
    header("Location: login.php?msg=Invalid+Request");
    exit();
}
?>
