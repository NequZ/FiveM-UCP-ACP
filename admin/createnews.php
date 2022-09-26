<?php

include '../config/config.php';
require '../css/style.css';

session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {

    header("Location: /index.php");

}

// check if rank is superadministrator or admin if not redirect to dashboard.php
if ($_SESSION['rank'] == 'Superadministrator' || $_SESSION['rank'] == 'Administrator') {    // you can change the Query here to your needs

} else {
    header("Refresh:1; url='news.php'");

}


// if create button is pressed update the database with the new data from the form content
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the data from the form
    $content = $_POST['content'];
    $author = $_SESSION['username'];
    $date = date("Y-m-d H:i:s");

    // update the data in the database
    $sql = "INSERT INTO cp_news (news, author, date) VALUES ('$content', '$author', '$date')";
    $result = $db->query($sql);

    header("Refresh:0; url=news.php");

    if ($logging == true ) {
        $username = $_SESSION['username'];
        $rank = $_SESSION['rank'];
        $action = "User ($username) created new News"; // Log will not contain News Content because the logs could get very big
        $date = date("Y-m-d H:i:s");
        $query = $db->prepare("INSERT INTO cp_logfiles (username, date, rank, action) VALUES (:username, :date, :rank, :action)");
        $query->bindParam(':username', $username);
        $query->bindParam(':date', $date);
        $query->bindParam(':rank', $rank);
        $query->bindParam(':action', $action);
        $query->execute();

    }
}


?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <script src="https://use.fontawesome.com/3903c9d7fd.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    <title>Create News</title>
</head>
<body>

<ul class="menu">
    <li class="menu_list">
        <span class="front fas fa fa-times"></span>
        <a href="news.php" class="side">Back</a>
    </li>
</ul>

<div class="pass">
    <form action="createnews.php" method="post">
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="8" cols="50"></textarea>
        </div>
        <button type="submit" class="create">Submit</button>
    </form>

</div>

