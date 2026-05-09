<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($konek, "SELECT * FROM users WHERE username='$username' OR email='$email'");

    if (mysqli_num_rows($cek) > 0) {
        $error = "Username atau Email sudah terdaftar!";
    } else {
        mysqli_query($konek, "INSERT INTO users(nama, email, no_hp, username, password) 
                    VALUES('$nama', '$email', '$no_hp', '$username', '$password')");
        header("Location: login_user.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Velnora Jogja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="register-page">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <!-- <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
      VelnoraJogja
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-lg-center">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
            <i class="bi bi-house-door"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#daftar-kendaraan">
            <i class="bi bi-grid-3x3-gap me-1"></i> Katalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#about">
            <i class="bi bi-info-circle"></i> About</a>
          </li>

        <?php if(isset($_SESSION['status'])){ ?>
          <li class="nav-item dropdown">
            <a class="nav-link user-session" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle"></i>  
                <?= $_SESSION['username']; ?>
                <i class="bi bi-chevron-down dropdown-custom"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item dropdown-menu-custom" href="mybooking.php">
                  <i class="bi bi-journal-text"></i> Reservasi Saya
                </a>
              </li>
              <li>
                <a class="dropdown-item dropdown-menu-custom text-danger" href="logout.php">
                  <i class="bi bi-box-arrow-in-right"></i> Logout
                </a>
              </li>
            </ul>
          </li>
        <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link nav-login" href="login_user.php">
              <i class="bi bi-person"></i> Login</a>
            </li>
        <?php } ?>
        </ul>
      </div>
    </div>
</nav>

<div class="container">
    <div class="auth-card register-card">
        <div class="login-header">
            <div class="login-icon">
                <i class="bi bi-person-fill-add"></i>
            </div>
            <h2>Register</h2>
            <p><i>Buat akun dan mulai pengalaman reservasi kendaraan yang lebih mudah.</i></p>
        </div>
        <div class="login-body">
            <?php if (isset($error)) { ?>
                <div class="error"><?= $error; ?></div>
            <?php } ?>
            <form method="POST">
                <div class="input-group custom-input">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                </div>
                <div class="input-group custom-input">
                    <span class="input-group-text">
                        <i class="bi bi-telephone"></i>
                    </span>
                    <input type="text" name="no_hp" class="form-control" placeholder="08xx-xxxx-xxxx" required>
                </div>
                <div class="input-group custom-input">
                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="text" name="email" class="form-control" placeholder="E-mail" required>
                </div>
                <div class="input-group custom-input">
                    <span class="input-group-text">
                        <i class="bi bi-at"></i>
                    </span>
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="input-group custom-input">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" name="register" class="login-btn">
                    <i class="bi bi-person-check me-1"></i>Register
                </button>
            </form>
            <div class="bottom-text">
                Sudah punya akun?
                <a href="login_user.php">Login</a>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<footer class="footer">
  <div class="footer-content">
  © 2026 Velnora Jogja
  <a href="login_db.php" class="admin-link">
    - Admin
  </a>
  </div>
</footer>
</body>
</html>