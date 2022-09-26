<?php

include '../config/config.php';
require '../css/style.css';

session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {

    header("Location: /index.php");

}

$id = $_GET['id'];
$sql = "SELECT * FROM cp_ticket WHERE id = $id";
$result = $db->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
echo "<h2>Ticket #" . $row['id'] . "</h2>";

?>
<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Edit Ticket</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ticket Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <table class="table table-filter">
                                <tbody>
                                    <tr data-status="pagado">
                                        <td>
                                            <div class="media">
                                                <a href="#" class="pull-left">
                                                    <img src="https://bootdey.com/img/Content/user_1.jpg" class="media-photo">
                                                </a>
                                                <div class="media-body">
                                                    <span class="media-meta pull-right">Ticket ID: <?php echo $row['id']; ?></span>
                                                    <h4 class="title">
                                                        Subject: <?php echo $row['subject']; ?>
                                                        <br>
                                                    </h4>
                                                    <p class="summary"><?php echo $row['message']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ticket Comments</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <table class="table table-filter">
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM cp_ticket_comments WHERE ticket_id = $id";
                                    $result = $db->query($sql);
                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr data-status='pagado'>";
                                        echo "<td>";
                                        echo "<div class='media'>";
                                        echo "<a href='#' class='pull-left'>";
                                        echo "<img src='https://bootdey.com/img/Content/user_1.jpg' class='media-photo'>";
                                        echo "</a>";
                                        echo "<div class='media-body'>";
                                        echo "<span class='media-meta pull-right'>Comment ID: " . $row['id'] . "</span>";
                                        echo "<h4 class='title'>";
                                        echo $row['message'];
                                        echo "<br>";
                                        echo "<span class='pull-right pagado'>" . $row['created'] . "</span>";
                                        echo "</div>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

