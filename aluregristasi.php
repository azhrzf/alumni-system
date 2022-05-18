<?php 

    session_start();

    require 'functions.php';

    if(isset($_SESSION["alulogin"])) {
        header("Location: index.php");
    }

    // jika ditekan jalankan regristasi
    if (isset($_POST["register"])) {        
        if (aluregristasi($_POST) > 0) {
            echo "<script>alert('Selamat data berhasil ditambahkan')</script>";
            echo "<script>window.location.href = 'alulogin.php'</script>";
        }
        else {
            echo "<script>alert('Data gagal ditambahkan, cek inputan kembali')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regristasi Alumni</title>
</head>
<body>
    <h1>Regristasi Alumni</h1>
    <form action="" method="post" autocomplete="off">
    <table>
        <tr>
            <td><label for="alunim">NIM</label></td>
            <td><input type="text" name="alunim" id="alunim" minlength="11" maxlength="11" required></td>
        </tr>
        <tr>
            <td><label for="alupassword">Password</label></td>
            <td><input type="password" name="alupassword" id="alupassword" required></td>
        </tr>
        <tr>
            <td><label for="konalupassword">Konfirmasi Password</label></td>
            <td><input type="password" name="konalupassword" id="konalupassword" required></td>
        </tr>
    </table>
    <button type="submit" name="register">regristasi</button>
    </form>
    <h3><a href=login.php>Login</a></h3>
</body>
</html>