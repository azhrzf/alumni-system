<?php
    session_start();

    require "functions.php";
    
    if(!isset($_SESSION["login"]) && !isset($_SESSION["alulogin"])) {
        header("Location: index.php");
        exit;
    }

    if (isset($_SESSION["alulogin"])) {
        $alunim = $_SESSION["alunim"];
        $result = mysqli_query($conn, "SELECT * FROM alumni WHERE nim = '$alunim'");

        foreach($result as $tabel) {
            if ($alunim == $tabel['nim']) {
                header("Location: ganti.php");
            }
        }   
    }

    if(isset($_POST["submit"])) {
        // check apakah data berhasil ditambahkan atau tidak
        if(tambah($_POST) > 0 ) {
            echo "<script>alert('Selamat data berhasil ditambahkan')</script>";
            echo "<script>window.location.href = 'index.php'</script>";
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
    <title>Menambah Data Alumni</title>
</head>
<body>
    <h1>Menambah Data Alumni</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <?php if (isset($_SESSION["alulogin"])) : ?>
        <input type="hidden" name="nim" value="<?= $_SESSION["alunim"] ?>">
        <?php endif ?>
        <table>
            <tr>
                <td><label for="nim">NIM</label></td>
                <?php if (isset($_SESSION["alulogin"])) : ?>
                    <td><input type="text" name="acakadut" id="nim" value=<?php echo $_SESSION["alunim"]; ?> disabled minlength="11" maxlenghth="11" required></td>
                <?php endif ?>
                <td><input type="text" name="nim" id="nim" minlength="11" maxlength="11" required></td>
            </tr>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <td><label for="prodi">Program Studi</label></td>
                <td><input type="text" name="prodi" id="prodi" required></td>
            </tr>
            <tr>
                <td><label for="thlulus">Tahun Lulus</label></td>
                <td><input type="text" name="thlulus" id="thlulus" required></td>
            </tr>
        </table>        
        <button type="submit" name="submit">Submit</button>
    </form>
    <h3><a href=index.php>Halaman Utama</a></h3>
</body>
</html>