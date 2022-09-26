<?php
include '../config/config.php';
include '../css/style.css';

session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {

    header ("Location: index.php");

}
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <script src="https://use.fontawesome.com/3903c9d7fd.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    <title>Ticket Overview</title>
</head>
<body>


<ul class="menu">
    <li class="menu_list">
        <span class="front fas fa fa-times"></span>
        <a href="../dashboard.php" class="side">Back</a>
    </li>
    <li class="menu_list">
        <span class="front fas fa fa-eye"></span>
        <a href="closedtickets" class="side">Closed Tickets</a>
    </li>
    <br>
</ul>

<div class="container">
    <div class="pass">
        <div class="col-12">
            <h1>Ticket Overview</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="pass">
                <thead>
                <tr>
                    <th><b>Ticket ID</b></th>
                    <th>Username</th>
                    <th>Discord Name</th>
                    <th>Subject</th>
                    <th>Creation Date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM cp_ticket WHERE open = '0'";
                $sth = $db->query($sql);
                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['discordusername'] . '</td>';
                    echo '<td>' . $row['subject'] . '</td>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td><a href="editticket.php?id=' . $row['id'] . '" class="btn btn-primary">Open</a></td>';
                    echo '</tr>';

                }
                ?>

                </tbody>
            </table>

        </div>
