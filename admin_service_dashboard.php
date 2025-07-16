<?php
session_start();
$adminid= $_SESSION["adminid"];
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GCE Gaya Library Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<style>
.logo-img {
  width: 80px;
    height: auto;
    margin-right: 15px;

}
.page-title {
    font-size: 54px;
    font-weight: bold;
    color:rgb(11, 94, 177);
}

    .innerdiv{
       text-align: center;
        margin: 100px;
        
    }
    .leftinnerdiv{
        float: left;
        width: 25%;

    }
    .rightinnerdiv{
        float: right;
        width: 75%;
        background-color:rgb(161, 226, 152);
    }
    .greenbtn{
        background-color: rgb(16, 170 ,16);
        color: white;
        width: 95%;
        height: 40px;
        margin-top: 8px;
    }
    .header-logo {
    display: flex;
    align-items: center;
    padding: 15px;
    background-color: #ffffff;
    border-bottom: 2px solid #ccc;
}
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #e6f0ff; /* 🔷 Light blue background for the entire page */
}


/* 🔍 Only affects logo inside .header-logo */
.header-logo img {
    margin-right: 20px;  /* Adds space between logo and heading text */
}

</style>
<body>
<!-- Logo and Heading -->
<div class="header-logo">
    <img src="gcelogo.png" alt="GCE Gaya Logo" class="logo-img">
    <div class="page-title">GCE Gaya Library Management System 📚</div>
</div>


    <div class="innerdiv">
    <div class="leftinnerdiv">
    <button class="greenbtn">Admin</button>
    <button class="greenbtn" onclick="openpart('addbook')"> ADD BOOK</button>
            <button class="greenbtn" onclick="openpart('bookreport')"> BOOK REPORT</button>
            <button class="greenbtn" onclick="openpart('bookrequestapprove')">BOOK REQUESTS APPROVE</button>
            <button class="greenbtn" onclick="openpart('addperson')"> ADD PERSON</button>
            <button class="greenbtn" onclick="openpart('studentrecord')"> STUDENT REPORT</button>
            <button class="greenbtn" onclick="openpart('addissue')"> ISSUE BOOK</button>
            <button class="greenbtn" onclick="openpart('issuebookreport')"> ISSUEBOOKREPORT</button>
            <a href="index.php"><button class="greenbtn">LOGOUT</button></a>

</div>
<!-- Inside .rightinnerdiv -->
<div class="rightinnerdiv">
<div id="addperson" class="innerright portion" style="display: none;">
    <button class="greenbtn">ADD PERSON</button>
    <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data"><br><br>
        <label>Name</label><input type="text" name="name" required><br><br>
        <label>Email</label><input type="email" name="email" required><br><br>
        <label>Password:</label><input type="password" name="password" required><br><br>
        <label for="type">Choose type:</label>
        <select name="type">
            <option value="Student">Student</option>
            <option value="teacher">Teacher</option>
        </select><br><br>
        <input type="reset" value="RESET"><input type="submit" value="SUBMIT"> <br><br>
    </form>
</div>
</div>
 
<!-- add book portion -->
<div class="rightinnerdiv">
  <div class="rightinnerdiv">
    <div id="addbook" class="innerright portion" style="<?php if (!empty($_REQUEST['view'])) { echo 'display:none;'; } ?>">
      <button class="greenbtn">ADD NEW BOOK</button>

      <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">
        
        <label>Branch:</label>
        <input type="radio" name="branch" value="CSE" id="cse"> CSE
        <input type="radio" name="branch" value="EEE" id="eee"> EEE
        <input type="radio" name="branch" value="CE" id="ce"> CE
        <input type="radio" name="branch" value="ME" id="me"> ME
        <br><br>

        <label>Book Name:</label>
        <input type="text" name="bookname" required><br>

        <label>Book Details:</label>
        <input type="text" name="bookdetails" required><br>

        <label>Author:</label>
        <input type="text" name="bookauthor" required><br>

        <label>Publication:</label>
        <input type="text" name="bookpub" required><br>

        <label>Quantity:</label>
        <input type="number" name="bookquantity" required><br>

        <label>Price:</label>
        <input type="number" name="bookprice" required><br>

        <label>Book Photo:</label>
        <input type="file" name="bookphoto"><br><br>

        <input type="reset" value="RESET">
        <input type="submit" value="SUBMIT"><br><br>

      </form>
    </div>
  </div>
