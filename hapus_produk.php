<?php
    if ($_GET['id_produk']) {
        include "koneksi.php";

        $id_produk = $_GET['id_produk'];
        $folder = "gambar/";

        $sql = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
        $query = mysqli_query($koneksi, $sql);
        $produk = mysqli_fetch_array($query);
        $path = $folder.$produk["foto_produk"];
        
        if (file_exists($path)) {
            unlink($path);
        }

        $qry_hapus = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk = '$id_produk'");
        if ($qry_hapus) {
            echo "<script>alert('Berhasil menghapus produk');location.herf='data_produk.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus produk');location.href='data_produk.php';</script>";
            echo mysqli_error($koneksi);
        }
    } else {
        echo "id_produk tidak ada";
    }
?>