<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: login.php?msg=Please+login+first");
    exit();
}

include("data_class.php");

$obj = new data();
$obj->setconnection();
$userid = $_SESSION['userid'];
$studentName = $_SESSION['username'];
$studentEmail = $_SESSION['email'];
$userType = $_SESSION['usertype'];

// Fetch issued books for the logged-in student
$stmt = $obj->getconnection()->prepare("SELECT * FROM issuebook WHERE userid = ?");

$stmt->execute([$userid]);
$issuedBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard - GCE Library</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f3faff;
            font-family: Arial;
        }
        .dashboard {
            margin: 50px auto;
            max-width: 900px;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .student-info {
            background: #e0f7fa;
            padding: 20px;
            border-radius: 8px;
        }
        table {
            background: white;
        }
    </style>
</head>
<body>
<div class="dashboard">
    <div class="header">
        <h2>📚 Welcome, <?php echo $studentName; ?>!</h2>
        <p><a href="logout.php" class="btn btn-danger btn-sm">Logout</a></p>
    </div>

    <div class="student-info mb-4">
        <h5>Your Information:</h5>
        <p><strong>Name:</strong> <?php echo $studentName; ?></p>
        <p><strong>Email:</strong> <?php echo $studentEmail; ?></p>
        <p><strong>User Type:</strong> <?php echo $userType; ?></p>
    </div>

    <div class="issued-books">
        <h4>📘 Issued Books:</h4>
        <?php if (count($issuedBooks) > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Issued On</th>
                    <th>Return By</th>
                    <th>Days</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($issuedBooks as $book): ?>
                <tr>
                    <td><?php echo $book['issuebook']; ?></td>
                    <td><?php echo $book['issuedate']; ?></td>
                    <td><?php echo $book['returndate']; ?></td>
                    <td><?php echo $book['issuedays']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>No books issued yet.</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
