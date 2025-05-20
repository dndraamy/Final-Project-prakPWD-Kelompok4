<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Sepak Bola</title>
  <link rel="stylesheet" href="login2.css">
</head>
<body>
  <img src="assets/login2.jpeg" class="bg-img" alt="Background Sepak Bola">
  <div class="login-container">
    <h2>Login User</h2>
    <form action="dashboard_user.php" method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <a href="login1.php" style="color: white">Login sebagai Admin</button>
      <button type="submit" name="create">Login</button>
    </form>

    <?php
    include 'koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nama = $_POST['nama'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $query = "SELECT * FROM users WHERE email='$email'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        echo "<p class='error'>Email sudah terdaftar. Silakan login.</p>";
      } else {
        $insert = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";
        if (mysqli_query($conn, $insert)) {
          echo "<p class='success'>Akun berhasil dibuat! Silakan login.</p>";
        } else {
          echo "<p class='error'>Gagal membuat akun. Silakan coba lagi.</p>";
        }
      }
    }
    ?>
  </div>
</body>
</html>
