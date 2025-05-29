<style>
    .navbar{
            top: 0;

    }
    .navbar-custom .dropdown-menu {
        background-color: black !important;
    }

    .navbar-custom .dropdown-item {
        color: white !important;
    }

    .navbar-custom .dropdown-item:hover {
        background-color: #333 !important;
    }

    .navbar-custom .nav-link {
        color: white !important;
    }

    .navbar-custom .nav-link:hover {
        color: rgb(137, 255, 100) !important;
    }
</style>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark navbar-custom position-fixed w-100" style="z-index: 999;">
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
                    <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
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
                    <a class="nav-link" href="schedule.php">Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="result.php">Hasil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="preview.php">Preview</a>
                </li>
            </ul>
        </div>
    </div>
</nav>