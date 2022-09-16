<?php
include '../config/config.php';
include '../css/style.css';

session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {

    header ("Location: /index.php");

}

// check if rank is superadministrator or admin if not redirect to dashboard.php
if ($_SESSION['rank'] == 'Superadministrator' || $_SESSION['rank'] == 'Administrator') {
    echo '<div class="btn-info">You are logged in as ' . $_SESSION['username'] . '</div>';
} else {
    header("Refresh:3; url='../dashboard.php'");
    echo '<div class="btn-danger">You do not have permission to view this page</div>';
}
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <script src="https://use.fontawesome.com/3903c9d7fd.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">
    <title>Admin List</title>
</head>
<body>


<ul class="menu">
    <li class="menu_list">
        <span class="front fas fa fa-times"></span>
        <a href="admin.php" class="side">Back</a>
    </li>
</ul>

<br>
<div class="table-responsive">
    <br>  <br>  <table class="pass">
        <thead>
        <tr>
            <th scope="col">Username</th>
            <th scope="col">Rank</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM cp_user";
        $result = $db->query($sql);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>'; echo '<tr>'; echo '<tr>';
            echo '<tr>';echo '<tr>';echo '<tr>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['rank'] . '</td>';
            echo '<td><a href="edit.php?id=' . $row['id'] . '" class="btn btn-primary">Edit</a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<?php
if ($logging == true ) {
    $username = $_SESSION['username'];
    $rank = $_SESSION['rank'];
    $action = "User ($username) Viewed the Admin List";
    $date = date("Y-m-d H:i:s");
    $query = $db->prepare("INSERT INTO cp_logfiles (username, date, rank, action) VALUES (:username, :date, :rank, :action)");
    $query->bindParam(':username', $username);
    $query->bindParam(':date', $date);
    $query->bindParam(':rank', $rank);
    $query->bindParam(':action', $action);
    $query->execute();


}
?>