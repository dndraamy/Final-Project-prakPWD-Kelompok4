<?php
$koneksi = new mysqli('localhost', 'root', '', 'seagames_fb');

     if ($koneksi->connect_error) {
         die("Connection failed: " . $koneksi->connect_error);
     }
     

if (isset($_GET['nama_negara'])) {
    $nama_negara = mysqli_real_escape_string($koneksi, $_GET['nama_negara']);
}
    $query = "
    SELECT pemain.nama_pemain, pemain.posisi, pemain.no_punggung, negara.nama_negara
FROM pemain
JOIN negara ON pemain.id_negara = negara.id_negara
WHERE negara.nama_negara = '$nama_negara'
    ";

    
    $result = mysqli_query($koneksi, $query);

    // Siapkan array untuk setiap posisi
    $players_by_position = [
        'Goalkeeper' => [],
        'Defender' => [],
        'Midfielder' => [],
        'Forward' => [],
    ];


while ($row = mysqli_fetch_assoc($result)) {
    $posisi = ucfirst(strtolower($row['posisi'])); // Format posisi dengan huruf besar di awal
    if (isset($players_by_position[$posisi])) {
        $players_by_position[$posisi][] = [
            'nama_pemain' => $row['nama_pemain'],
            'no_punggung' => $row['no_punggung']
        ];
    }
}
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
      .player-group {
        margin-top: 20px;
        text-align: center;
        color: white;
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

      <style>
        .nav-player {
  margin-top: 80px; /* atau sesuai tinggi navbar */
}
      </style>
      
      <!-- PLAYER NAV -->
    <div class="container" style="margin-top: 100px;">
      <ul class="nav justify-content-center nav-player">
        <li class="nav-item"><a class="nav-link active" href="#" onclick="showPlayers(event, 'goalkeeper')">Goalkeeper</a></li>
        <li class="nav-item"><a class="nav-link active" href="#" onclick="showPlayers(event, 'defender')">Defender</a></li>
        <li class="nav-item"><a class="nav-link active" href="#" onclick="showPlayers(event, 'midfielder')">Midfielder</a></li>
        <li class="nav-item"><a class="nav-link active" href="#" onclick="showPlayers(event, 'forward')">Forward</a></li>
      </ul>

      <!-- PLAYER CONTENT -->
      <div id="goalkeeper" class="player-group">
    <h3>Goalkeepers</h3>
    <?php foreach ($players_by_position['Goalkeeper'] as $pemain): ?>
        <p><?= htmlspecialchars($pemain['nama_pemain']); ?> <?= htmlspecialchars($pemain['no_punggung']); ?></p>
    <?php endforeach; ?>
</div>

<div id="defender" class="player-group d-none">
    <h3>Defenders</h3>
    <?php foreach ($players_by_position['Defender'] as $pemain): ?>
        <p><?= htmlspecialchars($pemain['nama_pemain']); ?> <?= htmlspecialchars($pemain['no_punggung']); ?></p>
    <?php endforeach; ?>
</div>

<div id="midfielder" class="player-group d-none">
    <h3>Midfielders</h3>
    <?php foreach ($players_by_position['Midfielder'] as $pemain): ?>
        <p><?= htmlspecialchars($pemain['nama_pemain']); ?> <?= htmlspecialchars($pemain['no_punggung']); ?></p>
    <?php endforeach; ?>
</div>

<div id="forward" class="player-group d-none">
    <h3>Forwards</h3>
    <?php foreach ($players_by_position['Forward'] as $pemain): ?>
        <p><?= htmlspecialchars($pemain['nama_pemain']); ?> <?= htmlspecialchars($pemain['no_punggung']); ?></p>
    <?php endforeach; ?>
</div>

<style>
    .nav-tabs .nav-link.active {
        background-color: transparent; /* Menghilangkan latar belakang default */
        color: green; /* Mengubah warna teks menjadi hijau */
    }
    .nav-tabs .nav-link {
        color: white; /* Warna teks default untuk tab yang tidak aktif */
    }
</style>



    <!-- Script Toggle -->
    <script>
      function showPlayers(event, position) {
        event.preventDefault();

        const allGroups = document.querySelectorAll('.player-group');
        allGroups.forEach(group => group.classList.add('d-none'));

        const selectedGroup = document.getElementById(position);
        if (selectedGroup) selectedGroup.classList.remove('d-none');

        const links = document.querySelectorAll('.nav-player .nav-link');
        links.forEach(link => link.classList.remove('active'));
        event.target.classList.add('active');
      }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384..."></script>
</html>