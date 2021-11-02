<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body style="background-color: lavenderblush">
    <?php 
        include "koneksi.php";
        $qry_get_petugas = mysqli_query($koneksi, 
        "SELECT * FROM petugas WHERE id_petugas = '".$_GET['id_petugas']."'");
        $dt_petugas = mysqli_fetch_array($qry_get_petugas);
    ?>
    <div class="container">
        <div class="card" style="margin: 20px;">
        <div class="card-header" style="background-color: #e8c3b7;"><h1>Edit Profil</h1></div>
        <div class="card-body">
        <a class="btn btn-secondary" href="profil_petugas.php" role="button">Kembali ke profil Anda</a><hr>
        <form action="proses_ubah_petugas.php" method="POST">
            <input type="hidden" name="id_petugas" value="<?= $dt_petugas['id_petugas'] ?>">
            <div class="mb-2">
                <label class="form-label">Nama : </label>
                <input type="text" name="nama_petugas" value="<?= $dt_petugas['nama_petugas'] ?>" class="form-control" required> 
            </div>
            <div class="mb-2">
                <label class="form-label">Username : </label>
                <input type="text" name="username" value="<?= $dt_petugas['username'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password : </label>
                <input type="password" name="password" value="<?= $dt_petugas['password'] ?>" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Level : </label>
                <input type="text" name="level" value="<?= $dt_petugas['level'] ?>" class="form-control" required>
            </div>
            <input type="submit" name="simpan" value="Edit Profil Anda" class="btn btn-secondary">
        </form>
        </div>
    </div>    
</body>
</html>