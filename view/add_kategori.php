<?php
require_once '../config/config.php';
require_once '../class/Kategori.php';

$kategori = new Kategori();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kategori = $_POST['nama_kategori'];
    $deskripsi = $_POST['deskripsi'];
    
    if ($kategori->createKategori($nama_kategori, $deskripsi)) {
        header("Location: ../?page=kategori&success=add");
        exit;
    } else {
        $error = "Gagal menambahkan kategori";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori - Fashion Hub</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    
    <main>
        <div class="container">
            <div class="page-actions">
                <h2 class="page-title">Tambah Kategori Baru</h2>
                <a href="../?page=kategori" class="btn btn-secondary">Kembali</a>
            </div>
            
            <div class="content">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"></textarea>
                    </div>
                    
                    <div class="form-group mt-20">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="../?page=kategori" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>
</html>