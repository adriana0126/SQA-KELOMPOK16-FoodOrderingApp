<?php
include 'koneksi.php';

$id = $_POST['id'];

mysqli_query($conn,"UPDATE peminjaman 
SET status='menunggu' 
WHERE id='$id'");

header("Location: riwayat.php");
?>