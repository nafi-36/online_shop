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
    <style>
        .bg {
            background-image: url('../gambar/os.png');
            background-size: 100%;
        }
    </style>
</head>
<body class="bg">
    <?php 
        include "navbar.php";
    ?>
    <br><br><br><br><br><br><br><br><br><br><br>
    <div style="text-align: center; color: rgb(158, 74, 74);">
        <h1>TOKO ONLINE</h1>
        <h2>Selamat Datang <?= $_SESSION['nama'] ?> :></h2>
        <h2>Selamat Berbelanja</h2>
    </div>
</body>
</html>