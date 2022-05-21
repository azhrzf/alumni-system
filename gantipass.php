<?php
    session_start();
    require "functions.php";

    if (!isset($_SESSION["login"]) && !isset($_SESSION["alulogin"])) {
        header("Location: index.php");
        exit;
    }

    if (isset($_SESSION["login"])) {
        $user = $_SESSION["username"];
    }

    elseif (isset($_SESSION["alulogin"])) {
        $user = $_SESSION["alunim"];
    }

    if(isset($_POST["gantipass"])) {
        $userSet = $_POST["username"];
        $password = $_POST["password"];
        $passwordBaru = $_POST["passwordBaru"]; 
        $passwordBaru = password_hash($passwordBaru, PASSWORD_DEFAULT);

        if (isset($_SESSION["login"])) {
            $admin = mysqli_query($conn, "SELECT * FROM user WHERE username = '$userSet'");
            $fetch = mysqli_fetch_assoc($admin);
            $fetch = test_input($fetch["password"]);

            if (password_verify($password, $fetch)) {
                $setPassBaru = mysqli_query($conn, "UPDATE user SET password = '$passwordBaru' WHERE username = '$userSet'");
                echo "<script>alert('Password berhasil diubah')</script>";
            }
            else {
                $error = true;
            }
        }

        elseif (isset($_SESSION["alulogin"])) {
            $alumni = mysqli_query($conn, "SELECT * FROM alu WHERE alunim = '$userSet'");
            $fetch = mysqli_fetch_assoc($alumni);
            $fetch = test_input($fetch["alupassword"]);

            if (password_verify($password, $fetch)) {
                $setPassBaru = mysqli_query($conn, "UPDATE alu SET alupassword = '$passwordBaru' WHERE alunim = '$userSet'");
                echo "<script>alert('Password berhasil diubah')</script>";
            }
            else {
                $error = true;
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
    <title>Ubah Password</title>
</head>
<body>
    <?php if (isset($error)) {
        echo "<script>alert('Password salah')</script>";
        }
    ?>
    <form action="" method="post">
        <input type="hidden" name="username" value="<?= $user ?>">
        <table>
            <tr>
                <td><label for="showUsername">Username</label></td>
                <td><input type="text" name="showUsername" value="<?= $user ?>" disabled required></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><label for="passwordBaru">Password Baru</label></td>
                <td><input type="password" name="passwordBaru"></td>
            </tr>
        </table>
        <button type="submit" name="gantipass">Ganti Password</button>
    </form>
    <h3><a href=profil.php>Lihat Profil</a></h3>
</body>
</html>