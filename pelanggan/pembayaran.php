<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEMBAYARAN</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>

<body style="background-color: lavenderblush">
    <?php
        include "navbar.php";
        include "koneksi.php";
        $query_detail = mysqli_query($koneksi, "SELECT * FROM detail_transaksi d
                        JOIN produk p ON p.id_produk = d.id_produk WHERE
                        id_transaksi = '".$_GET['id_transaksi']."'");
        $data_detail = mysqli_fetch_array($query_detail);
    ?>
    <br><br><br>
        <div class="container">
        <div class="card">
            <div class="card-header"style="background-color: #e8c3b7;"><h1>PEMBAYARAN</h1></div>
            <div class="card-body">
            <form action="bayar.php" method="POST">
                <input type="hidden" name="id_transaksi" value="<?= $data_detail['id_transaksi'] ?>">
                <div class="mb-2">
                    <label class="form-label">Id/No Transaksi : </label>
                    <input type="text" value="<?= $data_detail['id_transaksi'] ?>" class="form-control" readonly> 
                </div>
                <div class="mb-2">
                <label class="form-label">Transaksi Bank : </label>
                <select name="bank" class="form-select" aria-label="Default select example" required>
                    <option selected></option>
                    <option value="BNI">BNI</option>
                    <option value="BRI">BRI</option>
                    <option value="Mandiri">Mandiri</option>
                </select>
                </div>
                <div class="mb-2">
                    <label class="form-label">Masukkan nominal pembayaran : </label>
                    <input type="number" name="bayar" class="form-control" placeholder="Masukkan nominal uang sesuai total bayar" required> 
                </div>
                <br>
                <div style="float: left;">
                <a href="pembelian.php" class="btn btn-outline" style="background-color: rgb(158, 74, 74); color: lavenderblush">Kembali ke data transaksi</a>
                <input type="submit" class="btn btn-success" value="Bayar Sekarang">
                </div>
            </form>
            </div>
        </div>    
        </div>    
    <?php
        include "footer.php";
    ?>
</body>
</html>