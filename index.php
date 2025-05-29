<?php
include 'koneksi.php';
$sql = "SELECT * FROM last_match ORDER BY id DESC LIMIT 1";
$match = $koneksi->query($sql)->fetch_assoc();

$sql = "SELECT * FROM statistik WHERE last_match_id = {$match['id']}";
$stats = $koneksi->query($sql);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SeaBall</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Boldonse&family=Caveat+Brush&family=Merienda:wght@300..900&family=Moon+Dance&family=Rubik+Bubbles&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('assets/backgroundHome.jpg');
            flex-direction: column;
            position: relative;
        }

        .main-section {
            background-size: 1300px 800px;
            background-image: url('assets/backgroundHome.jpg');
            min-height: 100vh;
        }

        .main-text {
            color: white;
            position: absolute;
            top: 13%;
            left: 46%;
            text-align: left;
        }

        a:hover {
            background-color: black !important;
            color: rgb(137, 255, 100) !important;
        }

        h1,
        h2,
        h3 {
            font-family: 'Boldonse', sans-serif;
        }

        h1 {
            padding-bottom: 20px;
        }

        p {
            font-size: 15px !important;
        }

        .feature-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: white;
        }

        .btn-primary:hover {
            background-color: #134013;
            border-color: #134013;
        }

        .match-section {
            background-image: url('https://img.okezone.com/content/2023/05/16/51/2815184/timnas-indonesia-u-22-juara-sepakbola-sea-games-2023-ini-daftar-juara-sepakbola-sea-games-sepanjang-masa-Rk10SXJRI4.jpg');
            background-size: 800px;
            padding: 50px 0;
        }

        .match-container {
            display: flex;
            justify-content: right;
            margin-right: 50px;
        }

        .match-card {
            background-color: white;
            padding: 20px;
            width: 480px;
            text-align: center;
        }

        .team-logo {
            width: 60px;
            height: 60px;
        }

        .score-box {
            font-size: 35px;
            font-weight: bold;
            padding: 10px;
        }

        .match-card .btn {
            border-radius: 50px;
            width: 350px;
            margin: 15px;
            padding: 10px 20px;
            font-weight: bold;
            background-color: white;
            color: #001a33;
            border: 2px solid #001a33;
        }

        .match-card .btn:hover {
            background-color: #001a33;
            color: white;
        }

        .footer {
            background-color: rgb(0, 0, 0);
            padding: 50px 0 20px;
        }

        .footer .inner {
            display: flex;
            column-gap: 60px;
            color: white;
        }

        .main-logo {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .main-logo .logo {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .main-logo .logo img {
            width: 100%;
            height: auto;
        }

        .text {
            font-size: 17px;
        }

        .footer .column {
            width: 100%;
            font-size: 14px;
        }

        .footer .column .column-title {
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.33);
        }

        .footer ul {
            padding-left: 0;
            list-style: none;
        }

        .footer ul li {
            margin-bottom: 8px;
        }

        .footer a {
            color: #ddd !important;
        }

        .footer a:hover {
            color: rgb(137, 255, 100) !important;
        }
    </style>
</head>

<body>

    <?php
    include 'navbar.php';
    ?>

    <div class="main-content">
        <!-- Main Section -->
        <section class="main-section">
            <div class="container">
                <div class="main-text">
                    <h1>Bertanding dengan <span style="color: rgb(137, 255, 100);">Bangga</span></h1>
                    <h1>Bersatu dalam <span style="color: rgb(137, 255, 100);">Sportivitas</span></h1>
                    <p>Semua tentang sepak bola SEA Games: jadwal pertandingan, skor langsung, pratinjau,<br> dan profil tim nasional negara di Asia Tenggara dalam main platform.</p>
                    <div class="mt-5">
                        <a href="login1.php" class="btn btn-primary btn-lg me-3">Masuk</a>
                        <a href="create.php" class="btn btn-primary btn-lg me-3">Daftar</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-5" style="background-color: #000000;">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="bi bi-calendar-event"></i>
                            </div>
                            <h3>Jadwal Lengkap</h3>
                            <p>Lihat seluruh jadwal pertandingan sepak bola SEA Games dengan detail waktu dan lokasi.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <h3>Hasil Real-time</h3>
                            <p>Update skor langsung dan hasil pertandingan secara real-time.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="bi bi-flag"></i>
                            </div>
                            <h3>Profil Negara</h3>
                            <p>Informasi lengkap tentang tim nasional sepak bola negara-negara peserta.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Match Section -->
        <section class="match-section">
            <div class="match-container">
                <div class="match-card">
                    <div class="match-date"><b><?= $match['judul'] ?></b></div>
                    <div class="match-title"><?= date('d F Y', strtotime($match['tanggal'])) ?></div>
                    <div class="d-flex justify-content-around align-items-center">
                        <div>
                            <img src="assets/Indonesia.png" class="team-logo" alt="Indonesia">
                            <div><?= $match['negara1'] ?></div>
                        </div>
                        <div class="score-box"><?= $match['skor1'] ?> - <?= $match['skor2'] ?></div>
                        <div>
                            <img src="assets/Thailand.png" class="team-logo" alt="Thailand">
                            <div><?= $match['negara2'] ?></div>
                        </div>
                    </div>
                    <div class="match-title"><?= $match['stadion'] ?></div>
                    <a href="statistik.php" class="btn">Statistik Pertandingan</a>
                </div>
            </div>
        </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="inner">
                <div class="column">
                    <div class="main-logo">
                        <div class="logo">
                            <img src="assets/logo2.png" alt="SeaBall Logo">
                        </div>
                        <div class="text">SeaBall.</div>
                    </div>
                </div>
                <div class="column">
                    <div class="column-title"><b>NAVIGASI</b></div>
                    <ul>
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="schedule.php">Jadwal Pertandingan</a></li>
                        <li><a href="result.php">Hasil Pertandingan</a></li>
                        <li><a href="preview.php">Pratinjau Pertandingan</a></li>
                    </ul>
                </div>
                <div class="column">
                    <div class="column-title"><b>NEGARA</b></div>
                    <ul>
                        <li><a href="negara.php?nama_negara=Indonesia">Indonesia</a></li>
                        <li><a href="negara.php?nama_negara=Thailand">Thailand</a></li>
                        <li><a href="negara.php?nama_negara=Vietnam">Vietnam</a></li>
                        <li><a href="negara.php?nama_negara=Philippines">Filipina</a></li>
                        <li><a href="negara.php?nama_negara=Malaysia">Malaysia</a></li>
                    </ul>
                </div>
                <div class="column">
                    <div class="column-title"><b>HUBUNGI KAMI</b></div>
                    <ul>
                        <li><i class="bi bi-envelope me-2"></i> seaball@gmail.com</li>
                        <li><i class="bi bi-telephone me-2"></i> +62 123 4567 890</li>
                        <li><i class="bi bi-geo-alt me-2"></i> Yogyakarta, Indonesia</li>
                    </ul>
                    <div class="social-media mt-3">
                        <a href="#" class="me-2"><a class="bi bi-facebook"></a></a>
                        <a href="#" class="me-2"><a class="bi bi-instagram"></a></a>
                        <a href="#" class="me-2"><a class="bi bi-youtube"></a></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4" style="color: #aaa;">
                <p>© 2023 SeaBall. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>