<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// cek login admin
$query_admin = mysqli_query($konek, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
$cek_admin = mysqli_num_rows($query_admin);

if($cek_admin > 0){
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'admin';
    $_SESSION['status'] = 'login';

    header("location:dashboard.php");
    exit;
}

// cek login user
$query_user = mysqli_query($konek, "SELECT * FROM users WHERE (username = '$username' OR email = '$username') AND password = '$password'");
$cek_user= mysqli_num_rows($query_user);

if($cek_user > 0){
    $data = mysqli_fetch_assoc($query_user);

    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['no_hp'] = $data['no_hp'];
    $_SESSION['role'] = 'user';
    $_SESSION['status'] = 'login';
    
    header("location:index.php");
    exit;
} 

header("location:login_user.php?pesan=gagal");
exit;
?>
