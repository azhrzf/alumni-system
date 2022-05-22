<?php 
    session_start();

    require "functions.php";

    if(isset($_SESSION["alulogin"])) {
        header("Location: index.php");
        exit;
    }

    // jika ditekan jalankan regristasi
    if (isset($_POST["register"])) {
        if (isset($_POST["loginAdmin"])) {
            if (regristasi($_POST) > 0) {
                echo "<script>alert('Selamat data berhasil ditambahkan')</script>";
                echo "<script>window.location.href = 'login.php'</script>";
            }
            else {
                echo "<script>alert('Data gagal ditambahkan, cek inputan kembali')</script>";
            }
        }
        if (isset($_POST["loginAlumni"])) {
            if (aluregristasi($_POST) > 0) {
                echo "<script>alert('Selamat data berhasil ditambahkan')</script>";
                echo "<script>window.location.href = 'login.php'</script>";
            }
            else {
                echo "<script>alert('Data gagal ditambahkan, cek inputan kembali')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regristasi Admin</title>
</head>
<body>
    <h1>Regristasi Admin</h1>
    <form action="" method="post" autocomplete="off">
    <table>
        <tr>
            <td><label for="username">Username</label></td>
            <td><input type="text" name="username" id="username" required></td>
        </tr>
        <tr>
            <td><label for="password">Password</label></td>
            <td><input type="password" name="password" id="password" required></td>
        </tr>
        <tr>
            <td><label for="konpassword">Konfirmasi Password</label></td>
            <td><input type="password" name="konpassword" id="konpassword" required></td>
        </tr>
        <tr>
            <td><input type="radio" name="loginAlumni" value="loginAlumni">
            <label for="loginAlumni">Alumni</label></td>
            <td><input type="radio" name="loginAdmin" value="loginAdmin">
            <label for="loginAdmin">Admin</label></td>
        </tr>
    </table>
    <button type="submit" name="register">Regristasi</button>
    </form>
    <h3><a href=login.php>Login</a></h3>
</body>
</html>