<?php
    session_start();

    require "functions.php";

    if(isset($_SESSION["login"]) && !isset($_SESSION["alulogin"]) || !isset($_SESSION["login"]) && isset($_SESSION["alulogin"])) {
        header("Location: index.php");
        exit;
    }

    // cek cookie
    if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
        $id = $_COOKIE["id"];
        $key = $_COOKIE["key"];

        // ambil username berdasarkan id
        $resultAdmin = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
        $resultAlumni = mysqli_query($conn, "SELECT alunim FROM alu WHERE id = $id");
        
        if (isset($resultAdmin)) {
            $row = mysqli_fetch_assoc($resultAdmin);
            // cek cookie username
            if($key === hash('sha256', $row['username'])) {
                $_SESSION["login"] = true;
            }
        }

        elseif (isset($resultAlumni)) {
            $row = mysqli_fetch_assoc($resultAlumni);
            // cek cookie alunim
            if($key === hash('sha256', $row['alunim'])) {
                $_SESSION["alulogin"] = true;
            }
        }
    }

    // cek apa tombol submit sudah ditekan atau belum
    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        if (isset($_POST["loginAdmin"])) {
            // cek username apa ada di databse
            $resultAdmin = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

            // cek apa username ada
            if(mysqli_num_rows($resultAdmin) === 1) {
                // check password
                $row = mysqli_fetch_assoc($resultAdmin);
                if (password_verify($password, $row["password"])) {
                    // set session
                    $_SESSION["login"] = true;
                    foreach($resultAdmin as $assa) {
                        $_SESSION["username"] = $assa['username'];
                    }
                    // remember me
                    if (isset($_POST["remember"])) {
                        // buat cookie
                        setcookie("id", $row['id'], time() + 60);
                        // mengacak username menggunakan hash
                        // algoritma + string
                        setcookie("key", hash('sha256', $row['username']), time() + 60);
                    }
                    header("Location: index.php");
                    exit;
                }
            }
            $error = true;
        }
        elseif (isset($_POST["loginAlumni"])) {
            // cek alunim apa ada di databse
            $resultAlumni = mysqli_query($conn, "SELECT * FROM alu WHERE alunim = '$username'");    

            // cek apa alunim ada
            if(mysqli_num_rows($resultAlumni) === 1) {
                // check password
                $row = mysqli_fetch_assoc($resultAlumni);
                if (password_verify($password, $row["alupassword"])) {
                    // set session
                    $_SESSION["alulogin"] = true;
                    foreach($resultAlumni as $assa) {
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
                    header("Location: aluganti.php");
                    exit;
                }
            }
            $error = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
</head>
<body>
    <?php if(isset($error)) {
            echo "<script>alert('Username atau password salah')</script>";
            echo "<script>window.location.href = 'local.php'</script>";
        exit;
        }
    ?>
    <h1>Login</h1>
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
                <td><label for="remember">Remember me</label></td>
                <td><input type="checkbox" name="remember"></td>
            </tr>
            <tr>
                <td><input type="radio" name="loginAlumni" value="loginAlumni">
                <label for="loginAlumni">Alumni</label></td>
                <td><input type="radio" name="loginAdmin" value="loginAdmin">
                <label for="loginAdmin">Admin</label></td>
            </tr>
        </table>
        <button type="submit" name="login">Login</button>
    </form>
    <h3><a href=regristasi.php>Regristasi</a></h3>
</body>
</html>