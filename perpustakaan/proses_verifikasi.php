<?php
session_start();
include 'koneksi.php';

$input = $_POST['kode'];
$data = $_SESSION['user_temp'];

if($input == $data['kode']){
mysqli_query($conn,"INSERT INTO users(nama,email,username,password)
VALUES('{$data['nama']}','{$data['email']}','{$data['username']}','{$data['password']}')");

echo "<script>alert('Berhasil');window.location='index.php';</script>";
}else{
echo "<script>alert('Kode salah');window.location='verifikasi.php';</script>";
}
?>