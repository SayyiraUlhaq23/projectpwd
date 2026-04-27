<?php
include 'koneksi.php';

$id_kendaraan = $_GET['id_kendaraan'];

$query = mysqli_query($konek,"SELECT * FROM kendaraan WHERE id_kendaraan='$id_kendaraan'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kendaraan</title>
</head>

<body>
    <h1>Ubah Data Kendaraan Sewa</h1>
    <form action="update_kendaraan.php" method="POST">
        <label for="id_kendaraan">ID Kendaraan : </label>
        <input type="text" name = "id_kendaraan"
        value="<?= $data['id_kendaraan']; ?>" readonly><br>

        <label for="jenis_kendaraan">Jenis Kendaraan : </label>
        <input type="text" name = "jenis_kendaraan"
        value="<?= $data['jenis_kendaraan']; ?>"><br>

        <label for="harga_sewa">Harga Sewa : </label>
        <input type="text" name = "harga_sewa"
        value="<?= $data['harga_sewa']; ?>"><br><br>

        <input type="submit" value ="Update">
    </form>
</body>
</html>
