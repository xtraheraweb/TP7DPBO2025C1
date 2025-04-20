<?php
require_once __DIR__ . '/../config/config.php';

class Pemasok {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllPemasok() {
        $stmt = $this->db->query("SELECT * FROM pemasok");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPemasokById($id_pemasok) {
        $stmt = $this->db->prepare("SELECT * FROM pemasok WHERE id_pemasok = ?");
        $stmt->execute([$id_pemasok]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePemasok($id_pemasok, $nama_pemasok, $alamat, $telepon, $email) {
        $stmt = $this->db->prepare("UPDATE pemasok SET nama_pemasok = ?, alamat = ?, telepon = ?, email = ? WHERE id_pemasok = ?");
        return $stmt->execute([$nama_pemasok, $alamat, $telepon, $email, $id_pemasok]);
    }

    public function createPemasok($nama_pemasok, $alamat, $telepon, $email) {
        $stmt = $this->db->prepare("INSERT INTO pemasok (nama_pemasok, alamat, telepon, email) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nama_pemasok, $alamat, $telepon, $email]);
    }

    public function deletePemasok($id_pemasok) {
        $stmt = $this->db->prepare("DELETE FROM pemasok WHERE id_pemasok = ?");
        return $stmt->execute([$id_pemasok]);
    }

    public function searchPemasok($keyword) {
        $keyword = "%$keyword%";
        $stmt = $this->db->prepare("SELECT * FROM pemasok WHERE nama_pemasok LIKE ? OR alamat LIKE ? OR email LIKE ?");
        $stmt->execute([$keyword, $keyword, $keyword]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countPakaianByPemasok($id_pemasok) {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM pakaian WHERE id_pemasok = ?");
        $stmt->execute([$id_pemasok]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}