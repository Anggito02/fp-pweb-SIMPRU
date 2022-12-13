<?php

include("../helper/ruangan_list_process.php");

session_start();

if(!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

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
    <link rel="stylesheet" href="../css/list_ruangan.css">
</head>
<body>
    <h1>LIST RUANGAN PAGE</h1>

    <div class="list_pemesanan d-flex justify-content-center align-items-center flex-wrap">
        <?php while($row = mysqli_fetch_assoc($resultListRuangan)): ?>
            <div class="card m-2" style="width: 18rem;">
            <img src="" class="card-img-top" alt="Gambar <?= $row['nama_ruangan'] ?>" >
                <div class="card-body">
                    <h5 class="card-title"><?= $row['nama_ruangan'] ?></h5>
                    <p class="card-text">Tipe Ruangan: <?= $row['jenis_ruangan'] ?></p>
                    <p class="card-text">Kuota Ruangan: <?= $row['kuota_ruangan'] ?></p>
                    <a href="../detail/detail_ruangan.php?ruangan=<?= $row['nama_ruangan']?>" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <a href="./home.php" class="btn btn-primary m-2">Kembali ke Beranda</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>