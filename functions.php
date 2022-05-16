<?php

    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "sistem_alumni");

    // menerima query sql
    function query($query) {
        global $conn;
        // ambil data
        $result = mysqli_query($conn, $query);
        $rows = [];
        // masukkan ke array
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function tambah($data) {
        // ambil data dari tiap emenen dalam form
        global $conn;
        
        $nim = test_input($data["nim"]);
        $nama = test_input($data["nama"]);
        $prodi = test_input($data["prodi"]);
        $thlulus = test_input($data["thlulus"]);

        $query = "INSERT INTO alumni VALUES ('', '$nim', '$nama', '$prodi', '$thlulus')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function hapus($data) {
        global $conn;

        mysqli_query($conn, $data);

        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;

        $id = $data["id"];
        $nim = test_input($data["nim"]);
        $nama = test_input($data["nama"]);
        $prodi = test_input($data["prodi"]);
        $thlulus = test_input($data["thlulus"]);

        $ubah = "UPDATE alumni SET nama = '$nama', nim = '$nim', prodi = '$prodi', thlulus = '$thlulus' WHERE id = $id";

        mysqli_query($conn, $ubah);
        
        return mysqli_affected_rows($conn);
    }
