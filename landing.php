<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="landing-page">
<nav class="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <!-- <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
      VelnoraJogja
    </a>

<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link" href="#">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#daftar-kendaraan">Katalog Kendaraan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="form_booking.php">Booking</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#about">About</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login_db.php">Admin Login</a>
  </li>
</ul>
  </div>
</nav>

<div class="wrapper">
<div class="card-box text-center">
<?php 
  include 'koneksi.php';

  $nama = $_GET['nama'] ?? '';
  $email = $_GET['email'] ?? '';
  $no_hp = $_GET['no_hp'] ?? '';
  $id_kendaraan = $_GET['id_kendaraan'] ?? '';
  $tanggal = $_GET['tanggal'] ?? '';
  $lama_sewa = $_GET['lama_sewa'] ?? '';
  $metode_pembayaran = $_GET['metode_pembayaran'] ?? '';
  $id_booking = $_GET['id_booking'] ?? '';

  if (!isset($_GET['id_booking'])) {
    header("Location: form_booking.php");
    exit;
  }

  $query = mysqli_query($konek, "SELECT jenis_kendaraan, harga_sewa, gambar FROM kendaraan WHERE id_kendaraan = '$id_kendaraan'");
  $data = mysqli_fetch_assoc($query);

  $jenis = $data['jenis_kendaraan'];
  $harga = $data['harga_sewa'];
  $gambar = $data['gambar'];

  $total = (int)$lama_sewa * (int)$harga;
  ?>
</div>

<div class="card-box text-center">
    <i class="bi bi-check-circle-fill text-success"></i>
    <div class="desc">Booking Success!</div>
    
    <img src="assets/images/<?= htmlspecialchars($gambar) ?>" 
     onerror="this.src='assets/images/default.png'"
     style="width:200px; border-radius:12px; margin-top:10px;">

    <div class="mt-3">
        <h5 class="fw-bold"><?= $jenis ?></h5>
        <small class="text-muted"><?= $lama_sewa ?> Hari</small>
    </div>

    <div class="divider"></div>
    <div class="row-item">
        <span>Mulai Sewa</span>
        <span><?= $tanggal ?></span>
    </div>

    <div class="row-item">
        <span>Metode Pembayaran</span>
        <span><?= $metode_pembayaran ?></span>
    </div>

    <div class="divider"></div>
    <div class="row-item">
        <span>ID Booking</span>
        <span><?= $id_booking ?></span>
    </div>

    <div class="row-item">
        <span>Total</span>
        <strong class="text-success">
            Rp <?= number_format($total,0,',','.') ?></strong>
    </div>

    <a href="index.php" class="btn btn-primary w-100 mt-3">Kembali ke Beranda</a>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>