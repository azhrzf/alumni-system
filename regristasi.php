<?php 

session_start();

require 'functions.php';

// jika ditekan jalankan regristasi
if (isset($_POST["register"])) {
    
    if (regristasi($_POST) > 0) {
        echo "<script>alert('berhasil blog')</script>";
    }

    else {
        echo mysqli_error($conn);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regristasi</title>
</head>
<body>
    <h1><a href=login.php style="text-decoration: none">Login</a></h1>
    <form action="" method="post" autocomplete="off">
    <table>
        <tr>
            <td><label for="username">username</label></td>
            <td>: <input type="text" name="username" id="username" required></td>
        </tr>
        <tr>
            <td><label for="password">password</label></td>
            <td>: <input type="password" name="password" id="password" required></td>
        </tr>
        <tr>
            <td><label for="konpassword">konfirmasi password</label></td>
            <td>: <input type="password" name="konpassword" id="konpassword" required></td>
        </tr>
    </table>
    <button type="submit" name="register">regristasi</button>
    </form>
</body>
</html>