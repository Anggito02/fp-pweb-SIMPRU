<?php

session_start();

if(!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

include("../helper/admin_getter_process.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-=device-width, initial-scale=1.0">
    <title>SIMPRU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <h1>ADMIN PAGE</h1>

    <h2>LIST PEMESANAN RUANGAN</h2>

    <?php if(isset($_GET['update'])): ?>
        <?php if($_GET['update'] == 'success'): ?>
            <p class="text-success">Data berhasil diperbarui</p>
        <?php else: ?>
            <p class="text-danger">Data gagal diperbarui</p>
        <?php endif; ?>
    <?php endif; ?>
    <table class="container table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Status Dokumen</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu Mulai</th>
                <th scope="col">Waktu Selesai</th>
                <th scope="col">Nama Ruangan</th>
                <th scope="col">Status Pesanan</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                while($row = mysqli_fetch_assoc($resultPesananRuanganUnchecked)):
            ?>
                <?php
                    // Fetch Data
                    $id_pesanan_ruangan = $row['id_pesanan_ruangan'];
                    $username = $row['username'];
                    $status_dokumen = $row['status_dokumen'];
                    $tanggal = substr($row['waktu_mulai_pesan'], 0, 10);
                    $waktu_mulai = substr($row['waktu_mulai_pesan'], -8);
                    $waktu_selesai = substr($row['waktu_selesai_pesan'], -8);
                    $nama_ruangan = $row['nama_ruangan'];
                    $status_pesanan = $row['status_pesanan'];
                    $id_ruangan = $row['id_ruangan'];
                ?>
                <tr>
                    <form action="../helper/admin_update_process.php" method="POST">
                        <td><?= $i ?></td>
                        <input type="text" name="id_pesanan_ruangan" value="<?= $id_pesanan_ruangan ?>" hidden>

                        <td><?= $username ?></td>
                        <!-- Status Dokumen -->
                        <td>
                            <?php if($status_dokumen): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="checkboxDokumen[]" value="true" checked>
                                </div>
                            <?php else: ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="checkboxDokumen[]">
                                </div>
                            <?php endif; ?>
                        </td>
                        <td><?= $tanggal ?></td>
                        <input type="text" name="tanggal" id="tanggal" value="<?= $tanggal ?>" hidden>

                        <td><?= $waktu_mulai ?></td>
                        <input type="text" name="waktu_mulai" id="waktu_mulai" value="<?= $waktu_mulai ?>" hidden>

                        <td><?= $waktu_selesai ?></td>
                        <input type="text" name="waktu_selesai" id="waktu_selesai" value="<?= $waktu_selesai ?>" hidden>

                        <td><?= $nama_ruangan ?></td>
                        <td>
                            <select id="status_pesanan" name="status_pesanan" class="form-select" required>
                                <option value="Pengecekan Dokumen">Pengecekan Dokumen</option>
                                <option value="Disetujui">Disetujui</option>
                                <option value="Gagal">Gagal</option>
                            </select>
                        </td>

                        <input type="text" name="id_ruangan" id="id_ruangan" value="<?= $id_ruangan ?>" hidden>

                        <td><button type="submit" class="btn btn-primary" name="submit">UPDATE ROW</button></td>
                    </form>
                </tr>
            <?php
                $i++;
                endwhile;
            ?>
        </tbody>
    </table>

    <form action="../helper/logout_process.php" method="post">
        <button type="submit" class="my-2 btn border border-primary text-primary">LOGOUT</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>