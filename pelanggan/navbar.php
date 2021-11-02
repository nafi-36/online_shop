<?php 
    session_start();
    if ($_SESSION['status_login'] != true) {
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO ONLINE</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="color:lavenderblush; background-color: rgb(158, 74, 74);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TOKO ONLINE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="produk.php">Lihat Produk</a>
                <a class="nav-link" href="keranjang.php">Keranjang</a>
                <a class="nav-link" href="pembelian.php">Pembelian</a>
                <a class="nav-link" href="history.php">History Pembayaran</a>
                <a class="nav-link" href="profil_pelanggan.php">Lihat Profil Anda</a>
                <a class="nav-link" href="proses_logout.php">Logout</a>
            </div>    
            </div>   
        </div>
    </nav>
</body>
</html>