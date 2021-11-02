<?php 
    $id_pelanggan = $_POST['id_pelanggan']; 
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    include "koneksi.php";
    $update = mysqli_query($koneksi, "UPDATE pelanggan SET nama = '{$nama}',
                                                           alamat = '{$alamat}',
                                                           telp = '{$telp}',
                                                           username = '{$username}',
                                                           password = '".md5($password)."'
                                      WHERE id_pelanggan = '{$id_pelanggan}'");
    if ($update) {
        echo "<script>alert('Sukses edit profil');location.href='profil_pelanggan.php';</script>";
    } else {
        echo "<script>alert('Gagal edit profil');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
    }
?>