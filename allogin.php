<?php

session_start();

    if(isset($_SESSION["login"]) || isset($_SESSION["alulogin"])) {
        header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pilih login</h1>
    <h3><a href=login.php style="text-decoration: none">login Admin</a></h3>
    <h3><a href=alulogin.php style="text-decoration: none">login Alumni</a></h3>
    <br>
    <h1>Pilih Regristasi</h1>
    <h3><a href=allregristasi.php style="text-decoration: none">Regristasi Admin</a></h3>
</body>
</html>