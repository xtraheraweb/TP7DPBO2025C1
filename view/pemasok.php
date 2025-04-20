<?php
require_once 'config/config.php';
require_once 'class/Pemasok.php';

$pemasok = new Pemasok();
$listPemasok = [];

if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $listPemasok = $pemasok->searchPemasok($_GET['q']);
} else {
    $listPemasok = $pemasok->getAllPemasok();
}
?>

<div class="page-actions">
    <h2 class="page-title">Daftar Pemasok</h2>
    <a href="view/add_pemasok.php" class="btn btn-primary">+ Tambah Pemasok</a>
</div>

<form method="GET" action="" class="search-bar">
    <input type="hidden" name="page" value="pemasok">
    <input type="text" name="q" placeholder="Cari nama pemasok, alamat, email..." class="search-input" value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
    <button type="submit" class="search-btn"> Cari</button>
</form>

<?php if (isset($_GET['q'])): ?>
    <p>Hasil pencarian untuk: <strong><?= htmlspecialchars($_GET['q']) ?></strong></p>
<?php endif; ?>

<?php if (count($listPemasok) > 0): ?>
<table class="data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Pemasok</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Jumlah Pakaian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listPemasok as $item): ?>
        <tr>
            <td><?= $item['id_pemasok'] ?></td>
            <td><?= htmlspecialchars($item['nama_pemasok']) ?></td>
            <td><?= htmlspecialchars($item['alamat']) ?></td>
            <td><?= htmlspecialchars($item['telepon']) ?></td>
            <td><?= htmlspecialchars($item['email']) ?></td>
            <td><?= $pemasok->countPakaianByPemasok($item['id_pemasok']) ?> item</td>
            <td class="action-buttons">
                <a href="view/edit_pemasok.php?id=<?= $item['id_pemasok'] ?>" class="btn btn-update">✏️</a>
                <a href="view/delete_pemasok.php?id=<?= $item['id_pemasok'] ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus pemasok ini?')">🗑️</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <div class="text-center mt-20 mb-20">
        <p>Tidak ada pemasok yang ditemukan.</p>
    </div>
<?php endif; ?>