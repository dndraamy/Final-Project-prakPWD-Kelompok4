<style>
    .tables-container {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .tables-container>div {
        flex: 1;
        min-width: 300px;
        background: #ffffff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 1px solid #e0e0e0;
    }

    .tables-container h5 {
        color: rgb(20, 102, 38);
        margin-bottom: 15px;
        padding-bottom: 8px;
        border-bottom: 2px solidrgb(144, 249, 151);
        font-weight: bold;
    }

    .tables-container table {
        width: 100%;
        border-collapse: collapse;
        color: #212121;
        font-size: 14px;
    }

    .tables-container th {
        background-color: rgb(227, 253, 235);
        color: rgb(0, 0, 0);
        padding: 10px 8px;
        text-align: center;
        font-weight: 600;
        border-bottom: 1px solid #bbdefb;
    }

    .tables-container td {
        padding: 10px 8px;
        text-align: center;
        border-bottom: 1px solid #f0f0f0;
    }

    .tables-container tr:nth-child(odd) {
        background-color: #fafafa;
    }

    .tables-container tr:nth-child(even) {
        background-color: #ffffff;
    }

    .tables-container tr:hover {
        background-color: #f1f8ff;
    }

    .tables-container .team-name {
        font-weight: bold;
        color: rgb(22, 120, 43);
        text-align: left;
        padding-left: 15px;
    }

    .tables-container .btn-sm {
        padding: 5px 10px;
        margin: 2px;
        font-size: 12px;
    }

    .tables-container td:last-child {
        font-weight: bold;
        color: #ef6c00;
    }

    .tables-container td:nth-last-child(2) {
        font-family: monospace;
        font-size: 14px;
    }
</style>

<div id="klasemen" class="content-section">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5>Edit Klasemen</h5>
        <button class="btn btn-primary" onclick="document.getElementById('klasemen-form').style.display='block'">+ Tambah Data Klasemen</button>
    </div>

    <!-- Form Tambah/Edit Data -->
    <div id="klasemen-form" style="display: <?= isset($_GET['edit']) ? 'block' : 'none' ?>;" class="mb-4">
        <form method="POST" class="card p-4">
            <input type="hidden" name="id" value="<?= $edit_data['id'] ?? 0 ?>">

            <div class="row g-3">
                <div class="col-md-2">
                    <label class="form-label">Grup</label>
                    <select name="grup" class="form-control" required>
                        <option value="A" <?= ($edit_data['grup'] ?? '') == 'A' ? 'selected' : '' ?>>A</option>
                        <option value="B" <?= ($edit_data['grup'] ?? '') == 'B' ? 'selected' : '' ?>>B</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Negara</label>
                    <select name="id_negara" class="form-control" required>
                        <option value="">Pilih Negara</option>
                        <?php
                        $daftar_negara->data_seek(0);
                        while ($negara = $daftar_negara->fetch_assoc()): ?>
                            <option value="<?= $negara['id_negara'] ?>"
                                <?= isset($edit_data['id_negara']) && $edit_data['id_negara'] == $negara['id_negara'] ? 'selected' : '' ?>>
                                <?= $negara['nama_negara'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="col-md-1">
                    <label class="form-label">Main</label>
                    <input type="number" name="main" class="form-control" value="<?= $edit_data['main'] ?? 0 ?>" required min="0">
                </div>

                <div class="col-md-1">
                    <label class="form-label">Menang</label>
                    <input type="number" name="menang" class="form-control" value="<?= $edit_data['menang'] ?? 0 ?>" required min="0">
                </div>

                <div class="col-md-1">
                    <label class="form-label">Seri</label>
                    <input type="number" name="seri" class="form-control" value="<?= $edit_data['seri'] ?? 0 ?>" required min="0">
                </div>

                <div class="col-md-1">
                    <label class="form-label">Kalah</label>
                    <input type="number" name="kalah" class="form-control" value="<?= $edit_data['kalah'] ?? 0 ?>" required min="0">
                </div>

                <div class="col-md-1">
                    <label class="form-label">GM</label>
                    <input type="number" name="goal_menang" class="form-control" value="<?= $edit_data['goal_menang'] ?? 0 ?>" required min="0">
                </div>

                <div class="col-md-1">
                    <label class="form-label">GK</label>
                    <input type="number" name="goal_kalah" class="form-control" value="<?= $edit_data['goal_kalah'] ?? 0 ?>" required min="0">
                </div>

                <div class="col-md-2 mt-4">
                    <button type="submit" class="btn btn-primary" name="update_klasemen">Simpan</button>
                    <?php if (isset($edit_data)): ?>
                        <a href="?section=klasemen" class="btn btn-secondary">Batal</a>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>

    <!-- Tabel Data Klasemen -->
    <div class="tables-container">
        <?php
        $sql = "SELECT k.*, n.nama_negara 
                    FROM klasemen k
                    JOIN negara n ON k.id_negara = n.id_negara
                    ORDER BY k.grup, k.poin DESC";
        $result = $koneksi->query($sql);

        $klasemen = [];
        while ($row = $result->fetch_assoc()) {
            $klasemen[$row['grup']][] = $row;
        }

        // Tampilkan untuk setiap grup
        foreach (['A', 'B'] as $grup) {
            if (isset($klasemen[$grup])) {
                echo '<div>
                        <h5>Grup ' . $grup . '</h5>
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Negara</th>
                                <th>M</th>
                                <th>M</th>
                                <th>S</th>
                                <th>K</th>
                                <th>Goal</th>
                                <th>Poin</th>
                                <th>Aksi</th>
                            </tr>';

                $no = 1;
                foreach ($klasemen[$grup] as $tim) {
                    echo '<tr>
                                <td>' . $no . '</td>
                                <td class="team-name">' . strtoupper($tim['nama_negara']) . '</td>
                                <td>' . $tim['main'] . '</td>
                                <td>' . $tim['menang'] . '</td>
                                <td>' . $tim['seri'] . '</td>
                                <td>' . $tim['kalah'] . '</td>
                                <td>' . $tim['goal_menang'] . '-' . $tim['goal_kalah'] . '</td>
                                <td>' . $tim['poin'] . '</td>
                                <td>
                                    <a href="?section=klasemen&edit=' . $tim['id'] . '" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="?section=klasemen&hapus=' . $tim['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin hapus?\')">Hapus</a>
                                </td>
                            </tr>';
                    $no++;
                }
                echo '</table>
                    </div>';
            }
        }
        ?>
    </div>
</div>