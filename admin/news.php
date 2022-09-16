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
    <title>News</title>
</head>
<body>

<ul class="menu">
    <li class="menu_list">
        <span class="front fas fa fa-times"></span>
        <a href="../dashboard.php" class="side">Back</a>
    </li>
    <?php if ($_SESSION['rank'] == 'Superadministrator' || $_SESSION['rank'] == 'Administrator') { // You can change the Permission for Creating new News here
    echo '<li class="menu_list">
        <span class="front fa fa-file-archive-o"></span>
        <a href="createnews.php" class="side">Create News</a>
</ul>'; }



// get data from cp_news table
$sql = "SELECT * FROM cp_news ORDER BY id DESC";
$result = $db->query($sql);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo '<br> <br>';
    echo '<div class="pass">';
    echo '<h2>Author: ' . $row['author'] . '</h2>';
    echo '<p>' . $row['news'] . '</p>';
    echo '<br>';
    echo '<p>From : ' . $row['date'] . '</p>';
    echo '</div>';
}
?>

