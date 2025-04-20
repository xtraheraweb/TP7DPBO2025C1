<?php
require_once '../config/config.php';
require_once '../class/Pemasok.php';

$pemasok = new Pemasok();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pemasok = $_POST['nama_pemasok'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    
    if ($pemasok->createPemasok($nama_pemasok, $alamat, $telepon, $email)) {
        header("Location: ../?page=pemasok&success=add");
        exit;
    } else {
        $error = "Gagal menambahkan pemasok";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pemasok - Fashion Hub</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
  
    <main>
        <div class="container">
            <div class="page-actions">
                <h2 class="page-title">Tambah Pemasok Baru</h2>
                <a href="../?page=pemasok" class="btn btn-secondary">Kembali</a>
            </div>
            
            <div class="content">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="nama_pemasok" class="form-label">Nama Pemasok</label>
                                <input type="text" id="nama_pemasok" name="nama_pemasok" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                        
                        <div class="form-col">
                            <div class="form-group">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input type="text" id="telepon" name="telepon" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mt-20">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="../?page=pemasok" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
   
</body>
</html>