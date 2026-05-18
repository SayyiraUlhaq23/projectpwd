<?php
include '../proses/koneksi.php';
session_start();

if(!isset($_SESSION['id_user'])){
    header("Location: ../proses/login_user.php");
    exit;
}

$id_booking = $_GET['id'];

$query = mysqli_query($konek, "SELECT booking.*, kendaraan.jenis_kendaraan, users.nama
         FROM booking JOIN kendaraan ON booking.id_kendaraan = kendaraan.id_kendaraan
         JOIN users ON booking.id_user = users.id_user WHERE booking.id_booking='$id_booking'");

$data = mysqli_fetch_assoc($query);

if(!$data){
    die("Data booking tidak ditemukan");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">

    <style>
        body{
            display: flex;
            flex-direction: column;
        }

        .invoice-page{
            flex: 1;
        }

        .invoice-page{
            background: linear-gradient(240deg, #fff 25%, #fce9d7 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        .invoice-page::before{
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

        .invoice-card{
            max-width: 650px;
            margin: 120px auto 90px;
            background: #fff;
            border-radius: 24px;
            padding: 40px 35px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
            border: 1px solid rgba(255,122,0,0.08);
            position: relative;
            z-index: 2;
        }

        .invoice-header{
            text-align: center;
            margin-bottom: 35px;
        }

        .invoice-icon{
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

        .invoice-icon i{
            font-size: 52px;
            color: #ff7a00;
        }

        .invoice-header h2{
            font-size: 34px;
            font-weight: 700;
            color: #222;
            margin-bottom: 8px;
        }

        .invoice-header p{
            color: #ff7a00;
            font-size: 15px;
        }

        .invoice-item{
            display: flex;
            justify-content: space-between;
            padding: 14px 0;
            border-bottom: 1px solid #f1f1f1;
            gap: 20px;
        }

        .invoice-label{
            font-weight: 600;
            color: #555;
        }

        .invoice-value{
            color: #222;
            text-align: right;
        }

        .payment-box{
            margin-top: 28px;
            background: #fff7f0;
            border: 1px solid #ffe1c2;
            border-radius: 18px;
            padding: 20px;
        }

        .payment-box h5{
            color: #ff7a00;
            margin-bottom: 12px;
            font-weight: 700;
        }

        .status-payment{
            display: inline-block;
            padding: 8px 16px;
            border-radius: 30px;
            background: #fff3cd;
            color: #856404;
            font-size: 14px;
            font-weight: 600;
        }

        .invoice-total{
            margin-top: 28px;
            padding: 20px 24px;
            border-radius: 22px;
            background: linear-gradient(135deg, #ff7a00, #ff9f43);
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            box-shadow: 0 10px 25px rgba(255,122,0,0.18);
            position: relative;
            overflow: hidden;
        }

        .invoice-total::before{
            content: "";
            position: absolute;
            width: 140px;
            height: 140px;
            background: rgba(255,255,255,0.12);
            border-radius: 50%;
            top: -40px;
            right: -30px;
        }

        .invoice-total h4{
            margin: 0;
            font-size: 15px;
            font-weight: 500;
            opacity: 0.95;
            letter-spacing: 0.3px;
        }

        .invoice-total h3{
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            position: relative;
            z-index: 2;
        }

        .invoice-btn{
            width: 100%;
            height: 56px;
            border: none;
            border-radius: 16px;
            background: #ff7a00;
            color: #fff;
            font-size: 18px;
            font-weight: 600;
            transition: 0.3s;
            margin-top: 28px;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .invoice-btn:hover{
            background: #eb6f00;
            color: white;
        }
    </style>
</head>

<body class="invoice-page">
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
            <a class="nav-link" href="index.php">
            <i class="bi bi-house-door"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#daftar-kendaraan">
            <i class="bi bi-grid-3x3-gap me-1"></i> Katalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">
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


<div class="invoice-card">
    <div class="invoice-header">
        <div class="invoice-icon">
            <i class="bi bi-receipt"></i>
        </div>
        <h2>Invoice Booking</h2>
        <p><i>Detail reservasi kendaraan wisata Anda</i></p>
    </div>

    <div class="invoice-item">
        <div class="invoice-label">Nama</div>
        <div class="invoice-value">
            <?= $data['nama']; ?>
        </div>
    </div>

    <div class="invoice-item">
        <div class="invoice-label">Kendaraan</div>
        <div class="invoice-value">
            <?= $data['jenis_kendaraan']; ?>
        </div>
    </div>

    <div class="invoice-item">
        <div class="invoice-label">Tanggal Booking</div>
        <div class="invoice-value">
            <?= $data['tanggal']; ?>
        </div>
    </div>

    <div class="invoice-item">
        <div class="invoice-label">Lama Sewa</div>
        <div class="invoice-value">
            <?= $data['lama_sewa']; ?> Hari
        </div>
    </div>

    <div class="invoice-item">
        <div class="invoice-label">Metode Pembayaran</div>
        <div class="invoice-value">
            <?= $data['metode_pembayaran']; ?>
        </div>
    </div>

    <div class="invoice-item">
        <div class="invoice-label">Status Pembayaran</div>

        <div class="invoice-value">

            <?php if($data['status_pembayaran']=="Lunas"){ ?>

                <span class="status-payment status-success">
                    <i class="bi bi-check-circle-fill"></i>
                    Lunas
                </span>

            <?php } elseif($data['status_pembayaran']=="Ditolak"){ ?>

                <span class="status-payment status-danger">
                    <i class="bi bi-x-circle-fill"></i>
                    Ditolak
                </span>

            <?php } else { ?>

                <span class="status-payment status-warning">
                    <i class="bi bi-clock-fill"></i>
                    Menunggu Pembayaran
                </span>

            <?php } ?>

        </div>
    </div>

    <div class="invoice-total">
        <h4>Total Pembayaran</h4>
        <h3>
            Rp<?= number_format($data['total_harga']); ?>
        </h3>
    </div>

    <div class="payment-box">
        <h5>Instruksi Pembayaran</h5>
        <?php if($data['metode_pembayaran']=="Transfer"){ ?>
            <p>Transfer ke rekening berikut:</p>
            <p><b>BCA :</b> 123456789</p>
            <p><b>a.n :</b> VelnoraJogja</p>

        <?php } ?>

        <?php if($data['metode_pembayaran']=="E-Wallet"){ ?>
            <p>Pembayaran via DANA / OVO:</p>
            <p><b>08123456789</b></p>
        <?php } ?>

        <?php if($data['metode_pembayaran']=="Cash"){ ?>
            <p>
                Silakan lakukan pembayaran langsung saat pengambilan kendaraan.
            </p>
        <?php } ?>
    </div>

    <a href="mybooking.php" class="invoice-btn">
        Kembali ke Reservasi Saya
    </a>

</div>

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