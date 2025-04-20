<?php
require_once '../config/config.php';
require_once '../class/Pakaian.php';

$pakaian = new Pakaian();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ../?page=pakaian&error=id_not_found");
    exit;
}

$id_pakaian = $_GET['id'];
$data = $pakaian->getPakaianById($id_pakaian);

if (!$data) {
    header("Location: ../?page=pakaian&error=data_not_found");
    exit;
}

if ($pakaian->deletePakaian($id_pakaian)) {
    header("Location: ../?page=pakaian&success=delete");
    exit;
} else {
    header("Location: ../?page=pakaian&error=delete_failed");
    exit;
}