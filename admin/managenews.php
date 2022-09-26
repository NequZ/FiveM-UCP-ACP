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

if (isset($_POST['delete'])) {

    $id = $_POST['delete'];

    $sql = "DELETE FROM cp_news WHERE id = $id";

    $result = $db->query($sql);

    if ($result) {

        echo '<div class="btn-info">Deleted News</div>';

    } else {

        echo '<div class="btn-danger">Error deleting News</div>';

    }


    if ($logging == true ) {
        $username = $_SESSION['username'];
        $rank = $_SESSION['rank'];
        $action = "User ($username) deleted the News with the Following ID ($id)"; // Log will not contain News Content because the logs could get very big
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

<?php
$sql = "SELECT * FROM cp_news ORDER BY id DESC";
$result = $db->query($sql);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
echo '<br> <br>';
echo '<div class="j">';
    echo '<h2>Author: ' . $row['author'] . '</h2>';
    echo '<p>' . $row['news'] . '</p>';
    echo '<br>';
    echo '<p>From : ' . $row['date'] . '</p>';
    echo '<p>' . $row['id'] . '</p>';
    echo '<form method="post" action="managenews.php">';
    echo '<input type="hidden" name="delete" value="' . $row['id'] . '">';
    echo '<input type="submit" value="Delete" class="btn btn-lg btn-info btn-block">';
    echo '</form>';
    echo '</div>';
}
?>
