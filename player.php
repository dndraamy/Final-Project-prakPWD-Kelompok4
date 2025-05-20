<?php
include 'koneksi.php';

$nama_negara = isset($_GET['nama_negara']) ? mysqli_real_escape_string($koneksi, $_GET['nama_negara']) : '';
$posisi_aktif = isset($_GET['posisi']) ? $_GET['posisi'] : 'Goalkeeper';

$query = "
    SELECT pemain.nama_pemain, pemain.posisi, pemain.no_punggung, negara.nama_negara
    FROM pemain
    JOIN negara ON pemain.id_negara = negara.id_negara
    WHERE negara.nama_negara = '$nama_negara'
";

$result = mysqli_query($koneksi, $query);

$players_by_position = [
    'Goalkeeper' => [],
    'Defender'   => [],
    'Midfielder' => [],
    'Forward'    => [],
];

while ($row = mysqli_fetch_assoc($result)) {
    $posisi = $row['posisi'];
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
    <title>SeaBall</title>
    <link rel="stylesheet" href="stylee.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('assets/background2.png');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            padding-bottom: -60px;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.9);
        }
        .nav-link {
            color: white;
        }
        a, p, h3 {
            color: white;
        }
        a:hover {
            background-color: black;
            color: rgb(137, 255, 100);
        }
        .dropdown-menu a.dropdown-item:hover {
            background-color: #000000;
            color: #fff;
        }
        .player-group {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
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

    <div class="container" style="margin-top: 100px;">
        <ul class="nav justify-content-center nav-tabs">
            <?php foreach (array_keys($players_by_position) as $posisi): ?>
                <li class="nav-item">
                    <a class="nav-link <?= $posisi_aktif == $posisi ? : '' ?>"
                      href="?nama_negara=<?= urlencode($nama_negara) ?>&posisi=<?= urlencode($posisi) ?>">
                        <?= $posisi ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="player-group">
            <h3><?= htmlspecialchars($posisi_aktif) ?>s</h3>
            <?php if (!empty($players_by_position[$posisi_aktif])): ?>
                <?php foreach ($players_by_position[$posisi_aktif] as $pemain): ?>
                    <p><?= htmlspecialchars($pemain['nama_pemain']) ?> - No. <?= htmlspecialchars($pemain['no_punggung']) ?></p>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada pemain di posisi ini.</p>
            <?php endif; ?>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
