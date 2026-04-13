<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<link rel="icon" href="logo.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
<div class="card p-4 shadow" style="width:400px;">

<h3 class="text-center mb-3">📝 Register</h3>

<form action="kirim_email.php" method="POST">

<input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
<input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
<input type="text" name="username" class="form-control mb-2" placeholder="Username" required>

<!-- 🔥 PASSWORD -->
<div class="input-group mb-3">
<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

<button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
👁️
</button>
</div>

<button class="btn btn-success w-100">Daftar</button>

</form>

<a href="index.php" class="btn btn-secondary mt-2 w-100">Kembali</a>

</div>
</div>

<script>
function togglePassword() {
    const pass = document.getElementById("password");
    const btn = event.target;

    if(pass.type === "password"){
        pass.type = "text";
        btn.innerHTML = "🙈";
    } else {
        pass.type = "password";
        btn.innerHTML = "👁️";
    }
}
</script>

</body>
</html>