<?php
include("data_class.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$type = $_POST['type'];

$obj = new data();
$obj->setconnection();
$obj->addnewuser($name, $email, $password, $type);
?>
