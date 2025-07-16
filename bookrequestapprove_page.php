<?php
include("data_class.php");

$userid = $_POST['userid'];
$bookid = $_POST['bookid'];
$username = $_POST['username'];
$usertype = $_POST['usertype'];
$bookname = $_POST['bookname'];
$issuedays = $_POST['issuedays'];

$obj = new data();
$obj->setconnection();
$obj->bookRequestApprove($userid, $bookid, $username, $usertype, $bookname, $issuedays);
?>
