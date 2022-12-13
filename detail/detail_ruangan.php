<?php

include("../helper/ruangan_list_process.php");

session_start();

if(!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

if(!isset($_GET['ruangan'])) {
    header("Location: ../res/list_ruangan");
}

while($row = mysqli_fetch_assoc($resultListRuangan)) {
    if($row['nama_ruangan'] == $_GET['ruangan']) break;
}

$nama_ruangan = $row['nama_ruangan'];
$jenis_ruangan = $row['jenis_ruangan'];
$kuota_ruangan = $row['kuota_ruangan'];

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
    <link rel="stylesheet" href="../css/detail_ruangan.css">
</head>
<body>
    <h1>DETAIL RUANGAN PAGE</h1>

    <h2><?= $nama_ruangan ?></h2>
    <img src="" alt="Gambar <?= $nama_ruangan ?>">

    <p>Jenis Ruangan: <?= $jenis_ruangan ?></p>
    <p>Kuota Ruangan: <?= $kuota_ruangan ?></p>

    <a href="./detail_jadwal_ruangan.php?ruangan=<?= $nama_ruangan ?>&bulan=<?= date("m"); ?>&tahun=<?= date("Y"); ?>" class="btn btn-primary my-2">Lihat Jadwal</a>
    <a href="../res/list_ruangan.php" class="my-2 btn btn-light border-primary text-primary">Kembali ke Daftar Ruangan</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>