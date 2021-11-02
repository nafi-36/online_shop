<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pelanggan</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body style="background-color: lavenderblush"> 
<div class="container">
        <div class="card" style="margin: 20px;">
            <div class="card-header" style="background-color: #e8c3b7;"><h1>Registrasi</h1></div>
            <div class="card-body">
                <form action="proses_registrasi.php" method="POST">
                    <div class="mb-2">
                        <label for="nama" class="form-label">Nama :</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="mb-2">
                        <label for="alamat" class="form-label">Alamat :</label>
                        <textarea class="form-control" name="alamat" placeholder="Masukkan alamat Anda" required></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="telp" class="form-label">No. Telepon :</label>
                        <input type="number" class="form-control" name="telp" placeholder="Masukkan No. Hp Anda" required>
                    </div>
                    <div class="mb-2">
                        <label for="username" class="form-label">Username :</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username Anda" required>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password Anda" required>
                    </div>
                    <button type="submit" class="btn btn-secondary">Buat Akun</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>