<?php

include '../config/config.php';
require '../css/style.css';

session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {

    header("Location: /index.php");

}

// check if rank is superadministrator or admin if not redirect to dashboard.php
if ($_SESSION['rank'] == 'Superadministrator' || $_SESSION['rank'] == 'Administrator') {

} else {
    header("Refresh:3; url='../dashboard.php'");

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the data from the form
    $id = $_GET['id'];
    $username = $_POST['username'];
    $rank = $_POST['rank'];

    // update the data in the database
    $sql = "UPDATE cp_user SET username = '$username', rank = '$rank' WHERE id = $id";
    $result = $db->query($sql);


    header("Refresh:0; url=adminlist.php");

}
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <script src="https://use.fontawesome.com/3903c9d7fd.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Edit User</title>
</head>
<body>



<ul class="menu">
    <li class="menu_list">
        <span class="front fas fa fa-times"></span>
        <a href="adminlist.php" class="side">Back</a>
    </li>
</ul>

<?php
// get the id from the url
$id = $_GET['id'];

// get the data from the database and store it in a variable called $result
$sql = "SELECT * FROM cp_user WHERE id = $id";
$sth = $db->query($sql);

// loop through the data and display it on the page
while ($row = $sth->fetch()) {
    echo '<body><form class="pass" action="edit.php?id=' . $id . '" method="post">';
    echo ' <div class="main"> <p class="sign" align="center">Admin Login</p><div class="pass">';
    echo '<div class="un">';
    echo '<label for="username">Username</label>';
    echo '<input type="text" id="username" name="username" class="form-control" value="' . $row['username'] . '">';
    echo '</div>';
    echo '<div class="pass">';
    echo '<label for="rank">Rank</label>';
    echo '<input type="text" id="rank" name="rank" class="form-control" value="' . $row['rank'] . '">';
    echo '</div>';
    echo '<input class="submit" type="submit" value="Update" class="btn btn-info">';
    echo '</form> </div> </body>';
}
?>


