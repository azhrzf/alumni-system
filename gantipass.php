<?php

    require "functions.php";

    if (!isset($_SESSION["login"]) && !isset($_SESSION["alulogin"])) {
        header("Location: index.php");
        exit;
    }
    $usernameAdmin = $_SESSION["username"];
    $nimAlumni = $_SESSION["alunim"];
    $admin = query("SELECT username FROM user WHERE username = '$usernameAdmin'");
    $alumni = query("SELECT alunim FROM alu WHERE alunim = '$nimAlumni'");

    if (isset($_SESSION["login"])) {
        foreach ($admin as $table) {
            $user = $table["username"];
        }
    }
    elseif (isset($_SESSION["alulogin"])) {
        foreach ($lumni as $table) {
            $user = $table["alunim"];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><label for="remember">Password Baru</label></td>
                <td><input type="checkbox" name="remember"></td>
            </tr>
        </table>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>