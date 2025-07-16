<?php
session_start();
include("data_class.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $bookname = $_POST['bookname'];
    $usertype = $_POST['usertype'];
    $issuedays = $_POST['issuedays'];
    
    $obj = new data();
    $obj->setconnection();

    $issuedate = date("Y-m-d");
    $returndate = date("Y-m-d", strtotime("+$issuedays days"));

    // Insert into issuebook
    $stmt = $obj->getconnection()->prepare("INSERT INTO issuebook (userid, username, issuebook, issuetype, issuedays, issuedate, returndate) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$userid, $username, $bookname, $usertype, $issuedays, $issuedate, $returndate]);

    // Delete from requestbook
    $del = $obj->getconnection()->prepare("DELETE FROM requestbook WHERE userid = ? AND bookname = ?");
    $del->execute([$userid, $bookname]);

    header("Location: approve_requests.php?msg=Book+Approved+Successfully");
    exit();
}
?>
