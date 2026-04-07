<?php
session_start();
include 'koneksi.php';

$user=$_SESSION['user'];
$data=mysqli_query($conn,"SELECT * FROM peminjaman WHERE user_id='$user'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Riwayat</title>

<link rel="icon" href="logo.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(to right, #eef2f3, #dfe9f3);
}
.card {
    border-radius: 20px;
}
.table th {
    background: #343a40;
    color: white;
}
</style>

</head>

<body>

<div class="container mt-5">

<div class="card shadow-lg p-4">

<h3 class="text-center">📊 Riwayat Peminjaman</h3>
<p class="text-center text-muted">Lihat status buku kamu</p>

<div class="table-responsive">

<table class="table table-hover text-center align-middle">

<thead>
<tr>
<th>Buku</th>
<th>Status</th>
<th>Denda</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php while($d=mysqli_fetch_assoc($data)){ ?>
<tr>

<td><b><?= $d['nama_buku'] ?></b></td>

<td>
<?php if($d['status']=='dipinjam'){ ?>
<span class="badge bg-warning text-dark">Dipinjam</span>

<?php } elseif($d['status']=='menunggu'){ ?>
<span class="badge bg-info text-dark">Menunggu</span>

<?php } else { ?>
<span class="badge bg-success">Dikembalikan</span>
<?php } ?>
</td>

<td>
<?= $d['denda'] > 0 ? "<span class='text-danger fw-bold'>Rp ".$d['denda']."</span>" : "-" ?>
</td>

<td>
<?php if($d['status']=='dipinjam'){ ?>
<form action="request_kembali.php" method="POST">
<input type="hidden" name="id" value="<?= $d['id'] ?>">
<button class="btn btn-warning btn-sm">Ajukan</button>
</form>

<?php } elseif($d['status']=='menunggu'){ ?>
<span class="text-primary fw-bold">⏳ Diproses</span>

<?php } else { ?>
<span class="text-success fw-bold">✔ Selesai</span>
<?php } ?>
</td>

</tr>
<?php } ?>

</tbody>

</table>

</div>

<div class="text-center mt-3">
<a href="dashboard.php" class="btn btn-secondary">⬅ Kembali</a>
</div>

</div>

</div>

</body>
</html>