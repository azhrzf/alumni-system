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