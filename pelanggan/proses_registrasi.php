<?php
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $telp = $_POST["telp"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    include "koneksi.php";
    $query = "INSERT INTO pelanggan (nama, alamat, telp, username, password)
             VALUES ('".$nama."', '".$alamat."', '".$telp."', '".$username."', '".md5($password)."')";
    $tambah = mysqli_query($koneksi, $query);
    if ($tambah) {
        echo "<script>alert('Registrasi berhasil');location.href='index.php';</script>";
    }
    else {
        echo "<script>alert('Registrasi gagal');location.href='registrasi.php';</script>";
    }
?>