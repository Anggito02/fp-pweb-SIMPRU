<?php

session_start();

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
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <!-- Info Modal -->
    <div id="info-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-between">
                    <h5 id="modal-body-content" class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="container-fluid navbar navbar-expand-lg bg-light sticky-top px-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img id="logo-simpru" src="./src/img/SimpruLOGO.png" alt="Logo SIMPRU" width="280" height="73.04">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><b>Beranda</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./res/about.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Kategori Pemesanan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./res/list_ruangan.php">Ruangan</a></li>
                            <li><a class="dropdown-item" href="./res/list_kendaraan.php">Kendaraan</a></li>
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
                            <img src="./src/icon/AccountIcon.svg" alt="Account Icon" width="36px" height="36px">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <?php if( isset($_SESSION['username'])): ?>
                            <li class="dropdown-item">Halo, <?= $_SESSION['username'] ?></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Pemesanan Anda</a></li>
                            <form class="my-3" action="./helper/logout_process.php" method="post">
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

    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
                <img id="carousel-img" src="./src/img/GedungRektorat.webp" class="d-block w-100" alt="Gedung Rektorat">
                <div class="carousel-caption">
                    <h5 id="cust-carousel-caption" class="rounded p-2">SISTEM INFORMASI MANAJEMEN PEMINJAMAN RUANG</h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img id="carousel-img" src="./src/img/GedungRiset.webp" class="d-block w-100" alt="Gedung Riset">
                <div class="carousel-caption">
                    <h5 id="cust-carousel-caption" class="rounded p-2">SISTEM INFORMASI MANAJEMEN PEMINJAMAN RUANG</h5>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img id="carousel-img" src="./src/img/GrahaITS.webp" class="d-block w-100" alt="Graha ITS">
                <div class="carousel-caption">
                    <h5 id="cust-carousel-caption" class="rounded p-2">SISTEM INFORMASI MANAJEMEN PEMINJAMAN RUANG</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!---->

    <!-- Ruangan -->
    <div id="ruangan">
        <div class="container">
            <div class="row my-4">
                <div class="col">
                    <h1 class="text-center my-4">Ruangan</h1>
                    <p class="text-center">ITS menyediakan berbagai ruangan di berbagai area yang ada di ITS.
                        Ruangan-ruangan ini sepenuhnya digunakan untuk mendukung semua kegiatan elemen dari ITS, mulai
                        dari mahasiswa, dosen, dan staf ITS. Pemesanan tiap ruang yang ada di ITS dapat dilakukan pada
                        website ini.</p>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center flex-wrap">
                <div class="card m-3 wrapper">
                    <img id="img-card" src="./src/img/Pascasarjana.webp" class="card-img-top" alt="Pascasarjana">
                    <div class="card-body">
                        <h5 class="card-title">Pascasarjana</h5>
                        <p class="card-text">Ruang Pascasarjana yang cukup besar dapat digunakan oleh mahasiswa ITS
                            untuk berbagai keperluan mahasiswa ITS</p>
                    </div>
                </div>
                <div class="card m-3 wrapper">
                    <img id="img-card" src="./src/img/TeaterA.webp" class="card-img-top" alt="Teater A">
                    <div class="card-body">
                        <h5 class="card-title">Teater A</h5>
                        <p class="card-text">ITS memiliki 3 teater dilengkapi dengan kebutuhan layar, sound, dan
                            pendingin ruangan yang dapat digunakan oleh mahasiswa ITS</p>
                    </div>
                </div>
                <div class="card m-3 wrapper">
                    <img id="img-card" src="./src/img/GrahaITS.webp" class="card-img-top" alt="Graha ITS">
                    <div class="card-body">
                        <h5 class="card-title">Graha ITS</h5>
                        <p class="card-text">Graha ITS adalah gedung yang berada di kampus ITS yang berfungsi sebagai
                            tempat untuk mengadakan acara-acara besar.</p>
                    </div>
                </div>
            </div>
            <div id="selengkapnya" class="text-center my-4">
                <a href="./res/list_ruangan.php" class="btn btn-success"><b>Ruang Lainnya</b></a>
            </div>
        </div>
    </div>
    <!---->

    <!-- Kendaraan -->
    <div id="kendaraan">
        <div class="container">
            <div class="row my-4">
                <div class="col">
                    <h1 class="text-center my-4">Kendaraan</h1>
                    <p class="text-center">Selain ruangan, ITS juga senantiasa menyediakan peminjaman kendaraan. ITS
                        memahami bahwa ITS merupakan institut yang cukup luas untuk dilakukannya pemindahan
                        barang-barang dari satu gedung ke gedung lainnya. Maka dari itu, ITS ingin melengkapi kebutuhan
                        elemen ITS yang sekiranya membutuhkan kendaraan untuk pemindahan barang</p>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center flex-wrap">
                <div class="card m-3 wrapper">
                    <img id="img-card" src="./src/img/MobilPickup.webp" class="card-img-top" alt="Mobil Pickup">
                    <div class="card-body">
                        <h5 class="card-title">Mobil Pickup</h5>
                        <p class="card-text">Mobil Pickup dapat digunakan untuk pemindahan barang-barang yang berukuran
                            kecil sampai sedang</p>
                    </div>
                </div>
                <div class="card m-3 wrapper">
                    <img id="img-card" src="./src/img/TrukBox.webp" class="card-img-top" alt="Truk Box">
                    <div class="card-body">
                        <h5 class="card-title">Truk Box</h5>
                        <p class="card-text">Truk Box dapat digunakan untuk mengangkat barang cukup besar, membantu
                            mahasiswa saat melakukan pindah kos</p>
                    </div>
                </div>
                <div class="card m-3 wrapper">
                    <img id="img-card" src="./src/img/TrukEngkel.webp" class="card-img-top" alt="Truk Box">
                    <div class="card-body">
                        <h5 class="card-title">Truk Engkel</h5>
                        <p class="card-text">Truk Engkel dapat digunakan untuk pemindahan kursi-kursi saat acara besar
                            di ITS, seperti acara PSB dan OKKBK</p>
                    </div>
                </div>
            </div>
            <div id="selengkapnya" class="text-center my-4">
                <a href="./res/list_kendaraan.php" class="btn btn-success"><b>Kendaraan Lainnya</b></a>
            </div>
        </div>
    </div>
    <!---->

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
                            <img src="./src/icon/FacebookIcon.svg" alt="Facebook Icon">
                        </a>
                        <a href="https://www.instagram.com/its.ac.id/" class="btn btn-light mx-1" target="_blank">
                            <img src="./src/icon/InstagramIcon.svg" alt="Instagram Icon">
                        </a>
                        <a href="https://www.youtube.com/channel/UCZ9Y4Z2Z1Z0Z9Z0Z9Z0Z0Z0" class="btn btn-light mx-1"
                            target="_blank">
                            <img src="./src/icon/YoutubeIcon.svg" alt="Youtube Icon">
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
    <script src="https://code.jquery.com/jquery-3.6.2.slim.js" integrity="sha256-OflJKW8Z8amEUuCaflBZJ4GOg4+JnNh9JdVfoV+6biw=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        window.onload = () => {
            OpenInfoModal();
        };

    function OpenInfoModal() {
        // Set Modal Info
        let info = "";
        info = 
        <?php if(isset($_GET['logout'])): ?>
            "Logout Success";
        <?php elseif(isset($_GET['pemesanan'])): ?>
            <?php if($_GET['pemesanan'] == 'success'): ?>
                "Pemesanan berhasil dibuat";
            <?php endif; ?>
            <?php if($_GET['pemesanan'] == 'failed'): ?>
                "Pemesanan gagal dibuat";
            <?php endif; ?>
        <?php elseif(isset($_SESSION['username'])): ?>
            "Berhasil Login";
        <?php else: ?>
            "Selamat Datang, Silakan Login terlebih dahulu";
        <?php endif ?>

        $('#info-modal').modal('show');
        $('#modal-body-content').html(info);
        $('body').css('overflow-y', 'visible');
    }
    </script>
</body>
</html>