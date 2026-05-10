<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login db</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/styleAdmin.css">
</head>

<body class="login-page">
<div class="admin-card">
    <div class="admin-header">
        <i class="bi bi-shield-lock-fill"></i><h2>LOGIN</h2>
        <p>Masuk untuk mengakses dashboard admin</p>
    </div>

    <?php
    if(isset($_GET['ket'])){
        if($_GET['ket']=='gagal'){
            echo "
            <div class='error-message'>
                Username atau password salah.
            </div> ";
        }
    }
    $_SESSION['role'] = 'admin';
    ?>

    <!-- form login -->
    <form action="cek_login.php" method="POST">
    <input type="hidden" name="role" value="admin">

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="login-input" placeholder="Username" required><br>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="login-input" placeholder="Password" required><br>
    </div>
    <button type="submit" class="admin-btn">
        Login
    </button>    
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</body>
</html>
