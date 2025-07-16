<?php
include("data_class.php");

$userid = $_POST['userid'];
$username = $_POST['username'];
$issuebook = $_POST['issuebook'];
$issuetype = $_POST['issuetype'];
$issuedays = $_POST['issuedays'];
$issuedate = $_POST['issuedate'];
$returndate = $_POST['returndate'];

$obj = new data();
$obj->setconnection();
$obj->issueBook($userid, $username, $issuebook, $issuetype, $issuedays, $issuedate, $returndate);
?>
