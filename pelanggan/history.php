<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body style="background-color: lavenderblush">
    <main>
    <?php
        include "navbar.php";
    ?>
    <br></br><br>
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color: #e8c3b7;">
                <h1>History Pembayaran</h1>
            </div>
            <div class="card-body">
                <?php 
                if (@$_SESSION['history'] == null) {
                    echo "History pembayaran kosong";
                    echo "<p style='color: red;'>* Semua data History Pembayaran hanya akan muncul sekali setelah berhasil melakukan pembayaran dan akan hilang ketika Anda Logout<br>
                    * Simpanlah data History Pembayaran Anda (foto/screenshoot) untuk mengetahui pembayaran yang sudah Anda lakukan sebelum Logout</p>";
                }
                else {
                ?>
                <p style='color: red;'>* Semua data history pembayaran hanya akan muncul sekali setelah berhasil melakukan pembayaran dan akan hilang ketika Anda Logout<br>
                * Simpanlah data history pembayaran Anda (foto/screenshoot) untuk mengetahui pembayaran yang sudah Anda lakukan sebelum Logout</p>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Id/No Transaksi</th>
                        <th scope="col">Bank</th>
                        <th scope="col">Total Pembayaran</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (@$_SESSION['history'] as $key => $value) : ?>
                        <tr>
                            <td><?=($key+1)?></td>
                            <td><?=$value['id_transaksi']?></td>
                            <td><?=$value['bank']?></td>
                            <td><?=$value['bayar']?></td>
                            <td>Sudah bayar</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php } ?>
            </div>
        </div>
    </div>
    <footer>
        <?php
            include "footer.php";
        ?>
    </footer>
</body>
</html>