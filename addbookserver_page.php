<?php
// addbookserver_page.php
include("data_class.php");

$bookname = $_POST['bookname'];
$bookdetails = $_POST['bookdetails'];
$bookauthor = $_POST['bookauthor'];
$bookpub = $_POST['bookpub'];
$branch = isset($_POST['branch']) ? $_POST['branch'] : '';
$bookprice = $_POST['bookprice'];
$bookquantity = $_POST['bookquantity'];

if (move_uploaded_file($_FILES["bookphoto"]["tmp_name"], "uploads/" . $_FILES["bookphoto"]["name"])) {
    $bookpic = $_FILES["bookphoto"]["name"];

    $obj = new data();
    $obj->setconnection();
    $obj->addbook($bookpic, $bookname, $bookdetails, $bookauthor, $bookpub, $branch, $bookprice, $bookquantity);
} else {
    echo "Error uploading file: " . $_FILES["bookphoto"]["error"];
}
?>





