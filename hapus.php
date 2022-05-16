<?php

session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

    require("functions.php");
    $id = $_GET['id'];
    $delete = "DELETE FROM alumni WHERE id=$id";

    $hps = hapus($delete);

    if($hps > 0 ) {
        echo "<script>
            alert('data berhasil dihapys');
            document.location.href = 'index.php';
        </script>";
    }

    else {
        echo "<script>
        alert('data gagal dihapus');
        document.location.href = 'index.php';
    </script>";
    }   
?>