</div>
<!--iussue book portion -->
<div class="rightinnerdiv">
  <div id="addissue" class="innerright portion" style="display: none;">
    <form action="addissueserver_page.php" method="post">
        <button class="greenbtn">Issue Book</button>
        <label for="issuetype">Issue Type:</label>
      <select name="issuetype" required>
        <option value="Student">Student</option>
        <option value="Teacher">Teacher</option>
      </select><br>
      <label>User ID:</label>
      <input type="text" name="userid" required><br>

      <label>Username:</label>
      <input type="text" name="username" required><br>

      <label>Issue Book:</label>
      <input type="text" name="issuebook" required><br>

      

      <label>Issue Days:</label>
      <input type="number" name="issuedays" required><br>

      <label>Issue Date:</label>
      <input type="date" name="issuedate" required><br>

      <label>Return Date:</label>
      <input type="date" name="returndate" required><br><br>

      <input type="reset" value="RESET">
      <input type="submit" value="SUBMIT"><br><br>
    </form>
  </div>
</div>
<!--request for book approval portion -->
<div class="rightinnerdiv">
  <div id="bookrequestapprove" class="innerright portion" style="display: none;">

    <!-- Section Heading -->
    <button class="greenbtn">BOOK REQUESTS APPROVE</button><br><br>

    <!-- Form Starts -->
    <form action="bookrequestapprove_page.php" method="post">
    <label>User Type:</label>
    <select name="usertype" required>
        <option value="Student">Student</option>
        <option value="Teacher">Teacher</option>
        </select><br><br>
      <label>User ID:</label>
      <input type="text" name="userid" required><br><br>

      <label>Book ID:</label>
      <input type="text" name="bookid" required><br><br>

      <label>Username:</label>
      <input type="text" name="username" required><br><br>

      <label>Book Name:</label>
      <input type="text" name="bookname" required><br><br>

      <label>Issue Days:</label>
      <input type="number" name="issuedays" required><br><br>

      <input type="reset" value="RESET">
      <input type="submit" value="SUBMIT"><br><br>

    </form>
  </div>
</div>
<!-- ISSUE BOOK REPORT SECTION -->
<div class="rightinnerdiv">
  <div id="issuebookreport" class="innerright portion" style="display: none;">
    <button class="greenbtn">ISSUED BOOK REPORT</button><br><br>

    <?php
    include("data_class.php");

    $obj = new data();
    $obj->setconnection();
    $result = $obj->getIssuedBookReport();

    if ($result->rowCount() > 0) {
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead><tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Username</th>
                <th>Book</th>
                <th>User Type</th>
                <th>Issue Days</th>
                <th>Issue Date</th>
                <th>Return Date</th>
              </tr></thead><tbody>";
        foreach ($result->fetchAll() as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['userid']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['issuebook']}</td>
                    <td>{$row['issuetype']}</td>
                    <td>{$row['issuedays']}</td>
                    <td>{$row['issuedate']}</td>
                    <td>{$row['returndate']}</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No issued books found.";
    }
    ?>
  </div>
</div>




<script>
function openpart(sectionId) {
    // Hide all .portion sections
    const portions = document.getElementsByClassName('portion');
    for (let i = 0; i < portions.length; i++) {
        portions[i].style.display = "none";
    }

    // Show the selected portion
    document.getElementById(sectionId).style.display = "block";
}
</script>
<!-- STUDENT REPORT SECTION -->
<div class="rightinnerdiv">
  <div id="studentrecord" class="innerright portion" style="display: none;">
    <button class="greenbtn">STUDENT REPORT</button><br><br>

    <?php
    include("data_class.php");

    $obj = new data();
    $obj->setconnection();
    $result = $obj->getStudentReport(); // You'll define this in data_class.php

    if ($result->rowCount() > 0) {
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead><tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
              </tr></thead><tbody>";
        foreach ($result->fetchAll() as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['type']}</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No students found.";
    }
    ?>
  </div>
</div>
<!-- BOOK REPORT SECTION -->
<!-- BOOK REPORT SECTION -->
<div class="rightinnerdiv">
  <div id="bookreport" class="innerright portion" style="display: none;">
    <button class="greenbtn">BOOK REPORT</button><br><br>

    <?php
    include("data_class.php");

    $obj = new data();
    $obj->setconnection();
    $result = $obj->getBookReport();

    if ($result->rowCount() > 0) {
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead><tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Publication</th>
                <th>Branch</th>
                <th>Details</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Photo</th>
              </tr></thead><tbody>";

        foreach ($result->fetchAll() as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['bookname']}</td>
                    <td>{$row['bookauthor']}</td>
                    <td>{$row['bookpub']}</td>
                    <td>{$row['branch']}</td>
                    <td>{$row['bookdetails']}</td>
                    <td>{$row['bookprice']}</td>
                    <td>{$row['bookquantity']}</td>
                    <td><img src='uploads/{$row['bookpic']}' width='50' height='60'></td>
                  </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No books found.";
    }
    ?>
  </div>
</div>

</body>
</html>