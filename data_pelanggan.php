<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body style="background-color: lavenderblush">
<?php 
    include "navbar.php";
?>
<br><br><br>
<div class="container">
    <div class="card" style="margin: 20px;">
        <div class="card-header" style="background-color: #e8c3b7;"><h1>Data Pelanggan</h1></div>
        <div class="card-body">
            <p>Cari data pelanggan :</p>
            <form action="data_pelanggan.php" method="POST" style="padding-bottom: 15px;" class="d-flex">
                <input class="form-control me-2" type="search" name="cari" placeholder="Masukkan keyword id / nama / username pelanggan" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
            <p style="color: red;">*Masukkan keyword dan klik search/enter<br>*Kosongkan dan klik search/enter unutk menampilkan semua data</p>
            <a class="btn btn-secondary" href="home.php" role="button">Kembali ke menu awal</a>
            <hr>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">NO.TELP</th>
                    <th scope="col">USERNAME</th>
                </tr> 
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    if (isset($_POST["cari"])) {
                        // if ($_POST["cari"] != NULL)
                        // jika ada keyword pencarian
                        $cari = $_POST["cari"];
                        $query_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE
                        id_pelanggan = '$cari' OR nama LIKE '%$cari%' OR username LIKE '%$cari%'");
                    } else {
                        // jika tdk ada keyword pencarian
                        $query_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                    }
                    
                    //$query_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                    while ($data_pelanggan = mysqli_fetch_array($query_pelanggan)) { ?>
                        <tr>
                            <td><?= $data_pelanggan['id_pelanggan']; ?></td>
                            <td><?= $data_pelanggan['nama']; ?></td>
                            <td><?= $data_pelanggan['alamat']; ?></td>
                            <td><?= $data_pelanggan['telp']; ?></td>
                            <td><?= $data_pelanggan['username']; ?></td>
                        </tr>
                    <?php } 
                ?>
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