<div id="profile" class="content-section active">
    <div>
        <h5>Profil</h5>
    </div>
    <div class="card p-4 mb-4">
        <div class="d-flex align-items-center">
            <img src="<?= $admin['profil'] ?>" class="rounded-circle me-4" style="width: 100px; height: 100px;" />
            <div>
                <h5><?= $admin['nama'] ?> <span class="text-warning">★★★★★</span> <small>(Admin)</small></h5>
                <p><i class="fas fa-map-marker-alt me-2"></i><?= $admin['domisili'] ?></p>
                <p>Bergabung: <?= $admin['tgl_bergabung'] ?> | <?= $admin['jenis_kelamin'] ?> | <?= $admin['umur'] ?> Tahun</p>
            </div>
        </div>
    </div>
    <div class="data row mb-4">
        <h5>Data Yang Saya Kelola</h5>
        <div class="col-md-3">
            <div class="card text-center p-3">
                <h6>Jumlah Tim</h6>
                <h4><?= $hitungTim ?></h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center p-3">
                <h6>Total Pemain</h6>
                <h4><?= $hitungPemain ?></h4>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center p-3">
                <h6>Total Pertandingan</h6>
                <h4><?= $hitungPertandingan ?></h4>
            </div>
        </div>
    </div>
</div>