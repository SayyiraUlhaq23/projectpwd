<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking - Velnora Jogja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            background: #f5f7fa;
        }

        .booking-container {
            max-width: 900px;
            margin: 60px auto;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: none;
        }

        .card-header {
            background-color: #023b39;
            color: white;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            border-radius: 15px 15px 0 0;
            padding: 15px;
        }

        .btn-primary {
            background-color: #023b39;
            border: none;
        }

        .btn-primary:hover {
            background-color: #023b39;
        }

        label {
            font-weight: 500;
        }
    </style>
</head>

<body>
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

<div class="container booking-container">
    <div class="card">
        <div class="card-header">
            Form Booking Velnora Jogja
        </div>

        <div class="card-body">
            <form action="input_booking.php" method="GET">
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Pilih Kendaraan</label>
                    <select name="id_kendaraan" class="form-select" required>
                        <option value="">-- Pilih Kendaraan --</option>
                        <?php
                        include 'koneksi.php';

                        $query = mysqli_query($konek, "SELECT * FROM kendaraan");
                        while($row = mysqli_fetch_assoc($query)) {
                            echo "<option value='" . $row['id_kendaraan'] . "'>" . $row['jenis_kendaraan'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Tanggal Booking</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Lama Sewa (hari)</label>
                    <input type="text" name="lama_sewa" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Metode Pembayaran</label>
                    <select name="metode_pembayaran" class="form-select" required>
                        <option value="">-- Pilih Metode Pembayaran --</option>
                        <option value="Cash">Cash</option>
                        <option value="Transfer">Transfer</option>
                        <option value="E-Wallet">E-Wallet</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>

</body>
<footer class="footer">
  <div class="footer-content">
  © 2026 Velnora Jogja
  </div>
</footer>
</html>