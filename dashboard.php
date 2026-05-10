<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard db</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styleAdmin.css">
</head>

<body class="dashboard-page">
<div class="dashboard-wrapper">
    <div class="sidebar">
        <h2>Selamat Datang, <br>
            <span><?php echo $_SESSION['username'];?>!</span>
        </h2>
        <p>Admin Dashboard Sistem</p>
        <h3>Menu</h3>
        <ul class="menu">
            <li>
                <a href="tampil_users.php">
                    <i class="bi bi-people"></i> Data Pengguna
                </a>
            </li>
            <li>
                <a href="tampil_kendaraan.php">
                    <i class="bi bi-car-front"></i> Data Kendaraan Sewa
                </a>
            </li>
            <li>
                <a href="tampil_booking.php">
                    <i class="bi bi-journal-text"></i> Data Booking
                </a></li>
        </ul>    

        <form action="logout.php" method="POST" class="logout-form">
            <button type="submit" class="logout-btn">
                <i class="bi bi-box-arrow-left"></i>  Logout
            </button>
        </form>
    </div>
    <div class="content">
        <div class="header">
            <h1>Dashboard Admin</h1>
            <p>Kelola data sistem penyewaan kendaraan VelnoraJogja</p>
        </div>
        <div class="info-box">
            Silakan pilih menu di sidebar untuk mulai mengelola data.
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>
