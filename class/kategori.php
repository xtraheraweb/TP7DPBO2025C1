<?php
require_once __DIR__ . '/../config/config.php';

class Kategori {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllKategori() {
        $stmt = $this->db->query("SELECT * FROM kategori");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getKategoriById($id_kategori) {
        $stmt = $this->db->prepare("SELECT * FROM kategori WHERE id_kategori = ?");
        $stmt->execute([$id_kategori]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateKategori($id_kategori, $nama_kategori, $deskripsi) {
        $stmt = $this->db->prepare("UPDATE kategori SET nama_kategori = ?, deskripsi = ? WHERE id_kategori = ?");
        return $stmt->execute([$nama_kategori, $deskripsi, $id_kategori]);
    }

    public function createKategori($nama_kategori, $deskripsi) {
        $stmt = $this->db->prepare("INSERT INTO kategori (nama_kategori, deskripsi) VALUES (?, ?)");
        return $stmt->execute([$nama_kategori, $deskripsi]);
    }

    public function deleteKategori($id_kategori) {
        $stmt = $this->db->prepare("DELETE FROM kategori WHERE id_kategori = ?");
        return $stmt->execute([$id_kategori]);
    }

    public function searchKategori($keyword) {
        $keyword = "%$keyword%";
        $stmt = $this->db->prepare("SELECT * FROM kategori WHERE nama_kategori LIKE ? OR deskripsi LIKE ?");
        $stmt->execute([$keyword, $keyword]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countPakaianInKategori($id_kategori) {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM pakaian WHERE id_kategori = ?");
        $stmt->execute([$id_kategori]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}