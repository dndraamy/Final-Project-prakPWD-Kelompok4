<div id="notifikasi" class="content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5>Notifikasi Pertandingan</h5>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_notification'])) {
        $judul = $_POST['judul'];
        $pesan = $_POST['pesan'];
        $id_pertandingan = $_POST['id_pertandingan'];

        // buat dapatin semua user yang aktifin notifikasi
        $sql_users = "SELECT id_user FROM users WHERE notifikasi = 1";
        $result_users = $koneksi->query($sql_users);

        $success = true;

        while ($user = mysqli_fetch_assoc($result_users)) {
            $id_user = $user['id_user'];
            $query = "INSERT INTO notifikasi (id_user, id_pertandingan, judul, pesan) 
              VALUES ($id_user, $id_pertandingan, '$judul', '$pesan')";

            if (!mysqli_query($koneksi, $query)) {
                $success = false;
            }
        }


        if ($success) {
            $_SESSION['pesan'] = '<div class="alert alert-success">Notifikasi berhasil dikirim ke pengguna!</div>';
        } else {
            $_SESSION['pesan'] = '<div class="alert alert-danger">Terjadi kesalahan saat mengirim notifikasi.</div>';
        }
        header("Location: ?section=notifikasi");
        exit();
    }
    ?>

    <?php if (isset($_SESSION['pesan'])): ?>
        <div class="alert-container">
            <?= $_SESSION['pesan'];
            unset($_SESSION['pesan']); ?>
        </div>
    <?php endif; ?>

    <div class="card p-4">
        <h5 class="mb-4">Kirim Notifikasi Popup ke Pengguna</h5>
        <form method="POST">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Notifikasi</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan Notifikasi</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="id_pertandingan" class="form-label">Pertandingan Terkait</label>
                <select class="form-select" id="id_pertandingan" name="id_pertandingan">
                    <option value="0">Tidak terkait pertandingan</option>
                    <?php
                    $sql_pertandingan = "SELECT id, team1, team2 FROM pertandingan ORDER BY tanggal DESC";
                    $result_pertandingan = $koneksi->query($sql_pertandingan);
                    while ($pertandingan = $result_pertandingan->fetch_assoc()):
                    ?>
                        <option value="<?= $pertandingan['id'] ?>">
                            <?= $pertandingan['team1'] ?> vs <?= $pertandingan['team2'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" name="send_notification" class="btn btn-primary">Kirim Notifikasi</button>
        </form>
    </div>
</div>