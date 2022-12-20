<?php

session_start();

// jika username tidak ada -> suruh login
if(!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

$username = $_SESSION['username'];

include("../helper/list_pesanan_process.php");

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
    <link rel="stylesheet" href="../css/list_pesanan.css">
</head>
<body>

    <h1>Halo, <?= $username; ?></h1>

    <h2>LIST PEMESANAN RUANGAN ANDA</h2>

    <table class="container table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Ruangan</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Waktu Mulai</th>
                <th scope="col">Waktu Selesai</th>
                <th scope="col">Status Dokumen</th>
                <th scope="col">Status Pemesanan</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i=1;
                while($row = mysqli_fetch_assoc($resultDataPesananUser)):
            ?>
                <?php
                // Fetch data
                $status_pesanan = $row['status_pesanan'];
                $status_dokumen = $row['status_dokumen'];
                $nama_ruangan = $row['nama_ruangan'];
                $tanggal = substr($row['waktu_mulai_pesan'], 0, 10);
                $waktu_mulai = substr($row['waktu_mulai_pesan'], -8);
                $waktu_selesai = substr($row['waktu_selesai_pesan'], -8);
                $status_dokumen = $row['status_dokumen'];
                $status_pesanan = $row['status_pesanan'];
                ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $nama_ruangan; ?></td>
                    <td><?= $tanggal; ?></td>
                    <td><?= $waktu_mulai; ?></td>
                    <td><?= $waktu_selesai; ?></td>
                    <td>
                        <?php if($status_dokumen == 1): ?>
                            Sudah
                        <?php else: ?>
                            Belum Diberikan
                        <?php endif; ?>
                    </td>
                    <td><?= $status_pesanan ?></td>
                </tr>
            <?php
                $i++;
                endwhile; 
            ?>
        </tbody>
    </table>

    <a href="../index.php" class="btn btn-primary m-2">Kembali ke Beranda</a>

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