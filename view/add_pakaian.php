<?php
require_once '../config/config.php';
require_once '../class/Pakaian.php';
require_once '../class/Kategori.php';
require_once '../class/Pemasok.php';

$pakaian = new Pakaian();
$kategori = new Kategori();
$pemasok = new Pemasok();

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
    
    if ($pakaian->createPakaian($nama_pakaian, $id_kategori, $id_pemasok, $harga, $stok, $ukuran, $warna)) {
        header("Location: ../?page=pakaian&success=add");
        exit;
    } else {
        $error = "Gagal menambahkan data pakaian";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pakaian - Fashion Hub</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
  
    <main>
        <div class="container">
            <div class="page-actions">
                <h2 class="page-title">Tambah Pakaian Baru</h2>
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
                                <input type="text" id="nama_pakaian" name="nama_pakaian" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="id_kategori" class="form-label">Kategori</label>
                                <select id="id_kategori" name="id_kategori" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($listKategori as $kat): ?>
                                        <option value="<?= $kat['id_kategori'] ?>"><?= htmlspecialchars($kat['nama_kategori']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="id_pemasok" class="form-label">Pemasok</label>
                                <select id="id_pemasok" name="id_pemasok" class="form-control" required>
                                    <option value="">Pilih Pemasok</option>
                                    <?php foreach ($listPemasok as $pem): ?>
                                        <option value="<?= $pem['id_pemasok'] ?>"><?= htmlspecialchars($pem['nama_pemasok']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-col">
                            <div class="form-group">
                                <label for="harga" class="form-label">Harga (Rp)</label>
                                <input type="number" id="harga" name="harga" class="form-control" min="0" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" id="stok" name="stok" class="form-control" min="0" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="ukuran" class="form-label">Ukuran</label>
                                <select id="ukuran" name="ukuran" class="form-control" required>
                                    <option value="">Pilih Ukuran</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="warna" class="form-label">Warna</label>
                                <input type="color" id="warna" name="warna" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mt-20">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="../?page=pakaian" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>
</html>