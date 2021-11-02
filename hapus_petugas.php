<?php
    include "koneksi.php";
    if (!isset($_GET['id_petugas'])) {
        header('location: index.php');
    }
    $id_petugas = $_GET['id_petugas'];
    
    $qry_hapus = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas = '".$id_petugas."'");
    if ($qry_hapus) {
        echo "<script>alert('Sukses hapus akun admin');location.herf='index.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus akun admin');location.href='profil_petugas.php';</script>";
    }
?>