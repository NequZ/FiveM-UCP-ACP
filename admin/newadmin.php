<?php
include '../config/config.php';
include '../css/style.css';

session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {

    header ("Location: /index.php");

}

// check if rank is superadministrator or admin if not redirect to dashboard.php
if ($_SESSION['rank'] == 'Superadministrator' || $_SESSION['rank'] == 'Administrator') {
    echo '<div class="btn-info">You are logged in as ' . $_SESSION['username'] . '</div>';
} else {
    header("Refresh:3; url='../dashboard.php'");
    echo '<div class="btn-danger">You do not have permission to view this page</div>';
}


//  { // if the submit button is clicked create a new admin account and insert it into the database
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rank = $_POST['rank'];
    $sql = "INSERT INTO cp_user (username, password, rank) VALUES ('$username', '$password', '$rank')";
    $result = $db->query($sql);
    if ($result) {
        echo '<div class="btn-info">New Admin Created</div>';
    } else {
        echo '<div class="btn-danger">Error: ' . $sql . '<br>' . mysqli_error($db) . '</div>';
    }
}
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <script src="https://use.fontawesome.com/3903c9d7fd.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    <title>New Staff Member</title>
</head>
<body>


<ul class="menu">
    <li class="menu_list">
        <span class="front fas fa fa-times"></span>
        <a href="../dashboard.php" class="side">Back</a>
    </li>
</ul>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="pass">
                <div class="card-header">
                    <h3 class="card-title">New Staff Member</h3>
                </div>
                <div class="card-body">
                    <form action="newadmin.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="rank">Rank</label>
                            <select name="rank" class="form-control" id="rank">
                                <option value="Admin">Administrator</option>
                                <option value="Superadministrator">Superadministrator</option>
                                <option value="Supporter">Supporter</option>
                                <option value="Moderator">Moderator</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

