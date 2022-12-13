<?php

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
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <h1>HOME PAGE</h1>

    <a href="./list_ruangan.php"><button type="button" class="my-2 btn btn-success">PEMESANAN RUANGAN</button></a>
    <a href="./list_kendaraan.php"><button type="button" class="my-2 btn btn-success">PEMESANAN KENDARAAN</button></a>

    <form class="my-3" action="../helper/logout_process.php" method="post">
        <button type="submit" class="my-2 btn border border-primary text-primary">LOGOUT</button>
    </form>

    <?php if(isset($_GET['pemesanan'])): ?>
        <?php if($_GET['pemesanan'] == 'success'): ?>
            <p class="p-2 bg-light text-success border border-success rounded">Pemesanan berhasil dibuat !</p>
        <?php endif; ?>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>