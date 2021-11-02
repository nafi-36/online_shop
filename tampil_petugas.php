<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body style="background-color: lavenderblush">
    <div class="container">
    <div class="card" style="margin: 20px;">
        <div class="card-header" style="background-color: #e8c3b7;"><h1>Data Petugas</h1></div>
        <div class="card-body">
            <p>Cari data petugas :</p>
            <form action="tampil_petugas.php" method="POST" style="padding-bottom: 15px;" class="d-flex">
                <input class="form-control me-2" type="search" name="cari" placeholder="Masukkan keyword id / nama / level" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
            <p style="color: red;">*Masukkan keyword dan klik search/enter<br>*Kosongkan dan klik search/enter unutk menampilkan semmua data</p>
            <!-- <a class="btn btn-secondary" href="perpus.html" role="button">Kembali ke menu awal</a> -->
            <a class="btn btn-secondary" href="index.php" role="button">Kembali</a>
            <hr>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID PETUGAS</th>
                    <th scope="col">NAMA PETUGAS</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">LEVEL</th>
                </tr> 
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    if (isset($_POST["cari"])) {
                        // if ($_POST["cari"] != NULL)
                        // jika ada keyword pencarian
                        $cari = $_POST["cari"];
                        $query_petugas = mysqli_query($koneksi, "SELECT * FROM petugas WHERE
                        id_petugas = '$cari' OR nama_petugas LIKE '%$cari%' OR level LIKE '%$cari%'");
                    } else {
                        // jika tdk ada keyword pencarian
                        $query_petugas = mysqli_query($koneksi, "SELECT * FROM petugas");
                    }
                    
                    //$query_kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
                    while ($data_petugas = mysqli_fetch_array($query_petugas)) { ?>
                        <tr>
                            <td><?= $data_petugas['id_petugas']; ?></td>
                            <td><?= $data_petugas['nama_petugas']; ?></td>
                            <td><?= $data_petugas['username']; ?></td>
                            <td><?= $data_petugas['level']; ?></td>
                            <!-- <td>
                                <a href="ubah_petugas.php?id_petugas=<?=$data_petugas['id_petugas'];?>" class="btn btn-success">Ubah</a> 
                                <a href="hapus_petugas.php?id_petugas=<?=$data_petugas['id_petugas'];?>" 
                                onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                            </td> -->
                        </tr>
                    <?php } 
                ?>
            </tbody>
            </table>
        </div>
    </div>
    </div>
</body>
</html>
