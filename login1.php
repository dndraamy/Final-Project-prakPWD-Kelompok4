


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Sepak Bola</title>
  <link rel="stylesheet" href="login1.css">
</head>
<body>
  <div class="login-container">
    <h2>Login Admin</h2>
    <form action="dashboard_admin.php" method="POST">
      <input type="text" name="id_admin" placeholder="ID Admin" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <a href="login2.php" style="color: white">Login sebagai User</button>
      <button type="submit" name="login">Login</button>
    </form>

    <?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Cek apakah email ada di database
  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    if ($user['password'] === $password) {
      echo "<p class='success'>Login berhasil! Selamat datang.</p>";
    } else {
      echo "<p class='error'>Password salah.</p>";
    }
  } else {
    // Redirect ke create.php jika email belum terdaftar
    header("Location: create.php?email=" . urlencode($email));
    exit();
  }
}
?>

  </div>
</body>
</html>
