<?php

include '../config/config.php';
require '../css/style.css';

session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {

    header("Location: /index.php");

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
        <a href="index.php" class="side">Back</a>
    </li>
</ul>

<?php

$id = $_GET['id'];
//echo $id; // Debug

$sql = "SELECT * FROM user WHERE identifier = '$id'";
$sth = $db->query($sql);

// display data in table


// loop through the data and display it on the page
while ($row = $sth->fetch()) {
    echo '<form action="edit.php" method="post">';
    echo '<table class="pass">';
    echo '<tr>';
    echo '<tr>';
    echo '<td>Firstname</td>';
    echo '<td><input type="text" name="firstname" value="' . $row['firstname'] . '"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Lastname</td>';
    echo '<td><input type="text" name="lastname" value="' . $row['lastname'] . '"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Job</td>';
    echo '<td><input type="text" name="job" value="' . $row['job'] . '"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Whitelist</td>';
    echo '<td><input type="text" name="whitelist" value="' . $row['whitelist'] . '"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>Ban</td>';
    echo '<td><input type="text" name="ban" value="' . $row['ban'] . '"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td><input type="hidden" name="id" value="' . $row['identifier'] . '"></td>';
    echo '<td><input type="submit" name="submit" value="Update"></td>';
    echo '</tr>';
    echo '</table>';
    echo '</form>';
}

// if the form is submitted, update the data in the database
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $job = $_POST['job'];
    $whitelist = $_POST['whitelist'];
    $ban = $_POST['ban'];

    // update the data in the database
    $sql = "UPDATE user SET firstname = '$firstname', lastname = '$lastname', job = '$job', whitelist = '$whitelist', ban = '$ban' WHERE identifier = '$id'";
    $sth = $db->query($sql);

}


// Code is quiet buggy but it works for now :D
