<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPRU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <h1>SIGN UP PAGE</h1>

    <?php if( isset($_GET['register'])): ?>
        <div id="usernameHelp" class="form-text text-danger">Akun Gagal Dibuat. Coba Lagi !</div>
    <?php endif; ?>

    <form action="../helper/register_process.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="namaDepan" class="form-label">Nama Depan</label>
            <input type="text" class="form-control" id="namaDepan" name="namaDepan" aria-describedby="usernameHelp" required>
        </div>
        <div class="mb-3">
            <label for="namaBelakang" class="form-label">Nama Belakang</label>
            <input type="text" class="form-control" id="namaBelakang" name="namaBelakang" aria-describedby="usernameHelp" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" required>
            <?php if( isset($_GET['username'])): ?>
                <div id="usernameHelp" class="form-text text-danger">Username tidak tersedia !</div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <?php if( isset($_GET['retype'])): ?>
                <div id="retypeHelp" class="form-text text-danger">Password tidak sama!</div>
            <?php endif; ?>
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="retype_password" class="form-label">Re-Type Password</label>
            <input type="password" class="form-control" id="retype_password" name="retype_password" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="noTelp" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="noTelp" name="noTelp" required>
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" required>
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select id="jabatan" name="jabatan" class="form-select" required>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="dosen">Dosen</option>
                <option value="staf">Staf</option>
                <option value="lainnya">Civitas Akademik Lainnya</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Tanda Pengenal</label>
            <input type="file" class="form-control" id="foto"name="foto" aria-describedby="fotoHelp" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>