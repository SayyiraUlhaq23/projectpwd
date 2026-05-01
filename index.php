<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Velnora Jogja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand fw-bold">Velnora Jogja</a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav"></button>

    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#kendaraan">Kendaraan</a></li>
        <li class="nav-item"><a class="nav-link" href="form_booking.php">Booking</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="login_db.php">Admin Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero -->
<section class="hero">
  <img src="assets/dashboardfix.png" class="hero.img">
</div>
</section>

<!-- Kendaraan -->
<section id="kendaraan" class="py-5">
  <div class="container">
    <div class="row g-4">

      <!-- VW -->
      <div class="col-md-4">
        <div class="card shadow text-center">
          <img src="assets/mobilvwfix.png" class="card-img-top">
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
          <img src="assets/vespa.jpg" class="card-img-top">
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
           <img src="assets/sepedafix.jpeg" class="card-img-top">
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

            <h2 class="about-title">Tentang Velnora</h2>

            <p class="about-text">
                Velnora Jogja menyediakan layanan sewa kendaraan wisata seperti 
                <strong>VW, Vespa, dan Sepeda</strong> untuk pengalaman liburan terbaik di Yogyakarta.
            </p>

            <div class="about-info">
                <div class="info-item">
                    <span>📞</span>
                    <p>0812-3456-7890</p>
                </div>

                <div class="info-item">
                    <span>📧</span>
                    <p>velnora@gmail.com</p>
                </div>

                <div class="info-item">
                    <span>📍</span>
                    <p>Yogyakarta, Indonesia</p>
                </div>
            </div>

        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer class="footer">
  © 2026 Velnora Jogja
</footer>
</html>