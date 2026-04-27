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
            <th>Email</th>
            <th>No Hp</th>
            <th>Jenis Kendaraan</th>
            <th>Tanggal</th>
            <th>Lama Sewa</th>
            <th>Aksi</th>
        </tr>

    <?php
    include 'koneksi.php';
    $query = mysqli_query($konek, "SELECT booking. *, kendaraan.jenis_kendaraan FROM booking JOIN kendaraan ON booking.id_kendaraan = kendaraan.id_kendaraan");

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
        <td><a href="edit_booking.php?id_booking=<?php echo $data['id_booking']; ?>">
            Edit</a></td>
    </tr>
    <?php } ?>
    </table>
    <br>
    <form action="dashboard.php" method="POST">
        <input type="submit" value="Kembali">
    </form>
</html>
