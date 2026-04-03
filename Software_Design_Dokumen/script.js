// =====================
// NAVIGASI
// =====================
function goRegister() {
    window.location.href = "register.html";
}

function cancelRegister() {
    window.location.href = "index.html";
}

// =====================
// REGISTER
// =====================
let verificationCode = "";

document.addEventListener("DOMContentLoaded", () => {

    // REGISTER FORM
    const registerForm = document.getElementById("registerForm");
    if (registerForm) {
        registerForm.addEventListener("submit", function(e) {
            e.preventDefault();

            // Ambil data input
            const user = {
                nama: document.getElementById("nama").value,
                email: document.getElementById("email").value,
                alamat: document.getElementById("alamat").value,
                hp: document.getElementById("hp").value,
                username: document.getElementById("regUsername").value,
                password: document.getElementById("regPassword").value
            };

            // Validasi sederhana
            if (!user.username || !user.password) {
                alert("Data tidak boleh kosong!");
                return;
            }

            // Simulasi kirim email (kode verifikasi)
            verificationCode = "1234";
            alert("Kode verifikasi: " + verificationCode);

            // Tampilkan form verifikasi
            document.getElementById("verification").style.display = "block";

            // Simpan sementara
            localStorage.setItem("tempUser", JSON.stringify(user));
        });
    }

    // LOGIN FORM
    const loginForm = document.getElementById("loginForm");
    if (loginForm) {
        loginForm.addEventListener("submit", function(e) {
            e.preventDefault();

            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            const savedUser = JSON.parse(localStorage.getItem("user"));

            if (savedUser && username === savedUser.username && password === savedUser.password) {
                window.location.href = "dashboard.html";
            } else {
                alert("Login gagal!");
            }
        });
    }

});

// =====================
// VERIFIKASI
// =====================
function verify() {
    const kode = document.getElementById("kode").value;

    if (kode === verificationCode) {
        const user = JSON.parse(localStorage.getItem("tempUser"));

        // Simpan user permanen
        localStorage.setItem("user", JSON.stringify(user));

        alert("Registrasi berhasil!");
        window.location.href = "index.html";
    } else {
        alert("Kode salah!");
    }
}

// =====================
// LOGOUT
// =====================
function logout() {
    alert("Logout berhasil");
    window.location.href = "index.html";
}