<?php
    session_start();
    include "koneksi.php";
    $keranjang = @$_SESSION['keranjang'];
    if (count($keranjang) > 0) {
        $tgl_transaksi = date('Y-m-d');
        $query_transaksi = mysqli_query($koneksi, "INSERT INTO transaksi (id_pelanggan, id_petugas, tgl_transaksi)
        VALUES ('".$_SESSION['id_pelanggan']."', '".$_SESSION['id_petugas']."', '".$tgl_transaksi."')");

        if ($query_transaksi) {
            $id = mysqli_insert_id($koneksi);
            foreach ($keranjang as $key => $value) {
                $qty = $value['qty'];
                $harga = $value['harga'];
                $subtotal = $qty*$harga;
                mysqli_query($koneksi, "INSERT INTO detail_transaksi (id_transaksi, id_produk, qty, subtotal)
                VALUES ('".$id."', '".$value['id_produk']."', '".$qty."', '".$subtotal."')");
            }
            unset($_SESSION['keranjang']);
            echo "<script>alert('Anda Berhasil Membeli Produk');location.href='pembelian.php'</script>";
        }
        else{
            echo "<script>alert('Gagal Membeli Produk');location.href='keranjang.php'</script>";
        }
    }
?>