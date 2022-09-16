<?php
include 'config/config.php';
include 'css/style.css';

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
    <title>Dashboard</title>
    <div class="dashboardwelcome">
        <h2>Dashboard</h2>
        <br>
    </div>
    <div class="dashboardwelcomeuser">
        <p style="text-align: center"> Welcome back<br><br> <?php echo $_SESSION['username']; ?> <br><br> Current Rank is <?php echo $_SESSION['rank'];?></p>
    </div>
</head>
<body>
<ul class="menu">
    <li class="menu_list">
        <span class="front fa fa-user-circle"></span>
        <a href="#" class="side">Player</a>
    </li>
    <li class="menu_list">
        <span class="front fa fa-users"></span>
        <a href="admin/admin.php" class="side">Staff</a>

    </li>
    <li class="menu_list">
        <span class="front fas fa-briefcase"></span>
        <a href="#" class="side">projects</a>
    </li>
    <li class="menu_list">
        <span class="front fas fa fa-times"></span>
        <a href="logout.php" class="side">Logout</a>
    </li>
    <?php if ($_SESSION['rank'] == 'Superadministrator' || $_SESSION['rank'] == 'Administrator') {
    echo '<li class="menu_list">
        <span class="front fa fa-file-archive-o"></span>
        <a href="admin/log.php" class="side">Logfiles</a>
</ul>';
    }
    $query = $db->prepare("SELECT * FROM user");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $count = $query->rowCount();
    echo '<div class="dashboardwelcome">There are currently ' . $count . ' active Players in the database</div>';
?>


</body>


</html>
</div>