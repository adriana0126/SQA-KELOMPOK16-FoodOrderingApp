<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$kode = rand(1000,9999);

$_SESSION['user_temp'] = [
'nama'=>$nama,
'email'=>$email,
'username'=>$username,
'password'=>$password,
'kode'=>$kode
];

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;

$mail->Username = 'rianaldika0126@gmail.com';
$mail->Password = 'imxj dkkk iadf ceyy';

$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('EMAIL_KAMU@gmail.com', 'Perpustakaan');
$mail->addAddress($email);

$mail->Subject = 'Kode Verifikasi';
$mail->Body = "Kode kamu: $kode";

$mail->send();

echo "<script>alert('Kode dikirim');window.location='verifikasi.php';</script>";
?>