<?php
require_once '../config/config.php';
require_once '../class/Pemasok.php';

$pemasok = new Pemasok();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ../?page=pemasok&error=id_not_found");
    exit;
}

$id_pemasok = $_GET['id'];
$data = $pemasok->getPemasokById($id_pemasok);

if (!$data) {
    header("Location: ../?page=pemasok&error=data_not_found");
    exit;
}

// Check if there are any products from this supplier
$count = $pemasok->countPakaianByPemasok($id_pemasok);
if ($count > 0) {
    header("Location: ../?page=pemasok&error=supplier_has_products");
    exit;
}

if ($pemasok->deletePemasok($id_pemasok)) {
    header("Location: ../?page=pemasok&success=delete");
    exit;
} else {
    header("Location: ../?page=pemasok&error=delete_failed");
    exit;
}