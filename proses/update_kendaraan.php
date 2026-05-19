<?php
include 'koneksi.php';

$id_kendaraan = $_POST['id_kendaraan'];
$jenis_kendaraan = $_POST['jenis_kendaraan'];
$harga_sewa = $_POST['harga_sewa'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

move_uploaded_file($tmp, "../assets/" . $gambar);

$query = mysqli_query($konek,"UPDATE kendaraan SET jenis_kendaraan='$jenis_kendaraan', harga_sewa='$harga_sewa', stok='$stok', deskripsi='$deskripsi', gambar='$gambar'
        WHERE id_kendaraan='$id_kendaraan'");

if($query){
    header("Location:../admin/tampil_kendaraan.php");
} else {
    echo "Gagal update data!";
}
?>