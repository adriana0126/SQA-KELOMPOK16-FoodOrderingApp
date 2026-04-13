<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['user']) || $_SESSION['role']!='admin'){
    header("Location:index.php");
    exit;
}

// 🔍 ambil keyword
$keyword = isset($_GET['cari']) ? $_GET['cari'] : '';

// 📄 pagination
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// base query
$base_query = "
SELECT peminjaman.*, users.nama 
FROM peminjaman 
JOIN users ON peminjaman.user_id=users.id
";

if($keyword != ''){
    $base_query .= " WHERE users.nama LIKE '%$keyword%' 
                     OR peminjaman.nama_buku LIKE '%$keyword%'";
}

// total data
$total = mysqli_query($conn, $base_query);
$total_data = mysqli_num_rows($total);
$total_page = ceil($total_data / $limit);

// query final
$query = $base_query . " ORDER BY peminjaman.id DESC LIMIT $start, $limit";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>

<link rel="icon" href="logo.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background: #f4f6f9; }
.card { border-radius: 15px; }
.table th { background: #343a40; color: white; }
</style>

</head>

<body>

<div class="container mt-5">

<div class="card shadow-lg p-4">

<!-- 🔥 HEADER -->
<h3 class="text-center mb-2">👨‍💼 Admin Panel</h3>

<p class="text-center text-muted mb-1">
Monitoring Peminjaman Buku
</p>

<p class="text-center fw-bold text-primary">
👋 Halo, <?= $_SESSION['nama'] ?>
</p>

<!-- 🔍 SEARCH -->
<form method="GET" class="mb-3">
<div class="input-group">
<input type="text" name="cari" class="form-control" placeholder="Cari nama / buku..." value="<?= $keyword ?>">
<button class="btn btn-primary">Cari</button>
</div>
</form>

<!-- 🔙 KEMBALI -->
<?php if($keyword != ''){ ?>
<a href="admin.php" class="btn btn-secondary mb-3">⬅ Kembali</a>
<?php } ?>

<div class="table-responsive">

<table class="table table-hover text-center align-middle">

<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>Buku</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no=$start+1; while($d=mysqli_fetch_assoc($data)){ ?>
<tr>

<td><?= $no++ ?></td>

<td><b><?= $d['nama'] ?></b></td>

<td><?= $d['nama_buku'] ?></td>

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
<?php if($d['status']=='menunggu'){ ?>
<form action="kembali.php" method="POST">
<input type="hidden" name="id" value="<?= $d['id'] ?>">
<button class="btn btn-success btn-sm">✔ Konfirmasi</button>
</form>
<?php } else { ?>
<span class="text-muted">-</span>
<?php } ?>
</td>

</tr>
<?php } ?>

</tbody>

</table>

</div>

<!-- 📄 PAGINATION -->
<nav>
<ul class="pagination justify-content-center">

<?php for($i=1; $i<=$total_page; $i++){ ?>
<li class="page-item <?= ($i==$page)?'active':'' ?>">
<a class="page-link" href="?page=<?= $i ?>&cari=<?= $keyword ?>">
<?= $i ?>
</a>
</li>
<?php } ?>

</ul>
</nav>

<div class="text-end">
<a href="logout.php" class="btn btn-danger">Logout</a>
</div>

</div>

</div>

</body>
</html>