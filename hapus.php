<?php
    session_start();

    require "functions.php";

    if(!isset($_SESSION["login"]) && !isset ($_SESSION["alulogin"])){
        header("Location: login.php");
        exit;
    }

    $nim = $_GET['nim'];
    $delete = "DELETE FROM alumni WHERE nim = $nim";
    $delete2 = "DELETE FROM alu WHERE alunim = $nim";

    $hps = hapus($delete);
    $hps2 = hapus($delete2);

    if($hps > 0 ) {
        echo "<script>alert('Data berhasil dihapus')</script>";
        echo "<script>document.location.href = 'allogin.php'</script>";
    }
    else {
        echo "<script>alert('Data gagal dihapus')</script>";
    }   
?>