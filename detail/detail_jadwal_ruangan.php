<?php

include("../helper/ruangan_list_process.php");
include("../config.php");

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

// jika bulan tertentu ada -> set variabel
if(isset($_GET['bulan']) && isset($_GET['tahun'])) {
    $currMonth = $_GET['bulan'];
    $currYear = $_GET['tahun'];

    if($currMonth == 13) {
        $currYear += 1;
        $currMonth = 1;
    }
    else if($currMonth == 0) {
        $currYear -= 1;
        $currMonth = 12;
    }
}

$nama_ruangan = $_GET['ruangan'];

// ambil list jadwal
$sqlJadwal = "
    SELECT tanggal, waktu_mulai, waktu_selesai
    FROM jadwal_sewa_ruangan
    WHERE MONTH(tanggal)=$currMonth AND 
        YEAR(tanggal)=$currYear AND 
        jadwal_sewa_ruangan.Ruangan_id_ruangan= (
            SELECT id_ruangan
            FROM ruangan
            WHERE nama_ruangan='$nama_ruangan'
        );
"
;

$resultListJadwal = mysqli_query($database, $sqlJadwal);

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
    <link rel="stylesheet" href="../css/detail_jadwal_ruangan.css">
</head>
<body>
    <h2>JADWAL PEMAKAIAN</h2>
    <h2><?= $nama_ruangan ?></h2>
    <h3 id="table-month"></h3>

    <table class="table table-responsive w-75">
        <thead>
            <tr>
                <th scope="col" class="week">S</th>
                <th scope="col" class="week">M</th>
                <th scope="col" class="week">T</th>
                <th scope="col" class="week">W</th>
                <th scope="col" class="week">T</th>
                <th scope="col" class="week">F</th>
                <th scope="col" class="week">S</th>
            </tr>
        </thead>
        <tbody id="table-body">
        </tbody>
    </table>
    <div class="container d-flex justify-content-center border-3 border-bottom">
        <a href="./detail_jadwal_ruangan.php?ruangan=<?= $nama_ruangan ?>&bulan=<?= $currMonth-1; ?>&tahun=<?= $currYear; ?>" class="btn btn-primary rounded m-2"><</a>
        <a href="./detail_jadwal_ruangan.php?ruangan=<?= $nama_ruangan ?>&bulan=<?= $currMonth+1; ?>&tahun=<?= $currYear; ?>" class="btn btn-primary rounded m-2">></a>
    </div>

    <h4>Jadwal Pemakaian</h4>
    <table class="table table-striped table-responsive w-50">
        <thead>
            <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu Mulai</th>
                <th scope="col">Waktu Selesai</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($resultListJadwal)): ?>
                <tr>
                    <td class="tanggalPemakaian"><?= $row['tanggal'] ?></td>
                    <td><?= $row['waktu_mulai'] ?></td>
                    <td><?= $row['waktu_selesai'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <a href="../res/buat_pesanan_ruangan.php?ruangan=<?= $nama_ruangan?>" class="btn btn-success m-2">Lakukan Pemesanan</a>
    <a href="../detail/detail_ruangan.php?ruangan=<?= $nama_ruangan?>" class="btn btn-light border-primary text-primary m-2">Kembali ke Detail Ruangan</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        let currMonth = <?= $currMonth; ?>;
        let currYear = <?= $currYear; ?>;
    </script>
    <script src="../js/dateview.js"></script>
    <script src="../js/datecolor.js"></script>
</body>
</html>