<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "sistem_alumni");

    if(isset($_SESSION["login"])) {
        echo "<h3>Selamat kamu adalah admin</h3>";
        echo "<h3><a href=gantipass.php>Ganti Password</a></h3>";
        exit;
    }
?> 

<?php
    $alunim = $_SESSION["alunim"];  
    $alumni = mysqli_query($conn, "SELECT * FROM alumni WHERE nim = $alunim");
    if($alumni == false) {
        echo "<script>alert('Daftarkan data terlebih dahulu')</script>";
        echo "<script>window.location.href = 'tambah.php'</script>";
    }
    foreach($alumni as $tabel) {
        $nim = $tabel['nim'];
        $nama = $tabel['nama'];
        $prodi = $tabel['prodi'];
        $thlulus = $tabel['thlulus'];
    }
?>

<?php if(isset($_SESSION["alulogin"])) : ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User</title>
</head>
<body>
<h1>Profil Alumni</h1>
    <table>
        <tr>
            <td><label for="nim">NIM</label></td>
            <td><input type="text" name="nim" id="nim" value="<?= $nim; ?>" size="40" disabled required></td>
        </tr>
        <tr>
            <td><label for="nama">Nama</label></td>
            <td><input type="text" name="nama" id="nama" value="<?= $nama; ?>" size="40" disabled required></td>
        </tr>
        <tr>
            <td><label for="prodi">Program Studi</label></td>
            <td><input type="text" name="prodi" id="prodi" value="<?= $prodi; ?>" size="40" disabled required></td>
        </tr>
        <tr>
            <td><label for="thlulus">Tahun Lulus</label></td>
            <td><input type="text" name="thlulus" id="thlulus" value="<?= $thlulus; ?>" size="40" disabled required></td>
        </tr>
    </table>        
    <h3><a href="ganti.php?nim=<?= $alunim; ?>">Ubah Data</a></h3>
    <h3><a href=gantipass.php>Ganti Password</a></h3>
    <h3><a href=index.php>Halaman utama</a></h3>
</body>
</html>

<?php endif; ?>