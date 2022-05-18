<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "sistem_alumni");

// cek cookie
if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // ambil alunim berdasarkan id
    $result = mysqli_query($conn, "SELECT alunim FROM alu WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie alunim
    if($key === hash('sha256', $row['alunim'])) {
        $_SESSION["alulogin"] = true;
    }
}

if(isset($_SESSION["alulogin"])) {
    header("Location: index.php");
}

// cek apa tombol submit sudah ditekan atau belum
if(isset($_POST["alulogin"])) {
    $alunim = $_POST["alunim"];
    $alupassword = $_POST["alupassword"];

    // cek alunim apa ada di databse
    $result = mysqli_query($conn, "SELECT * FROM alu WHERE alunim = '$alunim'");    

    // cek apa alunim ada
    if(mysqli_num_rows($result) === 1) {

        // check password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($alupassword, $row["alupassword"])) {
            // set session
            $_SESSION["alulogin"] = true;
            foreach($result as $assa) {
                $_SESSION["alunim"] = $assa['alunim'];
            }

            // remember me
            if (isset($_POST["remember"])) {
                // buat cookie
                
                setcookie("id", $row['id'], time() + 60);
                // mengacak alunim menggunakan hash
                // algoritma + string
                setcookie("key", hash('sha256', $row['alunim']), time() + 60);
            }
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alulogin</title>
</head>
<body>
    <h1><a href=regristasi.php style="text-decoration: none">Regristasi</a></h1>
    <h1>alulogin</h1>
    <?php if(isset($error)) : ?>
        <p>alunim or Paswot salah</p>
    <?php endif; ?>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="alunim">alunim:</label></td>
                <td><input type="text" name="alunim"></td>
            </tr>
            <tr>
                <td><label for="password">password:</label></td>
                <td><input type="password" name="password"></td>
            </tr>
                <td><label for="remember">remember:</label></td>
                <td><input type="checkbox" name="remember"></td>
        </table>
        <button type="submit" name="alulogin">alulogin</button>
    </form>
</body>
</html>