<div id="pertandingan" class="content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5>Kelola Jadwal Pertandingan</h5>
    </div>

    <?php if (isset($_SESSION['pesan'])): ?>
        <div class="alert alert-success"><?= $_SESSION['pesan']; unset($_SESSION['pesan']); ?></div>
    <?php endif; ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Pertandingan</th>
                <th>Lokasi</th>
                <th>Skor</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM pertandingan ORDER BY tanggal ASC";
            $pertandingan = $koneksi->query($sql);
            while ($row = $pertandingan->fetch_assoc()): ?>
                <tr>
                    <td><?= date('d F Y', strtotime($row['tanggal'])) ?></td>
                    <td>
                        <?= $row['team1'] ?> vs <?= $row['team2'] ?>
                    </td>
                    <td><?= $row['lokasi'] ?></td>
                    <td>
                        <?php if ($row['status'] === 'selesai'): ?>
                            <?= $row['skor1'] ?> - <?= $row['skor2'] ?>
                        <?php else: ?>
                            Belum dimulai
                        <?php endif; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>">
                            Edit Skor
                        </button>
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editJadwalModal<?= $row['id'] ?>">
                            Edit Jadwal
                        </button>
                    </td>
                </tr>

                <!-- Edit Skor -->
                <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Skor Pertandingan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <div class="row">
                                        <div class="col-md-5 text-end">
                                            <h5><?= $row['team1'] ?></h5>
                                            <input type="number" name="skor1" class="form-control" value="<?= $row['skor1'] ?? 0 ?>" min="0">
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <h3>VS</h3>
                                        </div>
                                        <div class="col-md-5">
                                            <h5><?= $row['team2'] ?></h5>
                                            <input type="number" name="skor2" class="form-control" value="<?= $row['skor2'] ?? 0 ?>" min="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" name="update_skor" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Edit Jadwal -->
                <div class="modal fade" id="editJadwalModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editJadwalModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editJadwalModalLabel">Edit Jadwal Pertandingan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal</label>
                                        <input type="datetime-local" name="tanggal" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($row['tanggal'])) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tim 1</label>
                                        <input type="text" name="team1" class="form-control" value="<?= $row['team1'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tim 2</label>
                                        <input type="text" name="team2" class="form-control" value="<?= $row['team2'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control" value="<?= $row['lokasi'] ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" name="update_jadwal" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>