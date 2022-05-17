<?php
    session_start();

    if(!isset($_SESSION["login"]) && !isset($_SESSION["alulogin"])) {
        header("Location: login.php");
        exit;
    }

    // menghubungkan ke function
    require "functions.php";
    $alumni = query("SELECT * FROM alumni ORDER BY nim ASC");

    if(isset($_POST["cari"])) {
        $alumni = cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="local.php">Logout</a>
    <h3><a href=tambah.php style="text-decoration: none">Tambah Data</a></h3>
    <h3><a href=regristasi.php style="text-decoration: none">Daftar</a></h3>
    <h3><a href=profil.php style="text-decoration: none">Lihat Profil</a></h3>
    <form action="" method="post">
        <input type="text" name="keyword" placeholder="masukkan keyword" autofocus autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    
    <table border= "2px solid black" cellpadding="10">
        <tr>
           <th>NO</th>
           <th>NIM</th>
           <th>Nama</th>
           <th>Program Studi</th>
           <th>Tahun Lulus</th>
           <th>Tracer</th> 
        </tr>

        <?php $no = 1; ?>
            <?php foreach($alumni as $tabel) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $tabel["nim"]; ?></td>
                    <td><?php echo $tabel["nama"]; ?></td>
                    <td><?php echo $tabel["prodi"]; ?></td>
                    <td><?php echo $tabel["thlulus"]; ?></td>
                    <td><a href="ganti.php?id=<?= $tabel['id']; ?>">Tracer</a></td>
                </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>