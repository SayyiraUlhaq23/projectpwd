<?php
session_start();

if(!isset($_SESSION['username'])){
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
        <span>Anda masuk sebagai <b><?= $_SESSION['username']; ?></b></span>
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
            <th>Status</th>
            <th colspan="2">Aksi</th>
        </tr>
        </thead>
    
    <tbody>
    <?php
    include '../proses/koneksi.php';
    $query = mysqli_query($konek, "SELECT booking.*, kendaraan.jenis_kendaraan, users.nama, users.email, users.no_hp,
             kendaraan.jenis_kendaraan, kendaraan.harga_sewa, (kendaraan.harga_sewa * booking.lama_sewa) AS total_harga
             FROM booking JOIN users ON booking.id_user = users.id_user
             JOIN kendaraan ON booking.id_kendaraan = kendaraan.id_kendaraan");

    while($data = mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><?php echo $data['id_booking']?></td>
        <td><?php echo $data['nama']?></td>
        <td><?php echo $data['email']?></td>
        <td><?php echo $data['no_hp']?></td>
        <td><?php echo $data['jenis_kendaraan']?></td>
        <td><?php echo date('d M Y', strtotime($data['tanggal'])); ?></td>
        <td><?php echo $data['lama_sewa'] . " hari"?></td>
        <td> Rp <?= number_format($data['total_harga'], 0, ',', '.'); ?></td>
        <td>
            <?php if($data['status'] == 'booking'){ ?>
                <span class="status-booking">Booking</span>
            <?php } else { ?>
                <span class="status-done">Done</span>
            <?php } ?>
        </td>
        <td>
            <a class="btn-action btn-edit" href="edit_booking.php?id_booking=<?php echo $data['id_booking']; ?>">Edit</a>
            <a class="btn-action btn-delete" href="../proses/delete_booking.php?id_booking=<?php echo $data['id_booking']; ?>" 
                onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
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