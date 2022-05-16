<?php
    // menghubungkan ke function
    require "functions.php";
    $alumni = query("SELECT * FROM alumni");
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
                    <td><a href="#">Ubah</a> | <a href="#">Hapus</a></td>
                </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>