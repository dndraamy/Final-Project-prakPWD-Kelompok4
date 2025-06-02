<style>
    .container {
        max-width: 700px;
    }

    .preview-block {
        margin-bottom: 2rem;
        padding: 1.5rem;
        border-radius: 0.75rem;
        border: 1px solid #ddd;
        background-color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
</style>

<div id="preview" class="content-section">
    <h5>Edit Preview Pertandingan</h5>
    <?php if (isset($_SESSION['pesan'])): ?>
        <div class="alert-container" style="margin-left: 0px; padding: 10px;">
            <?= $_SESSION['pesan'];
            unset($_SESSION['pesan']); ?>
        </div>
    <?php endif; ?>


    <?php
    $previewSql = "SELECT * FROM previews ORDER BY id ASC";
    $previewResult = $koneksi->query($previewSql);

    if ($previewResult && $previewResult->num_rows > 0):
        while ($preview = $previewResult->fetch_assoc()): ?>
            <form class="preview-form" method="POST">
                <div class="preview-block" data-id="<?= $preview['id'] ?>">
                    <input type="hidden" name="id" value="<?= $preview['id'] ?>" />
                    <div class="mb-3">
                        <label for="judul_<?= $preview['id'] ?>" class="form-label"><b>Judul</b></label>
                        <input type="text" class="form-control" id="judul_<?= $preview['id'] ?>" name="judul" value="<?= htmlspecialchars($preview['judul']) ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_<?= $preview['id'] ?>" class="form-label"><b>Deskripsi</b></label>
                        <textarea class="form-control" id="deskripsi_<?= $preview['id'] ?>" name="deskripsi" rows="3" required><?= htmlspecialchars($preview['deskripsi']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="link_youtube_<?= $preview['id'] ?>" class="form-label"><b>Link YouTube</b></label>
                        <input type="text" class="form-control" id="link_youtube_<?= $preview['id'] ?>" name="link_youtube" value="<?= htmlspecialchars($preview['link_youtube']) ?>" required />
                        <div class="form-text">Contoh: https://www.youtube.com/embed/VIDEO_ID</div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-save" name="update_preview">Simpan Perubahan</button>
                </div>
            </form>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="alert alert-info">Tidak ada data preview pertandingan.</div>
    <?php endif; ?>
</div>