<?php

include 'config/config.php';
require 'css/style.css';

session_start();



if (isset($_POST['submit'])) {
    $id = rand(100000, 999999);
    $username = $_POST['username'];
    $discordusername = $_POST['discordusername'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $query = $db->prepare("INSERT INTO cp_ticket (id, username, discordusername, message, subject) VALUES (:id, :username, :discordusername, :message, :subject)");
    $query->bindParam(':id', $id);
    $query->bindParam(':username', $username);
    $query->bindParam(':discordusername', $discordusername);
    $query->bindParam(':message', $message);
    $query->bindParam(':subject', $subject);
    $query->execute();
    echo '<div class="btn-info">Your Ticket ID is: ' . $id . '</div>';
    echo '<div class="btn-info">Please save this ID for further communication or if you want to open the Ticket. You can now close this Page</div>';

}

if (isset($_POST['openticket'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $sql = "SELECT * FROM cp_ticket WHERE id = $id AND username = '$username'";
    $result = $db->query($sql);
    if ($result->rowCount() > 0) {
        header("Location: currentticket.php?id=$id");
    } else {
        echo '<div class="btn-danger">Ticket ID does not exist / Username is not correct</div>';
    }

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
    <title>Ticket</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Ticket</h3>
          </div>
          <div class="panel-body">
            <form role="form" method="post" action="ticket.php">
              <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Discordname" name="discordusername" type="text" value="">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Message" name="message" type="text" value="">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Subject" name="subject" type="text" value="">
                </div>
              </fieldset>
                <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-success btn-block">
            </form>
              <br><br>
              <form action="ticket.php" method="post">
                <input type="text" class="form-control" name="id" placeholder="Ticket ID"><br>
                  <input type="text" class="form-control" name="username" placeholder="Username"><br>
                <input type="submit" name="openticket" value="Open Ticket" class="btn btn-lg btn-info btn-block">
              </form>
            </div>
            </div>
            </div>
            </div>
            </div>


