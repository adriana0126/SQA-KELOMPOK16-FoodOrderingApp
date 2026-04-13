<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Email</title>

    <link rel="icon" href="logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 350px;">
        <h3 class="text-center mb-3">🔐 Verifikasi Email</h3>

        <!-- INI BAGIAN PENTING -->
        <form action="proses_verifikasi.php" method="POST">

            <input type="text" name="kode" 
                   class="form-control mb-3" 
                   placeholder="Masukkan kode verifikasi" 
                   required>

            <button class="btn btn-primary w-100">Verifikasi</button>

        </form>

    </div>
</div>

</body>
</html>