<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pelanggan</title>
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
        "SELECT * FROM pelanggan WHERE id_pelanggan = '".$_SESSION['id_pelanggan']."'");
        $data_pelanggan = mysqli_fetch_array($query_profil);
    ?>
    
    <main class="container">
        <br><br><br>
        <h1 style="text-align: center;">Profil Anda</h1>
        <hr>
    <section class="container">
        <div class="col">
            <form action=""><input type="hidden" name="id_pelanggan" value="<?= $data_pelanggan['id_pelanggan'] ?>"></form>
            <table class="table table-hover table-striped mb-4">
                <thead style="text-align: left;">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $data_pelanggan['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $data_pelanggan['alamat'] ?></td>
                    </tr> 
                    <tr>
                        <td>No. Telepon</td>
                        <td>:</td>
                        <td><?= $data_pelanggan['telp'] ?></td>
                    </tr> 
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?= $data_pelanggan['username'] ?></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><?= $data_pelanggan['password'] ?><span style="color: red;"> *password disamarkan</span></td>
                    </tr>
                </thead>
            </table>
        </div>
        <a class="btn btn-secondary" href="home.php" role="button">Kembali ke menu awal</a>
        <div style="float: right;">
            <a href="ubah_pelanggan.php?id_pelanggan=<?= $data_pelanggan['id_pelanggan']; ?>" class="btn btn-success">Edit profil</a> 
            <a href="hapus_pelanggan.php?id_pelanggan=<?= $data_pelanggan['id_pelanggan']; ?>" 
            onclick="return confirm('Apakah anda yakin menghapus akun ini? jika iya klik ok, lalu klik panah kiri (<-) di jendela web dan klik Logout')" 
            class="btn btn-danger">Hapus akun</a>
        </div>
    </section>
    </main>
    <?php
        include "footer.php";
    ?>
</body>
</html>