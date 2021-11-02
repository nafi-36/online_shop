<?php
    include "koneksi.php";
    if (!isset($_GET['id_pelanggan'])) {
        header('location: index.php');
    }
    $id_pelanggan = $_GET['id_pelanggan'];
    
    $qry_hapus = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan = '".$id_pelanggan."'");
    if ($qry_hapus) {
        echo "<script>alert('Sukses hapus akun');location.herf='index.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus akun');location.href='profil_pelanggan.php';</script>";
    }
?> 