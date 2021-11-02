<?php
    $nama_petugas = $_POST["nama_petugas"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $level = $_POST["level"];

    include "koneksi.php";
    $query = "INSERT INTO petugas (nama_petugas, username, password, level)
             VALUES ('".$nama_petugas."', '".$username."', '".md5($password)."', '".$level."')";
    $tambah = mysqli_query($koneksi, $query);
    if ($tambah) {
        echo "<script>alert('Berhasil menambahkan petugas');location.href='index.php';</script>";
    }
    else {
        echo "<script>alert('Gagal menambahkan petugas');location.href='tambah_petugas.php';</script>";
    }
?>