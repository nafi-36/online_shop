<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Produk</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body style="background-color: lavenderblush">
    <?php
        include "koneksi.php";
        $qry_get_produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '".$_GET['id_produk']."'");
        $dt_produk = mysqli_fetch_array($qry_get_produk);
    ?>
    <div class="container">
        <div class="card" style="margin: 20px;">
            <div class="card-header" style="background-color: #e8c3b7;"><h1>Ubah Produk</h1></div>
            <div class="card-body">
            <a class="btn btn-secondary" href="data_produk.php" role="button">Kembali ke Data Produk</a><hr>
            <form action="proses_ubah_produk.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_produk" value="<?= $dt_produk['id_produk'] ?>">
                <div class="mb-2">
                    <label class="form-label">Nama produk : </label>
                    <input type="text" name='nama_produk' class="form-control" value="<?= $dt_produk['nama_produk'] ?>" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Deskripsi produk : </label>
                    <textarea type="text" name="deskripsi" class="form-control" required><?= $dt_produk['deskripsi'] ?></textarea>
                </div>
                <div class="mb-2">
                    <label class="form-label">Harga produk : </label>
                    <input type="number" name="harga" class="form-control" value="<?= $dt_produk['harga'] ?>" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Foto produk : </label><br>
                    <img src="gambar/<?= $dt_produk['foto_produk'] ?>" width="110" height="150"><br>
                    <input type="file" name="foto_produk" class="form-control" required>
                    <p style="color: red">*Ekstensi yang diperbolehkan .png / .jpg / .jpeg<br>*Ukuran maksimal 2 MB</p>
                </div>
                <input type="submit" name="simpan" value="Ubah Produk" class="btn btn-secondary">
            </form>
            </div>
        </div>
    </div>
</body>
</html>