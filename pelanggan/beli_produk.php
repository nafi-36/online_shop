<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Produk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>

<body style="background-color: lavenderblush">
    <?php
        include "navbar.php";
        include "koneksi.php";
        $query_detail_produk = mysqli_query($koneksi, 
        "SELECT * FROM produk WHERE id_produk = '".$_GET['id_produk']."'");
        $data_produk = mysqli_fetch_array($query_detail_produk);
    ?>
    
    <main class="container">
        <br><br><br>
        <h1 style="text-align: center;">BELI PRODUK</h1>
        <hr>
    <section class="py-5 text-center container">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../gambar/<?= $data_produk['foto_produk'] ?>" class="img-fluid" alt=".."
                 width="250px" height="1000px">
            </div>
        <div class="col-md-8">
            <div class="card-body">
            <form action="masuk_keranjang.php" method="POST">
                <input type="hidden" name="id_produk" value="<?= $data_produk['id_produk'] ?>">
                <table class="table table-hover table-striped">
                    <thead style="text-align: left;">
                    <tr>
                        <td>Nama produk</td>
                        <td>:</td>
                        <td><?= $data_produk['nama_produk'] ?></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td><?= $data_produk['harga'] ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td><?= $data_produk['deskripsi'] ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah pembelian</td>
                        <td>:</td>
                        <td><input type="number" name="jumlah_pembelian" value="1"></td>
                    </tr> 
                    </thead>
                </table>
                <br>
                <div style="float: left;">
                <a href="produk.php" class="btn btn-outline" style="background-color: rgb(158, 74, 74); color: lavenderblush">Kembali ke lihat produk</a>
                <input type="submit" class="btn btn-success" value="Masukkan keranjang">
                </div>
            </form>
            </div>
        </div>
        </div>
    </section>
    </main>
    <?php
        include "footer.php";
    ?>
</body>
</html>