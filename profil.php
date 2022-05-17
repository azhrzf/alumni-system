<?php

session_start();

if(isset($_SESSION["login"])) {
    echo "<h3>Selamat Kamu adalah admin</h3>";
}

require "functions.php";