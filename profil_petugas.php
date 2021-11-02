<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Petugas</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body style="background-color: lavenderblush">
    <?php
        include "navbar.php";
        include "koneksi.php";
        $query_profil = mysqli_query($koneksi, 
        "SELECT * FROM petugas WHERE id_petugas = '".$_SESSION['id_petugas']."'");
        $data_petugas = mysqli_fetch_array($query_profil);
    ?>
    
    <main class="container">
        <br><br><br>
        <h1 style="text-align: center;">Profil Anda</h1>
        <hr>
    <section class="container">
        <div class="col">
            <form action=""><input type="hidden" name="id_petugas" value="<?= $data_petugas['id_petugas'] ?>"></form>
            <table class="table table-hover table-striped mb-4">
                <thead style="text-align: left;">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $data_petugas['nama_petugas'] ?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?= $data_petugas['username'] ?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><?= $data_petugas['password'] ?><span style="color: red;"> *password disamarkan</span></td>
                    </tr>
                    <tr>
                        <td>Level</td>
                        <td>:</td>
                        <td><?= $data_petugas['level'] ?></td>
                    </tr> 
                </thead>
            </table>
        </div>
        <a class="btn btn-secondary" href="home.php" role="button">Kembali ke menu awal</a>
        <div style="float: right;">
            <a href="ubah_petugas.php?id_petugas=<?= $data_petugas['id_petugas']; ?>" class="btn btn-success">Edit profil</a> 
            <a href="hapus_petugas.php?id_petugas=<?= $data_petugas['id_petugas']; ?>" 
            onclick="return confirm('Apakah anda yakin menghapus akun ini? jika iya klik ok, lalu klik panah kiri (<-) di jendela web dan klik Logout')" 
            class="btn btn-danger">Hapus akun admin</a>
        </div>
    </section>
    </main>
    <?php
        include "footer.php";
    ?>
</body>
</html>