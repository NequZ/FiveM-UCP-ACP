<?php

include 'config/config.php';
require 'css/style.css';

session_start();


$ticket_id = $_GET['id'];

// Table with content of the ticket
$sql = "SELECT * FROM cp_ticket WHERE id = $ticket_id";
$result = $db->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
// get collumn open from table cp_ticket
$open = $row['open'];
if ($open == 1) {
    $open = "Closed";
} else {
    $open = "Open";
}



if (isset($_POST['comment'])) {
    $comment = $_POST['comment'];
    $sql = "INSERT INTO cp_ticket_comments (ticket_id, message, creator, created) VALUES ('$ticket_id', '$comment', 'User', NOW())";
    $db->exec($sql);
    header("Location: currentticket.php?id=$ticket_id");
}



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
    <meta charset="UTF-8">
    <script src="https://use.fontawesome.com/3903c9d7fd.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    <title>Edit Ticket</title>
</head>

<div class="content view">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Ticket #<?php echo $ticket_id; ?></h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $row['username']; ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="profile_details">
                            <div class="col-sm-12">
                                <h4 class="brief"><i>Created: <?php echo $row['date']; ?></i></h4>
                                <div class="left col-xs-7">
                                    <h2><?php echo $row['subject']; ?></h2>
                                    <p><strong>Ticketmessage: </strong> <br><br><?php echo $row['message']; ?> </p>
                                    <ul class="list-unstyled">
                                        <br><br><br>
                                        <li><i class="fa fa-building"></i> Status: <?php echo $open; ?></li>
                                    </ul>


                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
            <?php
            $sql = "SELECT * FROM cp_ticket_comments WHERE ticket_id = $ticket_id";
            $result = $db->query($sql);
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $comment_message = $row['message'];
                $comment_date = $row['created'];
                $comment_username = $row['creator'];
                echo "
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        
                    <div class='panel-body'>
                        <div class='row'>
                            <div class='col-md-12 col-sm-12 col-xs-12'>
                                <div class='profile_details'>
                                        <div class='col-sm-12'>
                                             <p><strong>Comment: </strong> <br><br>$comment_message </p>
                                            <div class='left col-xs-7'>
                                                <ul class='list-unstyled'>
                                                    <br><br><br>
                                                    <li><i class='fa fa-pencil-square'></i> Comment postet: $comment_date</li>
                                                    <li><i class='fa fa-address-book'></i> From: $comment_username</li>
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

        <form method="post">
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
            </div>
            <button type="comment" class="btn btn-lg btn-info btn-block">Comment</button>

</div>

