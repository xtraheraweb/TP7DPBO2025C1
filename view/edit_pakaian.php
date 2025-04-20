<?php
require_once '../config/config.php';
require_once '../class/Pakaian.php';
require_once '../class/Kategori.php';
require_once '../class/Pemasok.php';

$pakaian = new Pakaian();
$kategori = new Kategori();
$pemasok = new Pemasok();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ../?page=pakaian&error=id_not_found");
    exit;
}

$id_pakaian = $_GET['id'];
$data_pakaian = $pakaian->getPakaianById($id_pakaian);

if (!$data_pakaian) {
    header("Location: ../?page=pakaian&error=data_not_found");
    exit;
}

$listKategori = $kategori->getAllKategori();
$listPemasok = $pemasok->getAllPemasok();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pakaian = $_POST['nama_pakaian'];
    $id_kategori = $_POST['id_kategori'];
    $id_pemasok = $_POST['id_pemasok'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $ukuran = $_POST['ukuran'];
    $warna = $_POST['warna'];
    
    if ($pakaian->updatePakaian($id_pakaian, $nama_pakaian, $id_kategori, $id_pemasok, $harga, $stok, $ukuran, $warna)) {
        header("Location: ../?page=pakaian&success=update");
        exit;
    } else {
        $error = "Gagal mengupdate data pakaian";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pakaian - Fashion Hub</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    
    <main>
        <div class="container">
            <div class="page-actions">
                <h2 class="page-title">Edit Pakaian</h2>
                <a href="../?page=pakaian" class="btn btn-secondary">Kembali</a>
            </div>
            
            <div class="content">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="nama_pakaian" class="form-label">Nama Pakaian</label>
                                <input type="text" id="nama_pakaian" name="nama_pakaian" class="form-control" value="<?= htmlspecialchars($data_pakaian['nama_pakaian']) ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="id_kategori" class="form-label">Kategori</label>
                                <select id="id_kategori" name="id_kategori" class="form-control" required>
                                    <?php foreach ($listKategori as $kat): ?>
                                        <option value="<?= $kat['id_kategori'] ?>" <?= ($data_pakaian['id_kategori'] == $kat['id_kategori']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($kat['nama_kategori']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="id_pemasok" class="form-label">Pemasok</label>
                                <select id="id_pemasok" name="id_pemasok" class="form-control" required>
                                    <?php foreach ($listPemasok as $pem): ?>
                                        <option value="<?= $pem['id_pemasok'] ?>" <?= ($data_pakaian['id_pemasok'] == $pem['id_pemasok']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($pem['nama_pemasok']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-col">
                            <div class="form-group">
                                <label for="harga" class="form-label">Harga (Rp)</label>
                                <input type="number" id="harga" name="harga" class="form-control" value="<?= $data_pakaian['harga'] ?>" min="0" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" id="stok" name="stok" class="form-control" value="<?= $data_pakaian['stok'] ?>" min="0" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="ukuran" class="form-label">Ukuran</label>
                                <select id="ukuran" name="ukuran" class="form-control" required>
                                    <option value="S" <?= ($data_pakaian['ukuran'] == 'S') ? 'selected' : '' ?>>S</option>
                                    <option value="M" <?= ($data_pakaian['ukuran'] == 'M') ? 'selected' : '' ?>>M</option>
                                    <option value="L" <?= ($data_pakaian['ukuran'] == 'L') ? 'selected' : '' ?>>L</option>
                                    <option value="XL" <?= ($data_pakaian['ukuran'] == 'XL') ? 'selected' : '' ?>>XL</option>
                                    <option value="XXL" <?= ($data_pakaian['ukuran'] == 'XXL') ? 'selected' : '' ?>>XXL</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="warna" class="form-label">Warna</label>
                                <input type="color" id="warna" name="warna" class="form-control" value="<?= $data_pakaian['warna'] ?>" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mt-20">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="../?page=pakaian" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
</body>
</html>