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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/detail_ruangan.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="container-fluid navbar navbar-expand-lg bg-light sticky-top px-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img id="logo-simpru" src="../src/img/SimpruLOGO.png" alt="Logo SIMPRU" width="280" height="73.04">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../res/about.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" aria-current="page" href="#">
                            <b>Kategori Pemesanan - Ruangan</b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../res/list_ruangan.php">Ruangan</a></li>
                            <li><a class="dropdown-item" href="../res/list_kendaraan.php">Kendaraan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link" href="#">Akun Saya</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <form class="d-flex mx-2" role="search">
                        <input class="form-control me-2" type="search" placeholder="Ingin menyewa apa?"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Cari</button>
                    </form>
                    <div class="dropdown mx-2 d-none d-md-block">
                        <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../src/icon/AccountIcon.svg" alt="Account Icon" width="36px" height="36px">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <?php if( isset($_SESSION['username'])): ?>
                            <li class="dropdown-item">Halo, <?= $_SESSION['username'] ?></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Pemesanan Anda</a></li>
                            <form class="my-3" action="../helper/logout_process.php" method="post">
                                <button type="submit" class="dropdown-item">Keluar</button>
                            </form>
                            <?php else: ?>
                            <li><a class="dropdown-item" href="./res/login.php">Login</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./res/register.php">Buat Akun Baru</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!---->

    <h2><?= $nama_ruangan ?></h2>
    <img src="../src/img/<?= str_replace(" ", "", $nama_ruangan) ?>.webp" alt="Gambar <?= $nama_ruangan ?>">

    <p>Jenis Ruangan: <?= $jenis_ruangan ?></p>
    <p>Kuota Ruangan: <?= $kuota_ruangan ?></p>

    <a href="./detail_jadwal_ruangan.php?ruangan=<?= $nama_ruangan ?>&bulan=<?= date("m"); ?>&tahun=<?= date("Y"); ?>"
        class="btn btn-primary my-2">Lihat Jadwal</a>
    <a href="../res/list_ruangan.php" class="my-2 btn btn-light border-primary text-primary">Kembali ke Daftar
        Ruangan</a>

    <!-- Footer -->
    <div class="container-fluid bg-blacks-main">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="text-light text-center my-4">Kontak</h1>
                    <p class="text-light text-center">Jl. Raya ITS, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111</p>
                    <p class="text-light text-center">+62 31 599 5111</p>
                    <p class="text-light text-center">its.ac.id</p>
                </div>
                <div class="col-md-4">
                    <h1 class="text-light text-center my-4">Sosial Media</h1>
                    <div class="d-flex justify-content-center">
                        <a href="https://www.facebook.com/its.ac.id" class="btn btn-light mx-1" target="_blank">
                            <img src="../src/icon/FacebookIcon.svg" alt="Facebook Icon">
                        </a>
                        <a href="https://www.instagram.com/its.ac.id/" class="btn btn-light mx-1" target="_blank">
                            <img src="../src/icon/InstagramIcon.svg" alt="Instagram Icon">
                        </a>
                        <a href="https://www.youtube.com/channel/UCZ9Y4Z2Z1Z0Z9Z0Z9Z0Z0Z0" class="btn btn-light mx-1"
                            target="_blank">
                            <img src="../src/icon/YoutubeIcon.svg" alt="Youtube Icon">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h1 class="text-light text-center my-4">Tentang Kami</h1>
                    <p class="text-light text-center">ITS adalah institut yang berada di Surabaya, Jawa Timur. ITS
                        memiliki banyak fasilitas yang dapat digunakan oleh mahasiswa ITS</p>
                </div>
            </div>
        </div>
    </div>
    <!---->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>