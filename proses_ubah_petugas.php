<?php 
    $id_petugas = $_POST['id_petugas']; 
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    include "koneksi.php";
    $update = mysqli_query($koneksi, "UPDATE petugas SET nama_petugas = '{$nama_petugas}',
                                                         username = '{$username}',
                                                         password = '".md5($password)."', 
                                                         level = '{$level}'
                                      WHERE id_petugas = '{$id_petugas}'");
    if ($update) {
        echo "<script>alert('Sukses edit profil');location.href='profil_petugas.php';</script>";
    } else {
        echo "<script>alert('Gagal edit profil');location.href='ubah_petugas.php?id_petugas=".$id_petugas."';</script>";
    }
?>