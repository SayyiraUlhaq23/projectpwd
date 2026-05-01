<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$id_kendaraan = $_POST['id_kendaraan'];
$tanggal = $_POST['tanggal'];
$lama_sewa = $_POST['lama_sewa'];


$query = mysqli_query($konek, "INSERT INTO booking(nama,email,no_hp,id_kendaraan,tanggal,lama_sewa)
VALUES('$nama','$email','$no_hp','$id_kendaraan','$tanggal','$lama_sewa')");

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Booking</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="header">Status Booking</div>
    <div class="content">
        <?php if($query){ ?>
            <p class="success">✅ Booking berhasil disimpan!</p>
        <?php } else { ?>
            <p class="error">❌ Gagal menyimpan data</p>
        <?php } ?>

        <a href="form_booking.php">Kembali ke Form</a>
    </div>
</div>

</body>
</html>
