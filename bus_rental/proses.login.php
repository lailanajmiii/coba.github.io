<?php
session_start();
include 'koneksi.php'; // Pastikan file koneksi terhubung ke database dengan benar

// Ambil data dari form
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

// Validasi input
if (!$email || !$password) {
    $_SESSION['error'] = "Email dan password harus diisi!";
    header("Location: login.php");
    exit();
}

// Query database untuk memeriksa pengguna
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($koneksi, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    
    // Validasi password
    if ($password === $user['password']) { // Ganti ke password_verify() jika password di-hash
        // Set session
        $_SESSION['role'] = $user['role'];
        $_SESSION['nama'] = $user['nama']; // Pastikan kolom nama ada di tabel users

        // Redirect berdasarkan role
        if ($user['role'] === 'owner') {
            header("Location: beranda_owner.php");
        } elseif ($user['role'] === 'manager') {
            header("Location: beranda_manager.php");
        } elseif ($user['role'] === 'admin') {
            header("Location: beranda_admin.php");
        }
        exit();
    } else {
        $_SESSION['error'] = "Password salah!";
    }
} else {
    $_SESSION['error'] = "Email tidak ditemukan!";
}

// Redirect ke halaman login jika gagal
header("Location: login.php");
exit();
?>