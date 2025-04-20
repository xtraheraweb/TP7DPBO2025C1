<?php
require_once __DIR__ . '/../config/config.php';

class Pakaian {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllPakaian() {
        $stmt = $this->db->query("SELECT p.*, k.nama_kategori, s.nama_pemasok 
                                  FROM pakaian p 
                                  LEFT JOIN kategori k ON p.id_kategori = k.id_kategori 
                                  LEFT JOIN pemasok s ON p.id_pemasok = s.id_pemasok");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPakaianById($id_pakaian) {
        $stmt = $this->db->prepare("SELECT * FROM pakaian WHERE id_pakaian = ?");
        $stmt->execute([$id_pakaian]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePakaian($id_pakaian, $nama_pakaian, $id_kategori, $id_pemasok, $harga, $stok, $ukuran, $warna) {
        $stmt = $this->db->prepare("UPDATE pakaian SET nama_pakaian = ?, id_kategori = ?, id_pemasok = ?, harga = ?, stok = ?, ukuran = ?, warna = ? WHERE id_pakaian = ?");
        return $stmt->execute([$nama_pakaian, $id_kategori, $id_pemasok, $harga, $stok, $ukuran, $warna, $id_pakaian]);
    }

    public function createPakaian($nama_pakaian, $id_kategori, $id_pemasok, $harga, $stok, $ukuran, $warna) {
        $stmt = $this->db->prepare("INSERT INTO pakaian (nama_pakaian, id_kategori, id_pemasok, harga, stok, ukuran, warna) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$nama_pakaian, $id_kategori, $id_pemasok, $harga, $stok, $ukuran, $warna]);
    }

    public function deletePakaian($id_pakaian) {
        $stmt = $this->db->prepare("DELETE FROM pakaian WHERE id_pakaian = ?");
        return $stmt->execute([$id_pakaian]);
    }

    public function searchPakaian($keyword) {
        $keyword = "%$keyword%";
        $stmt = $this->db->prepare("SELECT p.*, k.nama_kategori, s.nama_pemasok 
                                   FROM pakaian p 
                                   LEFT JOIN kategori k ON p.id_kategori = k.id_kategori 
                                   LEFT JOIN pemasok s ON p.id_pemasok = s.id_pemasok 
                                   WHERE p.nama_pakaian LIKE ? OR k.nama_kategori LIKE ? OR s.nama_pemasok LIKE ? OR p.warna LIKE ?");
        $stmt->execute([$keyword, $keyword, $keyword, $keyword]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}