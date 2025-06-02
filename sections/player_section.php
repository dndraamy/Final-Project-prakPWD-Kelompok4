<?php if (isset($_SESSION['pesan'])): ?>
    <div class="alert-container" style="margin-left: 260px; padding: 10px;">
        <?= $_SESSION['pesan'];
        unset($_SESSION['pesan']); ?>
    </div>
<?php endif; ?>


<div id="player" class="content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5>Manajemen Pemain</h5>
        <button class="btn btn-primary" onclick="document.getElementById('player-form').style.display='block'">+ Tambah Pemain Baru</button>
    </div>

    <div id="player-form" style="display: none; color: black !important;" class="mb-4">
        <form method="POST">
            <div class="mb-2">
                <label>Nama Pemain</label>
                <input type="text" class="form-control" name="nama_pemain" required />
            </div>
            <div class="mb-2" style="color: black !important;">
                <label>Negara</label>
                <select class="form-control text-black bg-white" name="id_negara" style="color: black !important;" required>
                    <option value="" style="color: black;">Pilih Negara</option>
                    <?php
                $countrySql = "SELECT * FROM negara";
                $countryResult = $koneksi->query($countrySql);
                while ($country = $countryResult->fetch_assoc()) {
                    echo '<option value="' . $country['id_negara'] . '" style="color: black;">' 
                        . htmlspecialchars($country['nama_negara']) . '</option>';
                }
                ?>
                </select>
            </div>
            <div class="mb-2">
                <label>Posisi</label>
                <input type="text" class="form-control" name="posisi" required />
            </div>
            <div class="mb-2">
                <label>Nomor Punggung</label>
                <input type="number" class="form-control" name="no_punggung" required />
            </div>
            <button type="submit" name="add_player" class="btn btn-success">Tambah Pemain</button>
        </form>
    </div>


    <div class="container my-4">
        <?php if (!empty($pemainByNegara)): ?>
            <?php foreach ($pemainByNegara as $negara => $pemain): ?>
                <h5><?= htmlspecialchars($negara) ?></h5>
                <div class="row">
                    <?php foreach ($pemain as $row): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-judul"><?= htmlspecialchars($row['nama_pemain']) ?></h5>
                                    <p class="card-text">Posisi: <?= htmlspecialchars($row['posisi']) ?></p>
                                    <p class="card-text">Nomor Punggung: <?= htmlspecialchars($row['no_punggung']) ?></p>
                                    <a href="?section=player&edit_type=player&edit_id=<?= $row['id_pemain'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="?section=player&delete_id=<?= $row['id_pemain'] ?>" class="btn btn-danger btn-sm">Hapus Pemain</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-danger text-center mt-5" role="alert">
                Data pemain tidak ditemukan.
            </div>
        <?php endif; ?>
    </div>
</div>