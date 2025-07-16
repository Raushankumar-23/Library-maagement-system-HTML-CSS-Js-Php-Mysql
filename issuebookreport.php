<?php
session_start();
if (!isset($_SESSION["adminid"])) {
    header("Location: login.php?msg=Please login first");
    exit();
}

// Include DB connection
include("db.php"); // or include("data_class.php");

$conn = new PDO("mysql:host=localhost;dbname=library", "root", "");

// Fetch issued books
$sql = "SELECT * FROM issuebooks";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issue Book Report</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Issued Book Report</h2>
    <table border="1">
        <tr>
            <th>Issue ID</th>
            <th>User ID</th>
            <th>Book ID</th>
            <th>Issue Date</th>
            <th>Return Date</th>
        </tr>
        <?php foreach ($results as $row): ?>
        <tr>
            <td><?= $row['issueid'] ?></td>
            <td><?= $row['userid'] ?></td>
            <td><?= $row['bookid'] ?></td>
            <td><?= $row['issuedate'] ?></td>
            <td><?= $row['returndate'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
