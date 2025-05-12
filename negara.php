<?php
  $koneksi = new mysqli('localhost', 'root', '', 'seagames_fb');

  $nama_negara = $_GET['nama_negara'] ?? 'Indonesia';
  $nama_negara = mysqli_real_escape_string($koneksi, $nama_negara);

  $sql = "SELECT * FROM negara WHERE nama_negara = '$nama_negara'";
  $result = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SeaBall</title>
    <link rel="stylesheet" href="stylee.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Boldonse&family=Caveat+Brush&family=Merienda:wght@300..900&family=Moon+Dance&family=Rubik+Bubbles&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <style>
    body {
          background-image: url('assets/background2.png') !important;
      }
  </style>
  
  <body>
    <!-- NAVBAR -->
      <nav class="navbar navbar-expand-lg bg-dark navbar-dark position-fixed w-100" style="z-index: 999;">
        <div class="container-fluid" style="background-color: black;">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
            <img src="assets/logo2.png" alt="Logo" width="40">
            <img src="assets/logolagi.png" alt="Logo" width="80">
        </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.html">Beranda</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Negara
                </a>
                <ul class="dropdown-menu bg-dark">
                  <li><a class="dropdown-item" href="negara.php?nama_negara=Indonesia">Indonesia</a></li>
                  <li><a class="dropdown-item" href="negara.php?nama_negara=Thailand">Thailand</a></li>
                  <li><a class="dropdown-item" href="negara.php?nama_negara=Vietnam">Vietnam</a></li>
                  <li><a class="dropdown-item" href="negara.php?nama_negara=Philippines">Filipina</a></li>
                  <li><a class="dropdown-item" href="negara.php?nama_negara=Malaysia">Malaysia</a></li>
                  <li><a class="dropdown-item" href="negara.php?nama_negara=Myanmar">Myanmar</a></li>
                  <li><a class="dropdown-item" href="negara.php?nama_negara=Laos">Laos</a></li>
                  <li><a class="dropdown-item" href="negara.php?nama_negara=Singapore">Singapura</a></li>
                  <li><a class="dropdown-item" href="negara.php?nama_negara=Timor-Leste">Timor Leste</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Jadwal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Hasil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pratinjau</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- PROFIL NEGARA -->
      <?php
      if ($nama_negara == "Indonesia") {
          $bendera = "assets/Indonesia.png";
      } elseif ($nama_negara == "Thailand") {
          $bendera = "assets/Thailand.png";
      } elseif ($nama_negara == "Vietnam") {
          $bendera = "assets/Vietnam.webp";
      } elseif ($nama_negara == "Philippines") {
          $bendera = "assets/Philippines.png";
      } elseif ($nama_negara == "Malaysia") {
          $bendera = "assets/Malaysia.webp";
      } elseif ($nama_negara == "Myanmar") {
          $bendera = "assets/Myanmar.png";
      } elseif ($nama_negara == "Laos") {
          $bendera = "assets/Laos.png";
      } elseif ($nama_negara == "Singapore") {
          $bendera = "assets/Singapore.webp";
      } elseif ($nama_negara == "Timor-Leste") {
          $bendera = "assets/East_Timor.png";
      }
      ?>

      <?php if ($data): ?>
      <div class="card mb-3 position-absolute top-50 start-50 translate-middle" style="width: 1000px;">
        <div class="row g-0">
          <div class="col-md-4 d-flex align-items-center ps-4">
            <img src="<?php echo $bendera; ?>" class="img-fluid rounded-start" alt="logo" style="max-height: 250px;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title" style="padding: 10px 20px; font-family: Boldonse;"><?php echo $data['nama_negara']; ?></h5>
              <p class="card-text" style="padding: 0px 20px;"><?php echo $data['deskripsi']; ?></p>
              <h5 style="padding-top: 20px; margin-left: -50px;">
                <table style="border-collapse: separate; border-spacing: 70px 0;">
                    <tr>
                        <td>Pelatih</td>
                        <td>Stadion</td>
                    </tr>
                    <tr>
                        <td><small><?php echo $data['pelatih']; ?></small></small></td>
                        <td><small><?php echo $data['nama_stadion']; ?></small></small></td>
                    </tr>
                </table>
              </h5>
              <a href="player.php?nama_negara=<?php echo urlencode($data['nama_negara']); ?>" class="btn btn-dark plyr">See Players</a>
              <style>
                .plyr:hover{
                    background-color: rgb(137, 255, 100) !important;
                    color: black !important;
                }
                .plyr{
                  margin-left: 20px;
                  margin-top: 20px;
                  border-radius: 100px;
                }
              </style>
            </div>
          </div>
        </div>
      </div>
      <?php else: ?>
        <div class="alert alert-danger text-center mt-5" role="alert">
          Data negara <strong><?php echo htmlspecialchars($nama_negara); ?></strong> tidak ditemukan.
        </div>
      <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384..."></script>
</html>