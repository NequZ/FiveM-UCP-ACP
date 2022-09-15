<?php

include 'config/config.php';
include 'css/style.css';

session_start();
session_destroy();
header("Refresh:3; url='index.php'");
echo '<div class="btn-info">Logout Successful</div>';