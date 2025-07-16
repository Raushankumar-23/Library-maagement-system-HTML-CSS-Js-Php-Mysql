<?php
session_start();
if (!isset($_SESSION['adminid'])) {
    header("Location: admin_login.php?msg=Please+login+first");
    exit();
}

include("data_class.php");
$obj = new data();
$obj->setconnection();

// Fetch all book requests
$stmt = $obj->getconnection()->prepare("SELECT * FROM requestbook");
$stmt->execute();
$requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Approve Book Requests</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>📥 Book Request Approvals</h2>
    <?php if (count($requests) > 0): ?>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Book Name</th>
                <th>User Type</th>
                <th>Issue Days</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($requests as $req): ?>
            <tr>
                <td><?= $req['userid'] ?></td>
                <td><?= $req['username'] ?></td>
                <td><?= $req['bookname'] ?></td>
                <td><?= $req['usertype'] ?></td>
                <td><?= $req['issuedays'] ?></td>
                <td>
                    <form method="POST" action="approve_action.php" style="display:inline;">
                        <input type="hidden" name="userid" value="<?= $req['userid'] ?>">
                        <input type="hidden" name="username" value="<?= $req['username'] ?>">
                        <input type="hidden" name="bookname" value="<?= $req['bookname'] ?>">
                        <input type="hidden" name="usertype" value="<?= $req['usertype'] ?>">
                        <input type="hidden" name="issuedays" value="<?= $req['issuedays'] ?>">
                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No pending book requests.</p>
    <?php endif; ?>
</div>
</body>
</html>
