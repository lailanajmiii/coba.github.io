<?php
session_start();

// Redirect jika tidak login atau bukan owner
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'owner') {
    header("Location: login.php");
    exit();
}

// Ambil informasi dari session
$role = $_SESSION['role'];
$nama = $_SESSION['nama'] ?? "Pengguna";
header("Location: beranda_owner.php");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beranda Bus Ceria</title>
    <link href="style.beranda.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
    <img src="logo_pt.png" alt="Bus Ceria Logo" style="max-width: 100%; height: auto" />
        <div class="container-fluid">
            <a href="beranda_owner.php" class="active"><i class="fas fa-tachometer-alt"></i> Beranda</a>
            <a href="stat&pem_owner.php"><i class="fas fa-chart-pie"></i> Statistik</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </nav>

    <!-- Header -->
    <div class="header">
        <h3 class="dashboard-title">Beranda</h3>
        <div class="profile">
            <img src="https://i.pinimg.com/474x/21/69/3a/21693a2f2456b3fafa0fa910551b527d.jpg" alt="Profile Picture" />
            <span><?= htmlspecialchars($nama) ?> (<?= htmlspecialchars($role) ?>)</span>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
     <!-- Bagian Kiri -->
        <div class="text-section">
        <h1>Sewa Bus Area Yogyakarta</h1>
        <p>DAPATKAN PERJALANAN YANG LEBIH AMAN DENGAN BUSCERIA</p>
        <p>Sign in as a Guest, Sign out as a customer</p>
        </div>

    <!-- Bagian Kanan -->
    <div class="image-section">
        <img src="welcoming.png" alt="welcoming" position="right" />
      </div>
    </div>

      <!-- Footer -->
      <footer class="footer">&copy; 2024 Bus Ceria. All rights reserved.</footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
