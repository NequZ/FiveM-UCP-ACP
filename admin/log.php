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

// if delete button is clicked then deelete the number of rows that are selected in the number of rows input box

if (isset($_POST['delete'])) {

    $number = $_POST['delete'];

    $sql = "DELETE FROM cp_logfiles ORDER BY id DESC LIMIT $number";

    $result = $db->query($sql);

    if ($result) {

        echo '<div class="btn-info">Deleted ' . $number . ' row/s</div>';

    } else {

        echo '<div class="btn-danger">Error deleting rows</div>';

    }

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
    <title>Logfiles</title>
</head>
<body>
<ul class="menu">
    <li class="menu_list">
        <span class="front fas fa fa-times"></span>
        <a href="../dashboard.php" class="side">Back</a>
    </li>
    <br>
</ul>
<div class="container">
    <div class="pass">
        <div class="col-12">
            <h1>Logfiles</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="pass">
                <thead>
                <tr>
                    <th>Log ID</th>
                    <th>Username</th>
                    <th>Date</th>
                    <th>Rank</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM cp_logfiles";
                $sth = $db->query($sql);
                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>' . $row['rank'] . '</td>';
                    echo '<td>' . $row['action'] . '</td>';
                    echo '</tr>';

                }
                ?>

                </tbody>
            </table>

        </div>
        <div class="pass">
            <form action="log.php" method="post">
                <input type="number" id="number" class="us" name="delete" placeholder="Delete rows">
                <input type="submit" class="submit" name="submit" value="Delete">
            </form>

    </div>

    <script>
        var table = document.querySelector('pass');
        var tableHeight = table.offsetHeight;
        var tableWidth = table.offsetWidth;
        var tableScrollHeight = table.scrollHeight;
        var tableScrollWidth = table.scrollWidth;
        var tableScrollTop = table.scrollTop;
        var tableScrollLeft = table.scrollLeft;
        var tableScrollBottom = tableScrollHeight - tableHeight - tableScrollTop;
        var tableScrollRight = tableScrollWidth - tableWidth - tableScrollLeft;
        table.addEventListener('scroll', function () {
            tableScrollTop = table.scrollTop;
            tableScrollLeft = table.scrollLeft;
            tableScrollBottom = tableScrollHeight - tableHeight - tableScrollTop;
            tableScrollRight = tableScrollWidth - tableWidth - tableScrollLeft;
            if (tableScrollTop === 0) {
                console.log('top');
            }
            if (tableScrollLeft === 0) {
                console.log('left');
            }
            if (tableScrollBottom === 0) {
                console.log('bottom');
            }
            if (tableScrollRight === 0) {
                console.log('right');
            }
        });
    </script>




</body>