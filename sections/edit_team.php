<?php if (isset($_SESSION['pesan'])): ?>
    <div class="alert-container" style="margin-left: 260px; padding: 10px;">
        <?= $_SESSION['pesan'];
        unset($_SESSION['pesan']); ?>
    </div>
<?php endif; ?>
<div id="edit-team" class="content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5>Edit Tim Negara <?= htmlspecialchars($team_data['nama_negara']) ?></h5>
    </div>

    <div class="card p-4">
        <form method="POST">
            <input type="hidden" name="id_negara" value="<?= $team_data['id_negara'] ?>">
            <div class="mb-3">
                <label class="form-label">Nama Pelatih :</label>
                <input type="text" name="pelatih" class="form-control" value="<?= htmlspecialchars($team_data['pelatih']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stadion :</label>
                <input type="text" name="nama_stadion" class="form-control" value="<?= htmlspecialchars($team_data['nama_stadion']) ?>" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" name="update_tim" class="btn btn-primary">Simpan Perubahan</button>
                <a href="?section=team" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>