<?php
include("data_class.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userid = $_POST['userid'];
    $bookid = $_POST['bookid'];
    $username = $_POST['username'];
    $usertype = $_POST['usertype'];
    $bookname = $_POST['bookname'];
    $issuedays = $_POST['issuedays'];
    $action = $_POST['action'];

    $obj = new data();
    $obj->setconnection();

    if ($action == "approve") {
        $obj->bookRequestApprove($userid, $bookid, $username, $usertype, $bookname, $issuedays);
    } elseif ($action == "reject") {
        $stmt = $obj->getconnection()->prepare("DELETE FROM requestbook WHERE userid = ? AND bookid = ?");
        $stmt->execute([$userid, $bookid]);
        echo "<script>alert('❌ Request rejected.'); window.location.href='admin_service_dashboard.php';</script>";
    }
}
?>
