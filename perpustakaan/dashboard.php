<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link rel="icon" href="logo.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">
<div class="card p-4 shadow">

<h3>📚 Dashboard</h3>
<p>Login sebagai: <b><?= $_SESSION['nama'] ?></b></p>

<ul class="list-group">

<li class="list-group-item" data-bs-toggle="modal" data-bs-target="#b1">
📖 Laskar Pelangi
</li>

<li class="list-group-item" data-bs-toggle="modal" data-bs-target="#b2">
📖 Bumi Manusia
</li>

<li class="list-group-item" data-bs-toggle="modal" data-bs-target="#b3">
📖 Atomic Habits
</li>

</ul>

<a href="riwayat.php" class="btn btn-info mt-3">📊 Riwayat</a>
<a href="logout.php" class="btn btn-danger mt-3">Logout</a>

</div>
</div>

<!-- MODAL 1 -->
<div class="modal fade" id="b1">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<h5>Laskar Pelangi</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
<p><b>Penulis:</b> Andrea Hirata</p>
<p>Novel tentang perjuangan anak-anak Belitung.</p>
</div>

<div class="modal-footer">
<button class="btn btn-success" onclick="pinjam('Laskar Pelangi')">Pinjam</button>
<button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
</div>

</div>
</div>
</div>

<!-- MODAL 2 -->
<div class="modal fade" id="b2">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<h5>Bumi Manusia</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
<p><b>Penulis:</b> Pramoedya Ananta Toer</p>
<p>Kisah perjuangan di masa kolonial.</p>
</div>

<div class="modal-footer">
<button class="btn btn-success" onclick="pinjam('Bumi Manusia')">Pinjam</button>
<button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
</div>

</div>
</div>
</div>

<!-- MODAL 3 -->
<div class="modal fade" id="b3">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<h5>Atomic Habits</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
<p><b>Penulis:</b> James Clear</p>
<p>Buku tentang membangun kebiasaan kecil.</p>
</div>

<div class="modal-footer">
<button class="btn btn-success" onclick="pinjam('Atomic Habits')">Pinjam</button>
<button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
</div>

</div>
</div>
</div>
<script>
function pinjam(nama){
    // disable klik berulang
    if(window.sudahKlik) return;
    window.sudahKlik = true;

    fetch('pinjam.php',{
        method:'POST',
        headers:{'Content-Type':'application/x-www-form-urlencoded'},
        body:'nama_buku='+nama
    })
    .then(()=>{
        alert('Berhasil pinjam: '+nama);
        location.reload(); // refresh biar aman
    });
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>