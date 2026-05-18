<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];


if($role == "admin"){
    $query = mysqli_query($konek, "SELECT * FROM admin 
    WHERE username='$username' AND password='$password'");

    $cek = mysqli_num_rows($query);

    if($cek > 0){
        $_SESSION['id_admin'] = $data['id_admin'];
        $_SESSION['admin_username'] = $username;
        $_SESSION['role'] = 'admin';
        $_SESSION['status'] = 'login';
        header("Location: ../admin/dashboard.php");
        exit;
    } else {
        header("Location: login_db.php?pesan=gagal");
        exit;
    }

} elseif($role == "user") {
    $query = mysqli_query($konek, "SELECT * FROM users 
        WHERE (username='$username' OR email='$username') AND password='$password'");

    $cek = mysqli_num_rows($query);

    if($cek > 0){
        $data = mysqli_fetch_assoc($query);

        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['user_username'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['no_hp'] = $data['no_hp'];
        $_SESSION['role'] = 'user';
        $_SESSION['status'] = 'login';

        header("Location: ../user/index.php");
        exit;
    } else {
        header("Location: login_user.php?pesan=gagal");
        exit;
    }
}
?>