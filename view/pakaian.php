<?php
// This file is already partially created in your documents
// Let me complete it with the missing table columns and actions

require_once 'config/config.php';
require_once 'class/Pakaian.php';
require_once 'class/Kategori.php';
require_once 'class/Pemasok.php';

$pakaian = new Pakaian();
$kategori = new Kategori();
$pemasok = new Pemasok();
$listPakaian = [];

if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $listPakaian = $pakaian->searchPakaian($_GET['q']);
} else {
    $listPakaian = $pakaian->getAllPakaian();
}
?>

<div class="page-actions">
    <h2 class="page-title">Daftar Pakaian</h2>
    <a href="view/add_pakaian.php" class="btn btn-primary">+ Tambah Pakaian</a>
</div>

<form method="GET" action="" class="search-bar">
    <input type="hidden" name="page" value="pakaian">
    <input type="text" name="q" placeholder="Cari nama pakaian, kategori, pemasok..." class="search-input" value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
    <button type="submit" class="search-btn"> Cari</button>
</form>

<?php if (isset($_GET['q'])): ?>
    <p>Hasil pencarian untuk: <strong><?= htmlspecialchars($_GET['q']) ?></strong></p>
<?php endif; ?>

<?php if (count($listPakaian) > 0): ?>
<table class="data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Pakaian</th>
            <th>Kategori</th>
            <th>Pemasok</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Ukuran</th>
            <th>Warna</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listPakaian as $item): ?>
        <tr>
            <td><?= $item['id_pakaian'] ?></td>
            <td><?= htmlspecialchars($item['nama_pakaian']) ?></td>
            <td><?= htmlspecialchars($item['nama_kategori']) ?></td>
            <td><?= htmlspecialchars($item['nama_pemasok']) ?></td>
            <td>Rp. <?= number_format($item['harga'], 0, ',', '.') ?></td>
            <td><?= $item['stok'] ?></td>
            <td><?= htmlspecialchars($item['ukuran']) ?></td>
            <td>
                <span style="display: inline-block; width: 15px; height: 15px; background-color: <?= htmlspecialchars($item['warna']) ?>; border: 1px solid #ccc; margin-right: 5px;"></span>
                <?= htmlspecialchars($item['warna']) ?>
            </td>
            <td class="action-buttons">
                <a href="view/edit_pakaian.php?id=<?= $item['id_pakaian'] ?>" class="btn btn-update">✏️</a>
                <a href="view/delete_pakaian.php?id=<?= $item['id_pakaian'] ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <div class="text-center mt-20 mb-20">
        <p>Tidak ada data pakaian yang ditemukan.</p>
    </div>
<?php endif; ?>