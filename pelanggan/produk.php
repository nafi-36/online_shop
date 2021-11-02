<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>

<body style="background-color: lavenderblush">
    <header>
        <?php
            include "navbar.php";
        ?>
    </header>

    <main>
    <div class="container">
        <br><br><br>
        <h1 style="text-align: center;">DAFTAR PRODUK</h1>
        <hr>
        <p>Cari produk :</p>
        <form action="produk.php" method="POST" style="padding-bottom: 15px;" class="d-flex">
            <input class="form-control me-2" type="search" name="cari" placeholder="Masukkan keyword nama produk" aria-label="Search">
            <button class="btn btn-outline" type="submit" style="color:lavenderblush; background-color: rgb(158, 74, 74);">Search</button>
        </form>
        <p style="color: red;">*Masukkan keyword dan klik search/enter<br>*Kosongkan dan klik search/enter unutk menampilkan semua list produk</p>
        <a href="home.php" class="btn btn-outline" style="color:lavenderblush; background-color: rgb(158, 74, 74);">Kembali ke menu awal</a>
        <br><br><hr>
    </div>

    <div class="album py-4">
    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 g-4">
        <?php 
            include "koneksi.php";
            if (isset($_POST['cari'])) {
                $cari = $_POST['cari'];
                $query_produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE 
                                nama_produk LIKE '%$cari%'");
            } else {
                $query_produk = mysqli_query($koneksi, "SELECT * FROM produk");
            } 
            while ($data_produk = mysqli_fetch_array($query_produk)) { 
        ?>

        <div class="col">
            <div class="card shadow-sm">
                <img src="../gambar/<?= $data_produk['foto_produk']; ?>" 
                class="bd-placeholder-img card-img-top" width="100px" height="400px"
                xmlns="http://www.w3.org/2000/svg" role="img"
                aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                focusable="false"><title>Placeholder</title>
                <rect width="100%" heigth="100%"></img>   

                <div class="card-body">
                    <p class="card-text"><b><?= $data_produk['nama_produk']; ?></b></p>
                    <p class="card-text text-muted">Harga : Rp.<?= $data_produk['harga']; ?></p>
                    <p class="card-text"><?= $data_produk['deskripsi']; ?></p>
                    <a href="beli_produk.php?id_produk=<?= $data_produk['id_produk'] ?>" class="btn btn-outline" 
                       style="color:lavenderblush; background-color: rgb(158, 74, 74);">Beli produk</a>
                </div> 
            </div>
        </div>
        <?php } ?>
    </div>
    </div>
    </main>
    <?php
        include "footer.php";
    ?>
</body>
</html>