<?php
require_once 'config/config.php';
require_once 'class/Kategori.php';

$kategori = new Kategori();
$listKategori = [];

if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $listKategori = $kategori->searchKategori($_GET['q']);
} else {
    $listKategori = $kategori->getAllKategori();
}
?>

<div class="page-actions">
    <h2 class="page-title">Daftar Kategori</h2>
    <a href="view/add_kategori.php" class="btn btn-primary">+ Tambah Kategori</a>
</div>

<form method="GET" action="" class="search-bar">
    <input type="hidden" name="page" value="kategori">
    <input type="text" name="q" placeholder="Cari kategori..." class="search-input" value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
    <button type="submit" class="search-btn">Cari</button>
</form>

<?php if (isset($_GET['q'])): ?>
    <p>Hasil pencarian untuk: <strong><?= htmlspecialchars($_GET['q']) ?></strong></p>
<?php endif; ?>

<?php if (count($listKategori) > 0): ?>
<table class="data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Jumlah Pakaian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listKategori as $item): ?>
        <tr>
            <td><?= $item['id_kategori'] ?></td>
            <td><?= htmlspecialchars($item['nama_kategori']) ?></td>
            <td><?= htmlspecialchars($item['deskripsi']) ?></td>
            <td><?= $kategori->countPakaianInKategori($item['id_kategori']) ?> item</td>
            <td class="action-buttons">
                <a href="view/edit_kategori.php?id=<?= $item['id_kategori'] ?>" class="btn btn-update">✏️</a>
                <a href="view/delete_kategori.php?id=<?= $item['id_kategori'] ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus kategori ini?')">🗑️</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <div class="text-center mt-20 mb-20">
        <p>Tidak ada kategori yang ditemukan.</p>
    </div>
<?php endif; ?>