<?php
session_start();
include '../proses/koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location:../proses/login_db.php");
    exit;
}

$id_booking = $_GET['id_booking'];

$query = mysqli_query($konek, "SELECT booking. *, users.nama, users.email, users.no_hp
        FROM booking JOIN users ON booking.id_user = users.id_user
        WHERE booking.id_booking = '$id_booking'");

$data = mysqli_fetch_array($query);

if (!$data) {
    die("Data booking tidak ditemukan");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Booking</title>
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
        <h1><i class="bi bi-pencil-square"></i> Update Data Booking Kendaraan</h1>
    </div>
    
    <div class="form-card">
    <form action="../proses/update_booking.php" method="POST">
        <div class="form-group-admin">
            <label for="id_booking">ID booking</label>
            <input type="text" name = "id_booking" class="admin-input"
            value="<?= $data['id_booking']; ?>" readonly><br>
        </div>

        <div class="form-group-admin">
            <label for="nama">Nama </label>
            <input type="text" name="nama" class="admin-input"
            value="<?= $data['nama']; ?>">
        </div>

        <div class="form-group-admin">
            <label for="email">E-mail </label>
            <input type="text" name="email" class="admin-input"
            value="<?= $data['email']; ?>">
        </div>

        <div class="form-group-admin">
            <label for="no_hp">No HP </label>
            <input type="text" name="no_hp" class="admin-input"
            value="<?= $data['no_hp']; ?>">
        </div>

        <div class="form-group-admin">
            <label class="label">Pilih Jenis Kendaraan</label>
            <select name="id_kendaraan" id="id_kendaraan" class="admin-input" required>
                <?php
                $kendaraan = mysqli_query($konek, "SELECT * FROM kendaraan");
                while($k = mysqli_fetch_array($kendaraan)){
                ?>
                <option value="<?= $k['id_kendaraan']; ?>"
                    <?= ($data['id_kendaraan'] == $k['id_kendaraan']) ? 'selected' : ''; ?>>
                    <?= $k['jenis_kendaraan']; ?>
                </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group-admin">
            <label for="tanggal">Tanggal Booking</label>
            <input type="date" name="tanggal" id="tanggal" class="admin-input"
            value="<?= $data['tanggal']; ?>">
        </div>

        <div class="form-group-admin">
            <label for="lama_sewa">Lama Sewa</label>
            <input type="text" name="lama_sewa" class="admin-input"
            value="<?= $data['lama_sewa']; ?>">
        </div>

        <div class="form-group-admin">
            <label for="status">Status</label>
            <select name="status" id="status" class="admin-input" required>
                <option value="booking"
                    <?= ($data['status'] == 'booking') ? 'selected' : ''; ?>> Booking
                </option>
                <option value="done"
                    <?= ($data['status'] == 'done') ? 'selected' : ''; ?>> Done
                </option>
            </select>
        </div>

        <div class="form-group-admin">
            <label for="status_pembayaran">Status Pembayaran</label>
            <select name="status_pembayaran" id="status_pembayaran" class="admin-input" required>
                <option value="Menunggu Pembayaran"
                    <?= ($data['status_pembayaran'] == 'Menunggu Pembayaran') ? 'selected' : ''; ?>>
                    Menunggu Pembayaran
                </option>
                <option value="Lunas"
                    <?= ($data['status_pembayaran'] == 'Lunas') ? 'selected' : ''; ?>>
                    Lunas
                </option>
                <option value="Gagal"
                    <?= ($data['status_pembayaran'] == 'Gagal') ? 'selected' : ''; ?>>
                    Gagal
                </option>

            </select>
        </div>

        <div class="form-action form-action-right">
            <button type="submit" class="btn-save">
                <i class="bi bi-repeat"></i> Update Data
            </button>
        </div>
    </form>
    </div>
    <div class="form-action">
        <a href="tampil_booking.php" class="btn-back">
            ← Kembali ke beranda
        </a>
    </div>
</div>
</body>
</html>