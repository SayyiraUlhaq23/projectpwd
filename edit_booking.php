<?php
include 'koneksi.php';

$id_booking = $_GET['id_booking'];

$query = mysqli_query($konek,"SELECT * FROM booking WHERE id_booking='$id_booking'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update booking</title>
</head>

<body>
    <h1>Update Data Booking Sewa</h1>
    <form action="update_booking.php" method="POST">
        <label for="id_booking">ID booking : </label>
        <input type="text" name = "id_booking"
        value="<?= $data['id_booking']; ?>" readonly><br>

        <label for="nama">Nama</label>
        <input type="text" name="nama"
        value="<?= $data['nama']; ?>"><br>

        <label for="email">E-mail : </label>
        <input type="text" name="email"
        value="<?= $data['email']; ?>"><br>


        <label for="no_hp">No HP</label>
        <input type="text" name="no_hp"
        value="<?= $data['no_hp']; ?>"><br>

        <label class="label">Pilih Jenis Kendaraan</label>
            <select name="id_kendaraan" id="id_kendaraan" required>
                <option value="K001" <?= ($data['id_kendaraan']=='K001') ? 'selected' : ''; ?>>VW</option>
                <option value="K002" <?= ($data['id_kendaraan']=='K002') ? 'selected' : ''; ?>>Vespa</option>
                <option value="K003" <?= ($data['id_kendaraan']=='K003') ? 'selected' : ''; ?>>Sepeda</option>
            </select>
        

        <label for="tanggal">Tanggal Booking</label>
        <input type="date" name="tanggal" id="tanggal"
        value="<?= $data['tanggal']; ?>"><br>

        <label for="lama_sewa">Lama Sewa</label>
        <input type="text" name="lama_sewa"
        value="<?= $data['lama_sewa']; ?>"><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
