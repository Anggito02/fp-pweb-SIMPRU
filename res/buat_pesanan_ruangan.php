<?php

session_start();    

// jika username tidak ada -> suruh login
if(!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

// jika ruangan tidak ada -> suruh pilih ruangan
if(!isset($_GET['ruangan'])) {
    header("Location: ../res/list_ruangan");
}

$nama_ruangan = $_GET['ruangan'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPRU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/buat_pemesanan_ruangan.css">
</head>
<body>
    <h1>BUAT PESANAN RUANGAN PAGE</h1>
    <h1>PEMINJAMAN RUANGAN</h1>
    <h2><?= $nama_ruangan ?></h2>

    <form class="my-3 d-flex justify-content-center flex-column" action="../helper/pemesanan_ruangan_process.php" method="POST">
    <div class="mb-3">
            <label for="tanggalPemakaian" class="form-label">Tanggal Pemakaian</label>
            <input type="date" min="<?= date("Y-m-d"); ?>" value="<?= date("Y-m-d"); ?>" class="form-control" id="tanggalPemakaian" name="tanggalPemakaian" aria-describedby="tanggalPemakaianHelp" required>
        </div>
        <div class="mb-3">
            <label for="jamMulai" class="form-label">Jam Mulai Pemakaian</label>
            <input type="time" min="07:00" max="20:00" value="08:00"class="form-control" id="jamMulai" name="jamMulai" aria-describedby="jamMulaiHelp" required>
        </div>
        <div class="mb-3">  
            <label for="jamSelesai" class="form-label">Jam Selesai Pemakaian</label>
            <input type="time" min="08:00" max="21:00" value="10:00" class="form-control" id="jamSelesai" name="jamSelesai" aria-describedby="jamSelesaiHelp" required>
        </div>

        <!-- Detail Pemesan -->
        <input type="text" name="username" value="<?= $_SESSION['username'] ?>" hidden>
        <input type="text" name="namaRuangan" value="<?= $nama_ruangan ?>" hidden>

        <!-- Button trigger modal -->
        <button id="testPesanan" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Submit
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Pemesanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="modalContent" class="modal-body">
                        Anda dengan username: <?= $_SESSION['username'] ?> akan memesan Ruangan <?= $nama_ruangan ?>. Mohon memerhatikan pemesanan sebelum konfirmasi!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button id="submitPesanan" type="submit" name="submit" class="btn btn-primary">Pesan Ruangan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php if(isset($_GET['pemesanan'])): ?>
        <?php if($_GET['pemesanan'] == 'failed'): ?>
            <p class="p-2 bg-light text-warning border border-warning rounded">Pemesanan gagal dibuat !</p>
        <?php endif; ?>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>