<?php
include 'koneksi.php';

$id_kendaraan = $_POST['id_kendaraan'];
$jenis_kendaraan = $_POST['jenis_kendaraan'];
$harga_sewa = $_POST['harga_sewa'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];

//gambar lama
$data = mysqli_fetch_assoc(mysqli_query($konek,"SELECT gambar FROM kendaraan WHERE id_kendaraan='$id_kendaraan'"));
$gambar = $data['gambar'];


// kalo ada upload baru
if(!empty($_FILES['gambar']['name'])){
    $gambar_baru = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "../assets/" . $gambar_baru);

    $gambar = $gambar_baru;
}

$query = mysqli_query($konek,"UPDATE kendaraan SET jenis_kendaraan='$jenis_kendaraan', harga_sewa='$harga_sewa', stok='$stok', deskripsi='$deskripsi', gambar='$gambar'
        WHERE id_kendaraan='$id_kendaraan'");

if($query){
    header("Location:../admin/tampil_kendaraan.php");
} else {
    echo "Gagal update data!";
}
?>