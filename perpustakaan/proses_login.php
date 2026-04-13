<?php
session_start();
include 'koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];

$q = mysqli_query($conn,"SELECT * FROM users WHERE username='$user' AND password='$pass'");
$data = mysqli_fetch_assoc($q);

if($data){
    $_SESSION['user'] = $data['id'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role'];

    // 🔥 CEK ROLE
    if($data['role'] == 'admin'){
        header("Location: admin.php");
    } else {
        header("Location: dashboard.php");
    }

}else{
    echo "<script>alert('Login gagal');window.location='index.php';</script>";
}
?>