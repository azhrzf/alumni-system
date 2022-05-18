<?php

session_start();

require "functions.php";

$alunim = $_SESSION["alunim"];
$alumni = query("SELECT * FROM alumni WHERE nim = $alunim");
foreach($alumni as $tabel) {
    $nim = $tabel['nim'];
    $nama = $tabel['nama'];
    $prodi = $tabel['prodi'];
    $thlulus = $tabel['thlulus'];
}

if(isset($_SESSION["login"])) {
    echo "<h3>Selamat Kamu adalah admin</h3>";
}

?>  


<?php if(isset($_SESSION["alulogin"])) : ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Profil Alumni</h1>
        <table>
            <tr>
                <td><label for="nim">nim:</label></td>
                <td><input type="text" name="nim" id="nim" value="<?= $nim; ?>" disabled required></td>
            </tr>
            <tr>
                <td><label for="nama">nama:</label></td>
                <td><input type="text" name="nama" id="nama" value="<?= $nama; ?>" disabled required></td>
            </tr>
            <tr>
                <td><label for="prodi">prodi:</label></td>
                <td><input type="text" name="prodi" id="prodi" value="<?= $prodi; ?>" disabled required></td>
            </tr>
            <tr>
                <td><label for="thlulus">thlulus:</label></td>
                <td><input type="text" name="thlulus" id="thlulus" value="<?= $thlulus; ?>" disabled required></td>
            </tr>
        </table>        
    </form>
    <h3><a href=aluganti.php style="text-decoration: none">Ubah Data</a></h3>
    <h3><a href=index.php style="text-decoration: none">Halaman utama</a></h3>
</body>
</html>

<?php endif; ?>