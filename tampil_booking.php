<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking db</title>
</head>

<body>
    <?php
    
    session_start();

    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }

    echo "[!] Anda masuk sebagai <b>" . $_SESSION['username'] . "</b>.";
    ?>
    
    <h1>Menampilkan Data Booking VelnoraJogja</h1>
    <!-- Tabel Data -->
    <table border="1">
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

    <?php
    include 'koneksi.php';
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
                <span class="status booking">Booking</span>
            <?php } else { ?>
                <span class="status success">Done</span>
            <?php } ?>
        </td>
        <td>
            <a class="btn edit" href="edit_booking.php?id_booking=<?php echo $data['id_booking']; ?>">
                Edit</a> |
                <a class="btn hapus" href="delete_booking.php?id_booking=<?php echo $data['id_booking']; ?>" 
                onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
    </tr>
    <?php } ?>
    </table>
    <br>
    <form action="dashboard.php" method="POST">
        <input type="submit" value="Kembali">
    </form>
</html>