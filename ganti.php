<?php
    session_start();

    require "functions.php";

    if(!isset($_SESSION["login"]) && !isset($_SESSION["alulogin"])) {
        header("Location: index.php");
        exit;
    }

    if(isset($_SESSION["alulogin"])) {
        header("Location: index.php");

        exit;
    }

    $id = $_GET['id'];
    $alumni = query("SELECT * FROM alumni WHERE id = $id");
    foreach($alumni as $tabel) {
        $nim = $tabel['nim'];
        $nama = $tabel['nama'];
        $prodi = $tabel['prodi'];
        $thlulus = $tabel['thlulus'];
    }

    if(isset($_POST["ubah"])) {

        // check apakah data berhasil ditambahkan atau tidak
        if(ubah($_POST) > 0 ) {
            echo "<script>alert('Selamat data berhasil diperbarui')</script>";
            echo "<script>window.location.href = 'index.php'</script>";
        }
        else if ($tabel) {
            echo "<script>alert('Selamat data berhasil diperbarui')</script>";
            echo "<script>window.location.href = 'index.php'</script>";
        }
        else {
            echo "<script>alert('Data gagal diperbarui, cek inputan kembali')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer</title>
</head>
<body>
    <h1>Perbarui Data</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="nim" value="<?= $nim ?>">
        <table>
            <tr>
                <td><label for="shownim">NIM</label></td>
                <td><input type="text" name="shownim" id="shownim" value="<?= $nim; ?>" disabled required></td>
            </tr>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" name="nama" id="nama" value="<?= $nama; ?>" required></td>
            </tr>
            <tr>
                <td><label for="prodi">Program Studi</label></td>
                <td><input type="text" name="prodi" id="prodi" value="<?= $prodi; ?>" required></td>
            </tr>
            <tr>
                <td><label for="thlulus">Tahun Lulus</label></td>
                <td><input type="text" name="thlulus" id="thlulus" value="<?= $thlulus; ?>" required></td>
            </tr>
        </table>        
        <button type="submit" name="ubah">Submit</button>
    </form>
    <h3><a href="hapus.php?nim=<?= $tabel['nim']; ?>" onclick="return confirm('Konfirmasi hapus')">Hapus</a></h3>
    <h3><a href=index.php>Halaman utama</a></h3>
</body>
</html>