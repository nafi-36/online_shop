<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body style="background-color: lavenderblush">
    <?php
        include "navbar.php";
    ?>
    <br></br><br>
        <div class="container">
        <div class="card">
            <div class="card-header" style="background-color: #e8c3b7;">
                <h1>History Pembelian Produk</h1>
            </div>
            <div class="card-body" style="float: left;">
            <p style='color: red;'>* Lakukan pembayaran 1x (klik bayar 1x), jika sudah jangan klik tombol bayar lagi<br>
            * Cek History Pembayaran untuk mengetahuhi pembayaran yang sudah Anda lakukan, sesuaikan dengan Id/No Transaksi</p>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id/No Transaksi</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "koneksi.php";
                    $query_pembelian = mysqli_query($koneksi, "SELECT * FROM transaksi 
                    where id_pelanggan = '".$_SESSION['id_pelanggan']."'
                    ORDER BY id_transaksi DESC");
                    $no=0;
                    while($data_pembelian = mysqli_fetch_array($query_pembelian)){
                        $no++;
                    ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$data_pembelian['id_transaksi']?></td>
                        <td><?=$data_pembelian['tgl_transaksi']?></td>
                        <td>
                            <ol>
                            <?php
                            include "koneksi.php";
                            $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d
                                            JOIN produk p ON p.id_produk = d.id_produk WHERE
                                            id_transaksi = '".$data_pembelian['id_transaksi']."'");
                            while($data_detail = mysqli_fetch_array($query_detail)){
                                echo "<li>".$data_detail['nama_produk']."</li>";
                            }
                            ?>
                            </ol>
                        </td>
                        <td>
                            <ul style="list-style: none;">
                            <?php
                            include "koneksi.php";
                            $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d
                                            JOIN produk p ON p.id_produk = d.id_produk WHERE
                                            id_transaksi = '".$data_pembelian['id_transaksi']."'");
                            while($data_detail = mysqli_fetch_array($query_detail)){
                                echo "<li>".$data_detail['qty']."<li>";
                            }
                            ?>
                            </ul>
                        </td>
                        <td>
                            <ul style="list-style: none;">
                            <?php
                            include "koneksi.php";
                            $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d
                                            JOIN produk p ON p.id_produk = d.id_produk WHERE
                                            id_transaksi = '".$data_pembelian['id_transaksi']."'");
                            while($data_detail = mysqli_fetch_array($query_detail)){
                                echo "<li>".($data_detail['subtotal']/$data_detail['qty'])."<li>";
                            }
                            ?>
                            </ul>
                        </td>
                        <td>
                            <ul style="list-style: none;">
                            <?php
                            include "koneksi.php";
                            $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d
                                            JOIN produk p ON p.id_produk = d.id_produk WHERE
                                            id_transaksi = '".$data_pembelian['id_transaksi']."'");
                            while($data_detail = mysqli_fetch_array($query_detail)){
                                echo "<li>".$data_detail['subtotal']."</li>";
                            }
                            ?>
                            </ul>
                        </td>
                        <td>
                        <?php
                            include "koneksi.php";
                            $query_bayar = mysqli_query($koneksi, "SELECT SUM(subtotal) AS total FROM detail_transaksi
                            WHERE id_transaksi = '".$data_pembelian['id_transaksi']."'");
                            $data_bayar = mysqli_fetch_array($query_bayar);
                            echo "<label class='alert alert-secondary'>Rp. ".$data_bayar['total']."</label>";
                            ?>
                        </td>
                        <td>
                            <form action="pembayaran.php" method="POST">
                                <a href="pembayaran.php?id_transaksi=<?= $data_pembelian['id_transaksi']; ?>" class="btn btn-success">Bayar</a> 
                            </form>
                        </td>                          
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    <?php
        include "footer.php";
    ?>
</body>
</html>