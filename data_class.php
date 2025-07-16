<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("db.php");

if (!class_exists('data')) {
    class data extends db {

    private $bookpic;
    private $bookname;
    private $bookdetails;
    private $bookauthor;
    private $branch;
    private $bookprice;
    private $bookquantity;
    private $type;
    private $book;
    private $userselect;
    private $days;
    private $getdate;
    private $returndate;

    function __construct() {
        // Constructor logic if needed
    }

    function adminlogin($t1, $t2) {
        $q = "SELECT * FROM admin WHERE email='$t1' AND pass='$t2'";
        $recordset = $this->connection->query($q);
        $result = $recordset->rowCount();

        if ($result > 0) {
            foreach ($recordset->fetchAll() as $row) {
                $_SESSION['adminid'] = $row['id'];
            }
            header("Location:admin_service_dashboard.php");
            exit();
        } else {
            header("Location:index.php?error=Invalid Email or Password");
            exit();
        }
    }

    function addnewuser($name, $email, $password, $type) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->type = $type;

        $q = "INSERT INTO userdata (name, email, password, type) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($q);

        if ($stmt->execute([$name, $email, $password, $type])) {
            header("Location:admin_service_dashboard.php?msg=Register+Successfully");
            exit();
        } else {
            header("Location:admin_service_dashboard.php?error=Failed+to+Register");
            exit();
        }
    }

    function addbook($bookpic, $bookname, $bookdetails, $bookauthor, $bookpub, $branch, $bookprice, $bookquantity) {
        $sql = "INSERT INTO book (bookpic, bookname, bookdetails, bookauthor, bookpub, branch, bookprice, bookquantity)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
    
        if ($stmt->execute([$bookpic, $bookname, $bookdetails, $bookauthor, $bookpub, $branch, $bookprice, $bookquantity])) {
            header("Location:admin_service_dashboard.php?msg=Successfully");
            exit();
        } else {
            header("Location:admin_service_dashboard.php?error=Failed");
            exit();
        }
    }
    function issueBook($userid, $username, $issuebook, $issuetype, $issuedays, $issuedate, $returndate) {
        $stmt = $this->connection->prepare("INSERT INTO issuebook (userid, username, issuebook, issuetype, issuedays, issuedate, returndate) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$userid, $username, $issuebook, $issuetype, $issuedays, $issuedate, $returndate]);
    
        if ($stmt) {
            echo "<script>alert('Book issued successfully'); window.location.href='dashboard.php';</script>";
        } else {
            echo "<script>alert('Error issuing book'); window.location.href='dashboard.php';</script>";
        }
    }
    
    function bookRequestApprove($userid, $bookid, $username, $usertype, $bookname, $issuedays) {
        $sql = "INSERT INTO requestbook (userid, bookid, username, usertype, bookname, issuedays) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$userid, $bookid, $username, $usertype, $bookname, $issuedays]);
    }
    function getIssuedBookReport() {
        $sql = "SELECT * FROM issuebook ORDER BY id DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    function getStudentReport() {
        $q = "SELECT id, name, email, type FROM userdata WHERE type='Student'";
        $this->stmt = $this->connection->prepare($q);
        $this->stmt->execute();
        return $this->stmt;
    }
    function getBookReport() {
        $sql = "SELECT * FROM book ORDER BY id DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    
    
    
    
}
}
?>
