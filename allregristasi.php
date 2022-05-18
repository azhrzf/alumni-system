<?php

session_start();

if(isset($_SESSION["alulogin"])) {
    echo "<script>alert('logout kembali untuk melakukan regristasi')</script>";
    echo "<script>window.location.href = 'index.php'</script>";
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
    <h1>Pilih Regristasi</h1>
    <h3><a href=regristasi.php style="text-decoration: none">Regristasi Admin</a></h3>
    <h3><a href=aluregristasi.php style="text-decoration: none">Regristasi Alumni</a></h3>

    <h1>Pilih login</h1>
    <h3><a href=allogin.php style="text-decoration: none">All Login</a></h3>
</body>
</html>