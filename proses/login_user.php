<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $query = mysqli_query($konek, "SELECT * FROM users WHERE (username='$username' OR email='$username') AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
      $data = mysqli_fetch_assoc($query);

      $_SESSION['id_user'] = $data['id_user'];
      $_SESSION['user_username'] = $data['username'];
      $_SESSION['nama'] = $data['nama'];
      $_SESSION['email'] = $data['email'];

      $_SESSION['role'] = 'user';
      $_SESSION['login'] = true;
      
      header("Location:../user/index.php");
      exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
    
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="loginUser-page">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="../user/index.php">
      <!-- <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
      VelnoraJogja
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-lg-center">
          <li class="nav-item">
            <a class="nav-link" href="../user/index.php">
            <i class="bi bi-house-door"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../user/index.php#daftar-kendaraan">
            <i class="bi bi-grid-3x3-gap me-1"></i> Katalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../user/index.php#about">
            <i class="bi bi-info-circle"></i> About</a>
          </li>

        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'user'){ ?>
          <li class="nav-item dropdown">
            <a class="nav-link user-session" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i>  
                <?= $_SESSION['user_username']; ?>
                <i class="bi bi-chevron-down dropdown-custom"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item dropdown-menu-custom" href="mybooking.php">
                  <i class="bi bi-journal-text"></i> Reservasi Saya
                </a>
              </li>
              <li>
                <a class="dropdown-item dropdown-menu-custom text-danger" href="../proses/logout.php">
                  <i class="bi bi-box-arrow-in-right"></i> Logout
                </a>
              </li>
            </ul>
          </li>
        <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link nav-login" href="../proses/login_user.php">
              <i class="bi bi-person"></i> Login</a>
            </li>
        <?php } ?>
        </ul>
      </div>
    </div>
</nav>

<main>
<div class="container">
    <div class="auth-card login-card">
        <div class="login-header">
            <div class="login-icon">
                <i class="bi bi-person-circle"></i>
            </div>
            <h2>Login User</h2>
            <p><i>Login melanjutkan reservasi kendaraan favorit Anda.</i></p>
        </div>
        <div class="login-body">
          <?php
            if(isset($_GET['ket'])){
              if($_GET['ket']=='gagal'){
                echo "
                <div class='error-message'>
                  Username atau Password salah!
                </div> ";
              }
            }
          ?>

            <form action="cek_login.php" method="POST">
              <input type="hidden" name="role" value="user">
              
                <div class="input-group custom-input">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" name="username" class="form-control" placeholder="Username or Email" required>
                </div>
                <div class="input-group custom-input">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" name="login" class="login-btn">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Login
                </button>
            </form>

            <div class="register">
                <span>Belum memiliki akun?</span>
                <a href="register.php">Registrasi</a>
            </div>
        </div>
    </div>
</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
</body>
<footer class="footer">
  <div class="footer-content">
  © 2026 Velnora Jogja
  <a href="login_db.php" class="admin-link">
    - Admin
  </a>
  </div>
</footer>
</html>