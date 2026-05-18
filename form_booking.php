<?php
session_start();
include 'proses/koneksi.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: proses/login_user.php");
    exit;
}

$id_user = $_SESSION['id_user'];

$query_user = mysqli_query($konek, "SELECT * FROM users WHERE id_user='$id_user'");
$data_user = mysqli_fetch_assoc($query_user);

if (!$data_user) {
    die("User tidak ditemukan di database");
}
?>

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
        .booking-page{
            background: linear-gradient(240deg, #fff 25%, #fce9d7 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        .booking-page::before{
            content: "";
            width: 450px;
            height: 450px;
            background: rgba(255,122,0,0.15);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            filter: blur(90px);
            z-index: 1;
        }

        .booking-card{
            max-width: 570px;
            margin: 70px auto;
            background: #fff;
            border-radius: 24px;
            padding: 40px 35px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
            position: relative;
            z-index: 2;
        }
        
        .booking-card .card-body{
            padding: 0;
            background: transparent;
            border: none;
        }
        
        .form-booking-header{
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
        }
    
        .booking-icon{
            width: 95px;
            height: 95px;
            background: #fff3e8;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: -85px auto 18px;
            box-shadow: 0 10px 25px rgba(255,122,0,0.12);
        }

        .booking-icon i{
            font-size: 52px;
            color: #ff7a00;
        }

        .from-booking-header h2{
            font-size: 34px;
            font-weight: 700;
            color: #222;
            margin-bottom: 8px;
        }

        .form-booking-header p i{
            color: #ff7a00;
            font-size: 15px;
            margin-bottom: 0;
        }

        .booking-form{
            margin-top: 25px;
        }

        .booking-form label{
            font-weight: 600;
            margin-bottom: 8px;
            color: #444;
        }

        .booking-input{
            height: 50px;
            border-radius: 16px;
            border: 1px solid #eee;
            background: #fff;
            box-shadow: none !important;
            padding: 0 16px;
            transition: 0.3s;
        }

        .booking-input:focus{
            border-color: #ff7a00;
            box-shadow: 0 0 0 4px rgba(255,122,0,0.12) !important;
        }
        
        .form-select{
            height: 50px;
            border-radius: 16px;
            border: 1px solid #eee;
            background-color: #fff;
            box-shadow: none !important;
            padding-left: 16px;
            transition: 0.3s;
        }
        
        .form-select:focus{
            border-color: #ff7a00;
            box-shadow: 0 0 0 4px rgba(255,122,0,0.12) !important;
        }
        
        .booking-input[readonly]{
            background: #fafafa;
            color: #777;
        }

        .booking-btn{
            width: 100%;
            height: 56px;
            border: none;
            border-radius: 16px;
            background: #ff7a00;
            color: #fff;
            font-size: 18px;
            font-weight: 600;
            transition: 0.3s;
            margin-top: 10px;
        }

        .booking-btn:hover{
            background: #eb6f00;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255,122,0,0.3);
        }
    </style>
</head>

<body class="booking-page">
    <!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="user/index.php">
      <!-- <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
      VelnoraJogja
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-lg-center">
          <li class="nav-item">
            <a class="nav-link" href="user/index.php">
            <i class="bi bi-house-door"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user/index.php#daftar-kendaraan">
            <i class="bi bi-grid-3x3-gap me-1"></i> Katalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user/index.php#about">
            <i class="bi bi-info-circle"></i> About</a>
          </li>

        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'user'){ ?>
          <li class="nav-item dropdown">
            <a class="nav-link user-session" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i>  
                <?= $_SESSION['user_username']; ?>
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

<div class="container">
    <div class="booking-card">
        <div class="form-booking-header">
            <div class="booking-icon">
                <i class="bi bi-journal-check me-2"></i>
            </div>
            <h2>Form Booking Kendaraan Sewa VelnoraJogja</h2>
            <p><i>Lengkapi data booking kendaraan wisata Anda.</i></p>
        </div>
        <div class="card-body">
            <form action="proses/input_booking.php" method="POST">
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" class="form-control booking-input" value="<?= $data_user['nama']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label>E-mail</label>
                    <input type="text" class="form-control booking-input" value="<?= $data_user['email']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label>No. HP</label>
                    <input type="text" name="no_hp" class="form-control booking-input" placeholder="Masukkan No. Handphone" 
                        value="<?= $data_user['no_hp']; ?>">
                </div>
                <div class="mb-3">
                    <label>Pilih Kendaraan</label>
                    <select name="id_kendaraan" class="form-select" required>
                        <option value="">-- Pilih Kendaraan --</option>
                        <?php
                        include 'proses/koneksi.php';

                        $query = mysqli_query($konek, "SELECT * FROM kendaraan");
                        while($row = mysqli_fetch_assoc($query)) {
                            echo "<option value='" . $row['id_kendaraan'] . "'>" . $row['jenis_kendaraan'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Tanggal Booking</label>
                    <input type="date" name="tanggal" class="form-control booking-input" required>
                </div>
                <div class="mb-3">
                    <label>Lama Sewa (hari)</label>
                    <input type="text" name="lama_sewa" class="form-control booking-input" min="1" placeholder="Masukkan berapa lama sewa (angka)" required>
                </div>

                <div class="mb-3">
                    <label>Metode Pembayaran</label>
                    <select name="metode_pembayaran" class="form-select" required>
                        <option value="">-- Pilih Metode Pembayaran --</option>
                        <option value="Cash">Cash</option>
                        <option value="Transfer">Transfer</option>
                        <option value="E-Wallet">E-Wallet</option>
                    </select>
                    <small style="color:#777;">
                        <i class="bi bi-shield-check"></i>
                        Invoice dan instruksi pembayaran akan ditampilkan setelah booking berhasil.
                    </small>
                </div>

                <button type="submit" class="booking-btn">
                    Booking Now
                </button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer class="footer">
  <div class="footer-content">
  © 2026 Velnora Jogja
  <a href="proses/login_db.php" class="admin-link">
    - Admin
  </a>
  </div>
</footer>
</html>