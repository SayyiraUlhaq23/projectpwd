<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Velnora Jogja - Sewa Kendaraan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">

<!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand fw-bold">Velnora Jogja</a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#kendaraan">Kendaraan</a></li>
        <li class="nav-item"><a class="nav-link" href="form.php">Booking</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero -->
  <section class="hero container">
   <div class="row align-items-center">
    
    <div class="col-md-6">
      <h1>Sewa <span>Kendaraan Wisata</span> di Jogja</h1>
      <p>Jelajahi Jogja dengan nyaman bersama Velnora Jogja.</p>
      <a href="#kendaraan" class="btn btn-main">Pesan Sekarang</a>
    </div>

    <div class="col-md-6 text-center">
      <img src="assets/vespadepan.jpg" width="120">
    </div>

  </div>
</section>

<!-- Kendaraan -->
  <section id="kendaraan" class="container mb-5">
    <h2 class="text-center mb-4">Pilihan Kendaraan</h2>
    <div class="row g-4">

    <!-- VW -->
    <div class="col-md-4">
      <div class="card shadow text-center">
        <img src="assets/mobilvw.jpg">
        <div class="card-body">
          <h5>VW (Mobil Wisata)</h5>
          <p>Cocok untuk keluarga & rombongan</p>
          <h6 class="text-warning">Rp 500.000 / hari</h6>
          <a href="form.php" class="btn btn-warning">Sewa</a>
        </div>
      </div>
    </div>

    <!-- Vespa -->
    <div class="col-md-4">
      <div class="card shadow text-center">
        <img src="assets/vespa1.png">
        <div class="card-body">
          <h5>Vespa</h5>
          <p>Stylish untuk jalan santai di Jogja</p>
          <h6 class="text-warning">Rp 200.000 / hari</h6>
          <a href="form.php" class="btn btn-warning">Sewa</a>
        </div>
      </div>
    </div>

    <!-- Sepeda -->
    <div class="col-md-4">
      <div class="card shadow text-center">
        <img src="assets/sepeda.jpg">
        <div class="card-body">
          <h5>Sepeda</h5>
          <p>Santai keliling wisata Jogja</p>
          <h6 class="text-warning">Rp 30.000 / hari</h6>
          <a href="form.php" class="btn btn-warning">Sewa</a>
        </div>
      </div>
    </div>

  </div>
</section>

<footer class="bg-dark text-white text-center p-3">
  © 2026 Velnora Jogja
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>