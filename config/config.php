<?php
$debug = false;
// Create connection
$db = new PDO('mysql:host=localhost;dbname=fivem', 'root', ''); // Main Database String


// Certein Options for the Admin Panel

$showplayers = false; // Show Players on Dashboard

// Departementfunction for the Ticketsystem
$sql = "SELECT * FROM cp_ticket";                   // Dont change this line until you know what you are doing
$result = $db->query($sql);                         // Dont change this line until you know what you are doing
$row = $result->fetch(PDO::FETCH_ASSOC);      // Dont change this line until you know what you are doing
$departement = $row['departement'];                 // Dont change this line until you know what you are doing


// Module Section
$logging = true;
$news = true;
$ticketsystem = true;