<?php
require_once 'class/Pakaian.php';
require_once 'class/Kategori.php';
require_once 'class/Pemasok.php';

$pakaian = new Pakaian();
$kategori = new Kategori();
$pemasok = new Pemasok();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Hub - Sistem Manajemen Toko Baju</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <main>
        <div class="dashboard">
            <div class="dashboard-card">
                <h3>Pakaian</h3>
                <p><?= count($pakaian->getAllPakaian()) ?> items</p>
                <a href="?page=pakaian" class="btn btn-primary">Kelola</a>
            </div>
            <div class="dashboard-card">
                <h3>Kategori</h3>
                <p><?= count($kategori->getAllKategori()) ?> kategori</p>
                <a href="?page=kategori" class="btn btn-primary">Kelola</a>
            </div>
            <div class="dashboard-card">
                <h3>Pemasok</h3>
                <p><?= count($pemasok->getAllPemasok()) ?> pemasok</p>
                <a href="?page=pemasok" class="btn btn-primary">Kelola</a>
            </div>
        </div>

        <nav class="main-nav">
            <a href="?page=pakaian" class="nav-item <?= (!isset($_GET['page']) || $_GET['page'] == 'pakaian') ? 'active' : '' ?>">
                Daftar Pakaian
            </a>
            <a href="?page=kategori" class="nav-item <?= (isset($_GET['page']) && $_GET['page'] == 'kategori') ? 'active' : '' ?>">
               Daftar Kategori
            </a>
            <a href="?page=pemasok" class="nav-item <?= (isset($_GET['page']) && $_GET['page'] == 'pemasok') ? 'active' : '' ?>">
                Daftar Pemasok
            </a>
        </nav>

        <div class="content">
            <?php
            if (!isset($_GET['page']) || $_GET['page'] == 'pakaian') {
                include 'view/pakaian.php';
            } elseif ($_GET['page'] == 'kategori') {
                include 'view/kategori.php';
            } elseif ($_GET['page'] == 'pemasok') {
                include 'view/pemasok.php';
            }
            ?>
        </div>
    </main>
    
    <?php include 'footer.php'; ?>
</body>
</html>