<?php

session_start();

require "functions.php";

if(isset($_SESSION["login"]) || !isset($_SESSION["login"]) && !isset($_SESSION["alulogin"])) {
    echo "<script>alert('Bukan hakmu')</script>";
    echo "<script>window.location.href = 'index.php'</script>";
    exit;
}

$alunim = $_SESSION["alunim"];  
$alumni = query("SELECT * FROM alumni WHERE nim = $alunim");
if($alumni == false) {
    echo "<script>alert('Daftarkan data terlebih dahulu')</script>";
    echo "<script>window.location.href = 'alutambah.php'</script>";
}

$alunim = $_SESSION["alunim"];
$alumni = query("SELECT * FROM alumni WHERE nim = $alunim");
foreach($alumni as $tabel) {
    $nim = $tabel['nim'];
    $nama = $tabel['nama'];
    $prodi = $tabel['prodi'];
    $thlulus = $tabel['thlulus'];
}

if(isset($_POST["ubah"])) {

    // check apakah data berhasil ditambahkan atau tidak

    if(ubah($_POST) > 0 ) {
        echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>";
    }

    else if ($tabel) {
        echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>";
    }

    else {
        echo "<script>
        alert('data gagal ditambahkan');
        document.location.href = 'index.php';
    </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>
<body>
    <h1>Ubah Data</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="nim" value="<?= $nim ?>">
        <table>
            <tr>
                <td><label for="nim">nim:</label></td>
                <td><input type="text" name="acakadut" id="nim" value="<?= $nim; ?>" min="11" max="11" disabled required></td>
            </tr>
            <tr>
                <td><label for="nama">nama:</label></td>
                <td><input type="text" name="nama" id="nama" value="<?= $nama; ?>" required></td>
            </tr>
            <tr>
                <td><label for="prodi">prodi:</label></td>
                <td><input type="text" name="prodi" id="prodi" value="<?= $prodi; ?>" required></td>
            </tr>
            <tr>
                <td><label for="thlulus">thlulus:</label></td>
                <td><input type="text" name="thlulus" id="thlulus" value="<?= $thlulus; ?>" required></td>
            </tr>
            <tr>
                <a href="hapus.php?nim=<?= $tabel['nim']; ?>" onclick="return confirm('Yakin')">Hapus</a>
            </tr>
        </table>        
        <button type="submit" name="ubah">submit</button>
    </form>
    <h3><a href=index.php style="text-decoration: none">Halaman utama</a></h3>
</body>
</html>