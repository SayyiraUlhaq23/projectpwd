<?php
session_start();

if(!isset($_SESSION['admin_username'])){
    header("Location:../proses/login_db.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>db Booking </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/styleAdmin.css">
</head>

<body class="tampil-data">
<div class="container container-box">
    <div class="admin-info">
        <i class="bi bi-shield-lock"></i>
        <span>Anda masuk sebagai <b><?= $_SESSION['admin_username']; ?></b></span>
    </div>
    <div class="topbar">
        <h1><i class="bi bi-journal-check"></i> Data Booking VelnoraJogja</h1>
    </div>

    <!-- Tabel Data -->
    <div class="table-wrapper">
    <table>
        <thead>
        <tr>
            <th>ID Booking</th>
            <th>Nama</th>
            <th>E-mail</th>
            <th>No Hp</th>
            <th>Jenis Kendaraan</th>
            <th>Tanggal Booking</th>
            <th>Lama Sewa</th>
            <th>Total</th>
            <th>Status Booking</th>
            <th>Status Pembayaran</th>
            <th>Aksi</th>
        </tr>
        </thead>
    
    <tbody>
        <?php
        include '../proses/koneksi.php';

        $query = mysqli_query($konek, "SELECT booking.*, 
                kendaraan.jenis_kendaraan, 
                users.nama, 
                users.email, 
                users.no_hp,
                kendaraan.harga_sewa,
                (kendaraan.harga_sewa * booking.lama_sewa) AS total_harga
                FROM booking 
                JOIN users ON booking.id_user = users.id_user
                JOIN kendaraan ON booking.id_kendaraan = kendaraan.id_kendaraan
                ORDER BY booking.id_booking DESC");

        while($data = mysqli_fetch_array($query)){
        ?>
        <tr>

            <td><?= $data['id_booking']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['email']; ?></td>
            <td><?= $data['no_hp']; ?></td>
            <td><?= $data['jenis_kendaraan']; ?></td>
            <td>
                <?= date('d M Y', strtotime($data['tanggal'])); ?>
            </td>
            <td>
                <?= $data['lama_sewa']; ?> Hari
            </td>
            <td>
                Rp <?= number_format($data['total_harga'],0,',','.'); ?>
            </td>
            <!-- STATUS BOOKING -->
            <td>
                <?php if($data['status'] == 'done'){ ?>
                    <span class="status-done">
                        Done
                    </span>

                <?php } else { ?>
                    <span class="status-booking">
                        Booking
                    </span>
                <?php } ?>
            </td>
            <!-- STATUS PEMBAYARAN -->
            <td>
                <?php if($data['status_pembayaran'] == 'Lunas'){ ?>
                    <span class="payment-lunas">
                        Lunas
                    </span>
                <?php } elseif($data['status_pembayaran'] == 'Menunggu Pembayaran'){ ?>
                    <span class="payment-menunggu">
                        Menunggu
                    </span>
                <?php } else { ?>
                    <span class="payment-gagal">
                        Gagal
                    </span>
                <?php } ?>
            </td>

            <!-- AKSI -->
            <td class="action-column">
                <a class="btn-action btn-edit"
                   href="edit_booking.php?id_booking=<?= $data['id_booking']; ?>">
                   Edit
                </a>
                <a class="btn-action btn-delete"
                   href="../proses/delete_booking.php?id_booking=<?= $data['id_booking']; ?>"
                   onclick="return confirm('Yakin ingin menghapus data?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    </div>
    <br>
    <div class="bottom-bar">
        <a href="dashboard.php" class="btn-back">← Kembali ke dashboard</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>