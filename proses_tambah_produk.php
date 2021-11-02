<?php
    include "koneksi.php";

    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    $temp = $_FILES['foto_produk']['tmp_name'];
    $name = $_FILES['foto_produk']['name'];
    $type = $_FILES['foto_produk']['type'];
    $size = $_FILES['foto_produk']['size'];
    $newname = rand(0,9999).'_'.$name;
    $folder = "gambar/";

    if ($size <= 2000000 and ($type == "image/jpg" or $type == "image/png" or $type == "image/jpeg")) {
        move_uploaded_file($temp, $folder.$newname);
        $input_produk = mysqli_query($koneksi, "INSERT INTO produk (nama_produk, deskripsi, harga, foto_produk) 
                        VALUES ('".$nama_produk."', '".$deskripsi."', '".$harga."', '".$newname."')");
        if ($input_produk) {
            echo "<script>alert('Berhasil menambahkan produk');location.href='data_produk.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan produk');location.href='tambah_produk.php';</script>";
        }
    } else {
        echo "<script>alert('File tidak sesuai');location.href='tambah_produk.php';</script>";
    }
?>