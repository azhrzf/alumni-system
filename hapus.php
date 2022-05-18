<?php
    session_start();

    require "functions.php";

    if(!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    $id = $_GET['id'];
    $delete = "DELETE FROM alumni WHERE id=$id";

    $hps = hapus($delete);

    if($hps > 0 ) {
        echo "<script>alert('Data berhasil dihapus')</script>";
        echo "<script>document.location.href = 'index.php'</script>";
    }
    else {
        echo "<script>alert('Data gagal dihapus')</script>";
    }   
?>