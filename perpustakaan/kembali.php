<?php
include 'koneksi.php';

$id = $_POST['id'];

// ambil data
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM peminjaman WHERE id='$id'"));

$tanggal_pinjam = strtotime($data['tanggal_pinjam']);
$sekarang = time();

$hari = floor(($sekarang - $tanggal_pinjam) / (60*60*24));

$denda = 0;
if($hari > 3){
    $denda = ($hari - 3) * 1000;
}

mysqli_query($conn,"UPDATE peminjaman 
SET status='dikembalikan',
tanggal_kembali=NOW(),
denda='$denda'
WHERE id='$id'");

header("Location: admin.php");
?>