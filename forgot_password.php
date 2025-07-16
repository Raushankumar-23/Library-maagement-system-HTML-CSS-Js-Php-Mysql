<!-- forgot_password.php -->
<?php
$msg = "";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $msg = "If this email exists, instructions have been sent.";
    // OTP or reset logic can be added here
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="text-center mb-4">Forgot Password</h3>

    <?php if ($msg): ?>
    <div class="alert alert-info"><?php echo $msg; ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="form-group">
            <label>Enter your registered email:</label>
            <input type="email" name="email" required class="form-control">
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Send Reset Link">
        <a href="index.php" class="btn btn-link">Back to Login</a>
    </form>
</div>

</body>
</html>
