<?php
// Konfigurasi database
$host = "localhost";  // Alamat server database (biasanya localhost)
$user = "root";       // Username untuk login ke MySQL
$pass = "";           // Password untuk login ke MySQL
$db   = "bus_rental";  // Nama database yang akan digunakan

// Membuat koneksi ke MySQL
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
