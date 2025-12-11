<?php
$db = new Database();
$data = $db->query("SELECT * FROM artikel");
?>

<div class="cards">
  <div class="card">
    <h3>Total Artikel</h3>
    <p><?= $data->num_rows ?? 0 ?> item</p>
  </div>

  <div class="card">
    <h3>Aksi Cepat</h3>
    <p><a class="btn btn-primary" href="/projects/lab11_php_oop/artikel/tambah">+ Tambah Artikel</a></p>
  </div>
</div>

<div class="table-wrap fade-in">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Keterangan</th>
        <th style="width:150px">Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php while ($row = $data->fetch_assoc()) : ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['judul']) ?></td>
          <td><?= htmlspecialchars(substr($row['keterangan'],0,120)) ?>...</td>

          <td style="display:flex; gap:6px;">
            <a class="btn btn-ghost" href="/projects/lab11_php_oop/artikel/ubah?id=<?= $row['id'] ?>">Ubah</a>

            <!-- Tombol Hapus trigger modal -->
            <a class="btn btn-ghost delete-btn" href="#delete-<?= $row['id'] ?>">Hapus</a>

            <!-- MODAL (CSS ONLY) -->
            <div class="modal" id="delete-<?= $row['id'] ?>">
              <div class="modal-content">
                <h3>Hapus Artikel?</h3>
                <p>Yakin ingin menghapus artikel <b><?= htmlspecialchars($row['judul']) ?></b>?</p>

                <div class="modal-actions">
                    <a class="btn btn-primary" href="/projects/lab11_php_oop/artikel/hapus?id=<?= $row['id'] ?>">Ya, Hapus</a>
                    <a class="btn btn-ghost" href="#">Batal</a>
                </div>
              </div>
            </div>

          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
