<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body style="background-color: lavenderblush">
    <?php 
        include "navbar.php";
    ?>
    <br><br><br>
    <div class="container">
    <div class="card" style="margin: 20px;">
        <div class="card-header" style="background-color: #e8c3b7;"><h1>Data Produk</h1></div>
        <div class="card-body">
            <p>Cari data produk :</p>
            <form action="data_produk.php" method="POST" style="padding-bottom: 15px;" class="d-flex">
                <input class="form-control me-2" type="search" name="cari" placeholder="Masukkan keyword id / nama produk" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
            <p style="color: red;">*Masukkan keyword dan klik search/enter<br>*Kosongkan dan klik search/enter unutk menampilkan semua data</p>
            <a class="btn btn-secondary" href="home.php" role="button">Kembali ke menu awal</a>
            <a class="btn btn-secondary" href="tambah_produk.php" role="button">Tambahkan Produk</a>
            <hr>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID PRODUK</th>
                    <th scope="col">NAMA PRODUK</th>
                    <th scope="col">DESKRIPSI</th>
                    <th scope="col">HARGA</th>
                    <th scope="col">FOTO PRODUK</th>
                    <th scope="col">AKSI</th>
                </tr> 
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    if (isset($_POST["cari"])) {
                        // if ($_POST["cari"] != NULL)
                        // jika ada keyword pencarian
                        $cari = $_POST["cari"];
                        $query_produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE
                        id_produk = '$cari' OR nama_produk LIKE '%$cari%'");
                    } else {
                        // jika tdk ada keyword pencarian
                        $query_produk = mysqli_query($koneksi, "SELECT * FROM produk");
                    }
                    
                    //$query_produk = mysqli_query($koneksi, "SELECT * FROM produk");
                    while ($data_produk = mysqli_fetch_array($query_produk)) { ?>
                        <tr>
                            <td><?= $data_produk['id_produk']; ?></td>
                            <td><?= $data_produk['nama_produk']; ?></td>
                            <td><?= $data_produk['deskripsi']; ?></td>
                            <td><?= $data_produk['harga']; ?></td>
                            <td><img src="gambar/<?= $data_produk['foto_produk']; ?>" width="110" height="150"></td>
                            <td>
                                <a href="ubah_produk.php?id_produk=<?=$data_produk['id_produk'];?>" class="btn btn-success">Ubah</a> 
                                <a href="hapus_produk.php?id_produk=<?=$data_produk['id_produk'];?>" 
                                onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                            </td>
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
