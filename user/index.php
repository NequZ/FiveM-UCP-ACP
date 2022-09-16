<?php
include '../config/config.php';
include '../css/style.css';

session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {

    header ("Location: /index.php");

}

?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <script src="https://use.fontawesome.com/3903c9d7fd.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    <title>User Administration</title>
</head>
<body>

<ul class="menu">
    <li class="menu_list">
        <span class="front fas fa fa-times"></span>
        <a href="../dashboard.php" class="side">Back</a>
    </li>
    <br>
</ul>

<br>
<div class="table-responsive">
    <br>  <br>  <table class="pass">
        <thead>
        <tr>
            <th scope="col">Identifier</th>
            <th scope="col">Firstname</th>    <!-- you need to edit that values to your database -->
            <th scope="col">Lastname</th>     <!-- you need to edit that values to your database -->
            <th scope="col">Job</th>          <!-- you need to edit that values to your database -->
            <th scope="col">Whitelist</th>    <!-- you need to edit that values to your database -->
            <th scope="col">Ban</th>          <!-- you need to edit that values to your database -->
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM user";  // you need to edit that values to your database
        $result = $db->query($sql);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>'; echo '<tr>'; echo '<tr>';
            echo '<tr>';echo '<tr>';echo '<tr>';
            echo '<td>' . $row['identifier'] . '</td>'; // Thats for ESX, if you want to use QBCore you need to adjust it maybe.
            echo '<td>' . $row['firstname'] . '</td>';
            echo '<td>' . $row['lastname'] . '</td>';
            echo '<td>' . $row['job'] . '</td>';
            echo '<td>' . $row['whitelist'] . '</td>';
            echo '<td>' . $row['ban'] . '</td>';
            echo '<td><a href="edit.php?id=' . $row['identifier'] . '" class="btn btn-primary">Edit</a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>