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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/buat_pemesanan_ruangan.css">
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

    <!-- TITLE -->
    <div class="container">
        <h3 class="text-center border-bottom border-5 py-2">Masukkan Data Pemesan</h3>
        <h1 class="text-center my-4"><?= $nama_ruangan ?></h1>
    </div>
    <!---->

    <?php if(isset($_GET['pemesanan'])): ?>
        <?php if($_GET['pemesanan'] == 'failed'): ?>
            <p class="p-2 bg-light text-warning border border-warning rounded">Pemesanan gagal dibuat !</p>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Form -->
    <form class="my-3 d-flex justify-content-center flex-column" action="../helper/pemesanan_ruangan_process.php"
        method="POST">
        <div class="mb-3">
            <label for="tanggalPemakaian" class="form-label">Tanggal Pemakaian</label>
            <input type="date" min="<?= date("Y-m-d"); ?>" value="<?= date("Y-m-d"); ?>" class="form-control"
                id="tanggalPemakaian" name="tanggalPemakaian" aria-describedby="tanggalPemakaianHelp" required>
        </div>
        <div class="mb-3">
            <label for="jamMulai" class="form-label">Jam Mulai Pemakaian</label>
            <input type="time" min="07:00" max="20:00" value="08:00" class="form-control" id="jamMulai" name="jamMulai"
                aria-describedby="jamMulaiHelp" required>
        </div>
        <div class="mb-3">
            <label for="jamSelesai" class="form-label">Jam Selesai Pemakaian</label>
            <input type="time" min="08:00" max="21:00" value="10:00" class="form-control" id="jamSelesai"
                name="jamSelesai" aria-describedby="jamSelesaiHelp" required>
        </div>

        <!-- Detail Pemesan -->
        <input type="text" name="username" value="<?= $_SESSION['username'] ?>" hidden>
        <input type="text" name="namaRuangan" value="<?= $nama_ruangan ?>" hidden>

        <!-- Button trigger modal -->
        <button id="testPesanan" type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">
            Submit
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Pemesanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="modalContent" class="modal-body">
                        Anda dengan username: <?= $_SESSION['username'] ?> akan memesan Ruangan <?= $nama_ruangan ?>.
                        Mohon memerhatikan pemesanan sebelum konfirmasi!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button id="submitPesanan" type="submit" name="submit" class="btn btn-primary">Pesan
                            Ruangan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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