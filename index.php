<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Velnora Jogja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="home-page">
<!-- Navbar -->
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
    <a class="nav-link" href="index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#daftar-kendaraan">
      <i class="bi bi-grid-3x3-gap me-1"></i> Katalog</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#about">About</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
      Menu
    </a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="form_booking.php">Booking</a></li>
      <li><a class="dropdown-item" href="register.php">Reservasi Saya</a></li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login_user.php">
      <i class="bi bi-person"></i> Login</a>
  </li>
</ul>
</div>
</div>
</nav>

<!-- Hero -->
<section class="hero">
<div class="container text-center">
<div class="left">
      <h1>Selamat Datang di VelronaJogja</h1>
      <p>Jelajahi Jogja dengan Gaya, Nyaman, & Berkesan</p>
      <!-- <p><b>100% Aman, Nyaman, dan Terjangkau di Jogja!</b></p> -->
      <a href="#daftar-kendaraan" class="btn btn-primary btn-dk"><i class="bi bi-grid-3x3-gap me-1"></i>
      Lihat Katalog
      </a>
      <a href="form_booking.php" class="btn btn-primary btn-booking">Booking Now!
        <i class="bi bi-arrow-up-right ms-2"></i>
      </a>
</div>

<div class="right">
  <div class="hero-bg"></div>
  <img src="assets/dashboardfix.png" alt="hero">
</div>
</div>
</section>

<!-- Daftar Kendaraan -->
<section id="daftar-kendaraan" class="py-5">
  <div class="container">
    <div class="section-header">
      <h2>Katalog Kendaraan Sewa</h2>
      <p>Pilih kendaraan terbaik untuk menemani perjalananmu di Jogja</p>
    </div>

    <div class="row g-4">

      <!-- Mobil VW -->
      <div class="col-md-4">
        <div class="card shadow text-center">
          <img src="assets/mobilvw.png" class="card-img-top">
          <div class="card-body">
            <h5>VW (Mobil Wisata)</h5>
            <p>Cocok untuk keluarga & rombongan</p>
            <div class="btn btn-warning">Rp 500.000 / hari</div>
          </div>
        </div>
      </div>

      <!-- Vespa -->
      <div class="col-md-4">
        <div class="card shadow text-center">
          <img src="assets/vespa.png" class="card-img-top">
          <div class="card-body">
            <h5>Vespa</h5>
            <p>Stylish untuk jalan santai di Jogja</p>
            <div class="btn btn-warning">Rp 200.000 / hari</div>
          </div>
        </div>
      </div>

      <!-- Sepeda -->
      <div class="col-md-4">
        <div class="card shadow text-center">
           <img src="assets/sepeda.jpeg" class="card-img-top">
        <div class="card-body">
          <h5>Sepeda</h5>
          <p>Santai keliling wisata Jogja</p>
          <div class="btn btn-warning">Rp 30.000 / hari</div>
        </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- About -->
<section id="about" class="about-section">
    <div class="container">
        <div class="about-card">
          <h2 class="about-title">About VelnoraJogja</h2>
          <p class="about-text">
            VelnoraJogja menyediakan layanan sewa kendaraan wisata seperti 
            <strong>Mobil VW, Vespa, dan Sepeda</strong> untuk pengalaman liburan terbaik di Yogyakarta.
          </p>
          <div class="about-info">
            <div class="info-item">
              <i class="bi bi-telephone-fill"></i>
              <p>0812-3456-7890</p>
            </div>
            <div class="info-item">
              <i class="bi bi-envelope-fill"></i>
              <p>velnorajogjaa@gmail.com</p>
            </div>
            <div class="info-item">
              <i class="bi bi-geo-alt-fill"></i>
              <p>Yogyakarta, Indonesia</p>
            </div>
          </div>

        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
<footer class="footer">
  <div class="footer-content">
  © 2026 Velnora Jogja

  <a href="login_db.php" class="admin-link">
    - Admin
  </a>
  </div>
</footer>
</html>