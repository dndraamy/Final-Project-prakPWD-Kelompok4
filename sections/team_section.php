<?php if (isset($_GET['error_msg'])): ?>
    <div style="padding: 10px; margin-left: 300px; background-color: #f8d7da; color: #842029; border: 1px solid #f5c2c7; margin-bottom: 15px;">
        <?= htmlspecialchars(urldecode($_GET['error_msg'])) ?>
    </div>
<?php endif; ?>

<?php if (isset($_GET['success_msg'])): ?>
    <div style="padding: 10px; margin-left: 300px; background-color: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; margin-bottom: 15px;">
        <?= htmlspecialchars(urldecode($_GET['success_msg'])) ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['pesan'])): ?>
    <div class="alert-container" style="margin-left: 260px; padding: 10px;">
        <?= $_SESSION['pesan'];
        unset($_SESSION['pesan']); ?>
    </div>
<?php endif; ?>

<div id="team" class="content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5>Manajemen Tim</h5>
        <button class="btn btn-primary" onclick="document.getElementById('team-form').style.display='block'">+ Tambah Tim Baru</button>
    </div>

    <div id="team-form" style="display: none;" class="mb-4">
        <form method="POST">
            <div class="mb-2">
                <label>Negara</label>
                <input type="text" class="form-control" name="nama_negara" required />
            </div>
            <div class="mb-2">
                <label>Pelatih</label>
                <input type="text" class="form-control" name="pelatih" required />
            </div>
            <div class="mb-2">
                <label>Stadion</label>
                <input type="text" class="form-control" name="nama_stadion" required />
            </div>
            <div class="mb-2">
                <label>Deskripsi</label>
                <input type="text" class="form-control" name="deskripsi" required />
            </div>
            <div class="mb-2">
                <label>URL Bendera</label>
                <input type="url" class="form-control" name="bendera" required />
            </div>
            <button type="submit" name="add_team" class="btn btn-success">Tambah Tim</button>
        </form>
    </div>

    <div class="container my-4">
        <div class="row">
            <?php
            $result->data_seek(0);
            if ($result && $result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
                    $negara = $row['nama_negara'];
            ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= $row['bendera'] ?>" class="card-img-top" style="height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-judul"><?= htmlspecialchars($row['nama_negara']) ?></h5>
                                <p class="card-text">Pelatih: <?= htmlspecialchars($row['pelatih']) ?></p>
                                <p class="card-text">Stadion: <?= htmlspecialchars($row['nama_stadion']) ?></p>
                                <a href="?section=team&edit_type=team&edit_id=<?= $row['id_negara'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="?section=team&delete_id=<?= $row['id_negara'] ?>" class="btn btn-danger btn-sm">Hapus Tim</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="alert alert-danger text-center mt-5" role="alert">
                    Data negara tidak ditemukan.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>