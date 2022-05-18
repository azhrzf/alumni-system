<?php
session_start();

require "functions.php";

if(!isset($_SESSION["login"]) && !isset($_SESSION["alulogin"])) {
    echo "<script>alert('ask admin or login admin')</script>";
    echo "<script>window.location.href = 'index.php'</script>";
    exit;
}

echo $alunim = $_SESSION["alunim"];

$result = mysqli_query($conn, "SELECT nim FROM alumni WHERE nim = '$alunim'");

foreach($result as $tabel) {
    if ($alunim == $tabel['nim']) {
        header("Location: aluganti.php");
    }
}       

if(isset($_POST["submit"])) {

    // check apakah data berhasil ditambahkan atau tidak
    if(tambah($_POST) > 0 ) {
        echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>";
    }

    else {
        echo "<script>
        alert('data gagal ditambahkan, cek apa nim benar apa belum');
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
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="nim" value="<?= $_SESSION["alunim"] ?>">
        <table>
            <tr>
                <td><label for="nim">nim:</label></td>
                <td><input type="text" name="acakadut" id="nim" value=<?php echo $_SESSION["alunim"]; ?> disabled required></td>
            </tr>
            <tr>
                <td><label for="nama">nama:</label></td>
                <td><input type="text" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <td><label for="prodi">prodi:</label></td>
                <td><input type="text" name="prodi" id="prodi" required></td>
            </tr>
            <tr>
                <td><label for="thlulus">thlulus:</label></td>
                <td><input type="text" name="thlulus" id="thlulus" required></td>
            </tr>
        </table>        
        <button type="submit" name="submit">submit</button>
    </form>
    <h3><a href=index.php style="text-decoration: none">Halaman utama</a></h3>
</body>
</html>