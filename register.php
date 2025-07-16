<!-- register.php -->
<?php
include("data_class.php");

$msg = "";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $obj = new data();
    $obj->setconnection();
    $obj->addnewuser($name, $email, $password, "Student");
    $msg = "Registration successful! You can now login.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="text-center mb-4">Student Registration</h3>

    <?php if ($msg): ?>
    <div class="alert alert-success"><?php echo $msg; ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" required class="form-control">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required class="form-control">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" required class="form-control">
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Register">
        <a href="index.php" class="btn btn-link">Back to Login</a>
    </form>
</div>

</body>
</html>
