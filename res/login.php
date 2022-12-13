<?php

session_start();

// jika sudah punya session, maka autologin
if( isset($_SESSION['username']) ) {
    header("Location: ./home.php");
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
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <h1>LOGIN PAGE</h1>

    <form class="d-flex flex-column justify-content-center" action="../helper/login_process.php" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    <a href="../index.php"><button type="button" class="my-2 btn border border-primary text-primary">Back To Index</button></a>

    <?php if( isset($_GET['auth']) ): ?>
        <p class="p-2 my-2 text-danger">Username atau Password Salah !</p>
    <?php elseif( isset($_GET['error']) ): ?>
        <p class="p-2 my-2 text-danger">Server Error. Please Try Again !</p>
    <?php endif ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>