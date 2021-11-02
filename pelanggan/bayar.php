<?php
    session_start();
    if ($_POST['id_transaksi']) {
        include "koneksi.php";
        $id_transaksi = $_POST['id_transaksi'];
        $bayar = $_POST['bayar'];
        
        $query_bayar = mysqli_query($koneksi, "SELECT SUM(subtotal) AS total FROM detail_transaksi
        WHERE id_transaksi = '".$id_transaksi."'");
        $data_bayar = mysqli_fetch_array($query_bayar);
        $total = $data_bayar['total'];

        if ($bayar != $total) {
            echo "<script>alert('Pembayaran gagal, nominal tidak sesuai');location.href='pembelian.php';</script>";
        }
        else {
            $_SESSION['history'][] = array(
                'id_transaksi' => $_POST['id_transaksi'],
                'bayar' => $bayar,
                'bank' => $_POST['bank']
            );
            echo "<script>alert('Pembayaran berhasil');location.href='history.php';</script>";
        }
    }
?>