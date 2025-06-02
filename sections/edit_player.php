<div id="edit-player" class="content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5>Edit Pemain: <?= htmlspecialchars($player_data['nama_pemain']) ?></h5>
    </div>

    <div class="card p-4">
        <form method="POST">
            <input type="hidden" name="id_pemain" value="<?= $player_data['id_pemain'] ?>">

            <div class="mb-3">
                <label class="form-label">Posisi</label>
                <input type="text" name="posisi" class="form-control" value="<?= htmlspecialchars($player_data['posisi']) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Punggung</label>
                <input type="number" name="no_punggung" class="form-control" value="<?= htmlspecialchars($player_data['no_punggung']) ?>" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" name="update_pemain" class="btn btn-primary">Simpan Perubahan</button>
                <a href="?section=player" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>