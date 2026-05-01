<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kendaraan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a href="index.php" class="navbar-brand">← Kembali</a>
  </div>
</nav>

<section class="container py-5">
  <h2 class="text-center mb-4">Pilihan Kendaraan</h2>
  <div class="row g-4">

    <div class="col-md-4">
      <div class="card text-center shadow">
        <img src="assets/mobilvw.jpg">
        <div class="card-body">
          <h5>VW</h5>
          <p>Cocok untuk keluarga</p>
          <h6 class="text-warning">Rp 500.000</h6>
          <a href="form_booking.php" class="btn btn-warning">Sewa</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center shadow">
        <img src="assets/vespa1.png">
        <div class="card-body">
          <h5>Vespa</h5>
          <p>Stylish</p>
          <h6 class="text-warning">Rp 200.000</h6>
          <a href="form_booking.php" class="btn btn-warning">Sewa</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card text-center shadow">
        <img src="assets/sepeda.jpg">
        <div class="card-body">
          <h5>Sepeda</h5>
          <p>Santai</p>
          <h6 class="text-warning">Rp 30.000</h6>
          <a href="form_booking.php" class="btn btn-warning">Sewa</a>
        </div>
      </div>
    </div>

  </div>
</section>

</body>
</html>