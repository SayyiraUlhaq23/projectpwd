<?php
include 'koneksi.php';

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($konek,"UPDATE users SET nama='$nama', email='$email', no_hp='$no_hp', username='$username', password='$password' WHERE id_user='$id_user'");

if($query){
    header("Location:../admin/tampil_users.php");
} else {
    echo "Gagal update data!";
}
?>
