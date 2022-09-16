<?php
include '../config/config.php';
include '../css/style.css';

session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {

    header ("Location: /index.php");

}

// check if rank is superadministrator or admin if not redirect to dashboard.php
if ($_SESSION['rank'] == 'Superadministrator' || $_SESSION['rank'] == 'Administrator') {
    echo '<div class="pass">You are logged in as ' . $_SESSION['username'] . '</div>';
} else {
    header("Refresh:3; url='../dashboard.php'");
    echo '<div class="btn-danger">You do not have permission to view this page</div>';
}
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <script src="https://use.fontawesome.com/3903c9d7fd.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>
<body>


<ul class="menu">
    <li class="menu_list">
        <span class="front fa fa fa-user-plus"></span>
        <a href="newadmin.php" class="side">New Staff</a>
    </li>
    <li class="menu_list">
        <span class="front fa fa-users"></span>
        <a href="adminlist.php" class="side">Stafflist</a>
    </li>
    <li class="menu_list">
        <span class="front fas fa-briefcase"></span>
        <a href="#" class="side">projects</a>
    </li>
    <li class="menu_list">
        <span class="front fas fa fa-times"></span>
        <a href="../dashboard.php" class="side">Back</a>
    </li>
</ul>
