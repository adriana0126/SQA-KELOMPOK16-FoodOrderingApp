<?php
session_start();
include 'koneksi.php';

$user=$_SESSION['user'];
$buku=$_POST['nama_buku'];

// cegah double pinjam
$cek = mysqli_query($conn,"
SELECT * FROM peminjaman 
WHERE user_id='$user' 
AND nama_buku='$buku' 
AND status='dipinjam'
");

if(mysqli_num_rows($cek)==0){
    mysqli_query($conn,"INSERT INTO peminjaman(nama_buku,user_id,status) 
    VALUES('$buku','$user','dipinjam')");
}
?>