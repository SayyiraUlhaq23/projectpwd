<?php
include 'koneksi.php';

$id_booking = $_GET['id_booking'];

mysqli_query($konek,"DELETE FROM booking WHERE id_booking='$id_booking'");

header("Location:tampil_booking.php");
?>