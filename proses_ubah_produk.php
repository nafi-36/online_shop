<?php
    include "koneksi.php";

    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    $temp = $_FILES['foto_produk']['tmp_name'];
    $name = $_FILES['foto_produk']['name'];
    $type = $_FILES['foto_produk']['type'];
    $size = $_FILES['foto_produk']['size'];
    $newname = rand(0,9999).'_'.$name;
    $folder = "gambar/";

    // mendapatkan data buku yang diubah
    $sql = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
    # eksekusi perintah SQL
    $query = mysqli_query($koneksi, $sql);
    # konversi ke array
    $produk = mysqli_fetch_array($query);
    
    # proses hapus file yang lama
    $path = $folder.$produk["foto_produk"];
    # cek eksistensi file yang akan dihapus 
    if (file_exists($path)) {
        # jika file yang lama ada, maka kita hapus
        unlink($path);
    }

    if ($size <= 2000000 and ($type == "image/jpg" or $type == "image/png" or $type == "image/jpeg")) {
        move_uploaded_file($temp, $folder.$newname);
        $sql = "UPDATE produk SET nama_produk = '".$nama_produk."', deskripsi = '".$deskripsi."',
               harga = '".$harga."', foto_produk = '".$newname."' WHERE id_produk = '$id_produk'";
        $result = mysqli_query($koneksi, $sql);
        if ($result) {
            echo "<script>alert('Berhasil mengubah produk');location.href='data_produk.php';</script>";
        } else {
            echo "<script>alert('Gagal mengubah produk');location.href='data_produk.php';</script>";
        }
    } else {
        echo "<script>alert('File tidak sesuai');location.href='data_produk.php';</script>";
    }
?>