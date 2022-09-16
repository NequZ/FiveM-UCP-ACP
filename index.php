<?php
include 'config/config.php';
include 'css/style.css';

session_start();


if ($debug == true) {
    try {

        $db = new PDO('mysql:host=localhost;dbname=fivem', 'root', '');
        echo '<div class="alert btn-info fade in">MySQL is connected
              <span class="glyphicon glyphicon-ok"></span></div>';
    } catch (PDOException $e) {
        echo '<div class="btn-danger">MySQL is not connected</div>';
    }
}  // isnt correct at the Moment. I will fix it later


// check if form is submitted and if username and password is set
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $db->prepare("SELECT * FROM cp_user WHERE username = :username AND password = :password");
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $rank = $result['rank'];
    if ($result) {
        header("Refresh:3; url='dashboard.php'");
        echo '<div class="alert alert-success">Login Successful</div>';
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['rank'] = $rank;
        $_SESSION['loggedin'] = true;
    }

    if ($logging == true ) {
        $action = "User ($username) logged in";
        $date = date("Y-m-d H:i:s");
        $query = $db->prepare("INSERT INTO cp_logfiles (username, date, rank, action) VALUES (:username, :date, :rank, :action)");
        $query->bindParam(':username', $username);
        $query->bindParam(':date', $date);
        $query->bindParam(':rank', $rank);
        $query->bindParam(':action', $action);
        $query->execute();


    }

    else {
        header("Refresh:3; url='index.php'");
        echo '<div class="btn-danger">Login Failed</div>';


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
    <title>Login Area</title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Admin Login</p>


        <form action="index.php" method="post">
            <input class="un" type="text" name="username" placeholder="Username">
            <input class="pass" type="password" name="password" placeholder="Password">
            <input class ="submit" type="submit" value="Login">

        </form>
      <br>
      <p align="center">  &copy; 2022 <a href="https://github.com/NequZ">NequZ</a> </p>
    </div>

</body>

<footer


</html>