<?php
require_once '../config/config.php';
require_once '../class/Kategori.php';

$kategori = new Kategori();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ../?page=kategori&error=id_not_found");
    exit;
}

$id_kategori = $_GET['id'];
$data = $kategori->getKategoriById($id_kategori);

if (!$data) {
    header("Location: ../?page=kategori&error=data_not_found");
    exit;
}

// Check if there are any products in this category
$count = $kategori->countPakaianInKategori($id_kategori);
if ($count > 0) {
    header("Location: ../?page=kategori&error=category_has_products");
    exit;
}

if ($kategori->deleteKategori($id_kategori)) {
    header("Location: ../?page=kategori&success=delete");
    exit;
} else {
    header("Location: ../?page=kategori&error=delete_failed");
    exit;
}