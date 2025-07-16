<?php
$emailmsg = $pasdmsg = $msg = $ademailmsg = $adpasdmsg = "";

if (!empty($_GET['ademailmsg'])) $ademailmsg = $_GET['ademailmsg'];
if (!empty($_GET['adpasdmsg'])) $adpasdmsg = $_GET['adpasdmsg'];
if (!empty($_GET['emailmsg'])) $emailmsg = $_GET['emailmsg'];
if (!empty($_GET['pasdmsg'])) $pasdmsg = $_GET['pasdmsg'];
if (!empty($_GET['msg'])) $msg = $_GET['msg'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GCE Gaya Library Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

   <style>
    body {
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg,rgb(116, 235, 166), #acb6e5);
    font-family: Arial, sans-serif;
    min-height: 100vh;
}

.header-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
}

.header-logo img {
    width: 80px;
    height: auto;
    margin-right: 15px;
}

.page-title {
    text-align: center;
    color: white;
    font-size: 34px;
    font-weight: bold;
    margin: 10px 0 30px;
}

.page-title i {
    margin-right: 10px;
}

.login-container {
    padding: 30px;
}

.login-form-box {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
}

.login-form-box:hover {
    transform: translateY(-5px);
}

.login-form-1 {
    background: #d1e7ff;
}

.login-form-2 {
    background: #f9d6d5;
}

h3 {
    text-align: center;
    margin-bottom: 25px;
    font-weight: 600;
}

.btnSubmit {
    width: 100%;
    padding: 10px;
    background: #343a40;
    color: white;
    border: none;
    border-radius: 5px;
    font-weight: bold;
}

.btnSubmit:hover {
    background: #23272b;
}

label {
    font-size: 14px;
}

.ForgetPwd {
    display: block;
    margin-top: 10px;
    text-align: right;
    font-size: 13px;
    color: #007bff;
}

.error-msg {
    color: red;
    font-size: 14px;
}

.main-msg {
    text-align: center;
    color: red;
    margin-bottom: 20px;
    font-weight: bold;
}
   </style>     
</head>
<body>
    


    <!-- Logo and Heading -->
    <div class="header-logo">
        <img src="gcelogo.png" alt="GCE Gaya Logo">
        <div class="page-title">
            <i ></i> GCE Gaya Library Management System 📚
        </div>
    </div>

    <!-- Message Display -->
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-8 main-msg">
                <?php echo $msg; ?>
            </div>
        </div>

        <!-- Login Forms -->
        <div class="row">
            <!-- Student Login -->
            <div class="col-md-6">
                <div class="login-form-box login-form-1">
                    <h3>Student Login</h3>
             <form action="login_server_page.php" method="post"> <!-- ✅ Changed from GET to POST -->
         <div class="form-group">
           <input type="text" class="form-control" name="login_email" placeholder="Your Email *" required />
             <label class="error-msg"><?php echo $emailmsg; ?></label>
         </div>
        <div class="form-group">
        <input type="password" class="form-control" name="login_password" placeholder="Your Password *" required />
        <label class="error-msg"><?php echo $pasdmsg; ?></label>
         </div>
       <div class="form-group">
          <input type="submit" class="btnSubmit" value="Login" />
         </div>
        <div class="form-group">
          <a href="forgot_password.php" class="ForgetPwd">Forgot Password?</a>
        </div>
       </form>
 
                </div>
            </div>

            <!-- Admin Login -->
            <div class="col-md-6">
                <div class="login-form-box login-form-2">
                    <h3>Admin Login</h3>
                    <form action="loginadmin_server_page.php" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" name="login_email" placeholder="Admin Email *" />
                            <label class="error-msg"><?php echo $ademailmsg; ?></label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="login_pasword" placeholder="Admin Password *" />
                            <label class="error-msg"><?php echo $adpasdmsg; ?></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>

                        <div class="form-group">
                        <a href="forgot_password.php" class="ForgetPwd">Forgot Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>