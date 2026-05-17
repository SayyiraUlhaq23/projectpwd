<?php
session_start();
include '../proses/koneksi.php';

if (!isset($_SESSION['id_user']) || $_SESSION['status'] != 'login') {
    header("Location:../proses/login_user.php");
    exit;
}

$id_user = $_SESSION['id_user'] ?? null;

$query = mysqli_query($konek, "SELECT booking.*, 
        kendaraan.jenis_kendaraan, kendaraan.gambar FROM booking 
        JOIN kendaraan ON booking.id_kendaraan = kendaraan.id_kendaraan 
        WHERE booking.id_user = '$id_user' 
        ORDER BY booking.id_booking DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="mybooking-page">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <!-- <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
      VelnoraJogja
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-lg-center">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
            <i class="bi bi-house-door"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#daftar-kendaraan">
            <i class="bi bi-grid-3x3-gap me-1"></i> Katalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#about">
            <i class="bi bi-info-circle"></i> About</a>
          </li>

        <?php if(isset($_SESSION['status'])){ ?>
          <li class="nav-item dropdown">
            <a class="nav-link user-session" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i>  
                <?= $_SESSION['username']; ?>
                <i class="bi bi-chevron-down dropdown-custom"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item dropdown-menu-custom" href="mybooking.php">
                  <i class="bi bi-journal-text"></i> Reservasi Saya
                </a>
              </li>
              <li>
                <a class="dropdown-item dropdown-menu-custom text-danger" href="../proses/logout.php">
                  <i class="bi bi-box-arrow-in-right"></i> Logout
                </a>
              </li>
            </ul>
          </li>
        <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link nav-login" href="../proses/login_user.php">
              <i class="bi bi-person"></i> Login</a>
            </li>
        <?php } ?>
        </ul>
      </div>
    </div>
</nav>

<main>
<div class="container py-5">
    <div class="booking-header mb-4">
    <div>
      <h2 class="booking-title">
        <i class="bi bi-journal-text"></i>
        Daftar Reservasi Anda
      </h2>
      <p class="booking-subtitle">
        Lihat semua aktivitas pemesanan kendaraan Anda.
      </p>
    </div>
      <a href="index.php" class="text-decoration-none text-warning">
        <i class="bi bi-arrow-left-circle-fill"></i> Kembali ke Beranda
      </a>
    </div>
    <div class="booking-wrapper">
    <div class="booking-content">

    <?php if (mysqli_num_rows($query) > 0) { ?>
    <div class="table-responsive">
        <table class="table booking-table align-middle">
        <thead>
        <tr>
          <th>No</th>
          <th>Kendaraan</th>
          <th>Tanggal</th>
          <th>Lama Sewa</th>
          <th>Pembayaran</th>
          <th>Total</th>
          <th>Status</th>
          <th>Pembayaran</th>
        </tr>
        </thead>

        <tbody>
        <?php
          $no = 1;
          while($data = mysqli_fetch_array($query)) {
        ?>
        
        <tr>
          <td><?= $no++; ?></td>
          <td class="fw-semibold"><?= $data['jenis_kendaraan']; ?></td>
          <td><?= $data['tanggal']; ?></td>
          <td><?= $data['lama_sewa']; ?> Hari</td>
          <td><?= $data['metode_pembayaran']; ?></td>
          <td>Rp <?= number_format($data['total_harga']); ?></td>
          <td>
          <?php if ($data['status'] == 'done') { ?>
              <span class="status-done">Done</span>
          <?php } else { ?>
              <span class="status-booking">Booking</span>
          <?php } ?>
          </td>
          
          <td>
          <?php if ($data['status_pembayaran'] == 'Lunas') { ?>
              <span class="payment-lunas">
                Lunas
              </span>
          <?php } elseif ($data['status_pembayaran'] == 'Menunggu Pembayaran') { ?>
              <span class="payment-menunggu">
                Menunggu
              </span>
          <?php } else { ?>
              <span class="payment-gagal">
                Gagal
              </span>
          <?php } ?>
          </td>
        </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
    <?php } else { ?>
        <div class="alert alert-warning text-center mt-3 empty-reservasi">
          Belum ada data reservasi. Silahkan
          <a href="../form_booking.php">Booking Now!</a>
        </div>
    <?php } ?>
  </div>
</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
<footer class="footer">
  <div class="footer-content">
  © 2026 Velnora Jogja
  <a href="../proses/login_db.php" class="admin-link">
    - Admin
  </a>
  </div>
</footer>
</body>
</html>