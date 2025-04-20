<?php
require_once '../config/config.php';
require_once '../class/Kategori.php';

$kategori = new Kategori();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ../?page=kategori&error=id_not_found");
    exit;
}

$id_kategori = $_GET['id'];
$data_kategori = $kategori->getKategoriById($id_kategori);

if (!$data_kategori) {
    header("Location: ../?page=kategori&error=data_not_found");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kategori = $_POST['nama_kategori'];
    $deskripsi = $_POST['deskripsi'];
    
    if ($kategori->updateKategori($id_kategori, $nama_kategori, $deskripsi)) {
        header("Location: ../?page=kategori&success=update");
        exit;
    } else {
        $error = "Gagal mengupdate kategori";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori - Fashion Hub</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    
    <main>
        <div class="container">
            <div class="page-actions">
                <h2 class="page-title">Edit Kategori</h2>
                <a href="../?page=kategori" class="btn btn-secondary">Kembali</a>
            </div>
            
            <div class="content">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" value="<?= htmlspecialchars($data_kategori['nama_kategori']) ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"><?= htmlspecialchars($data_kategori['deskripsi']) ?></textarea>
                    </div>
                    
                    <div class="form-group mt-20">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="../?page=kategori" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>