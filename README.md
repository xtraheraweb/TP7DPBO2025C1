# Sistem Manajemen Toko Baju

## JANJI
Saya Safira Aliyah Azmi dengan NIM 2309209 mengerjakan Tugas Praktikum 7 pada Mata Kuliah Desain dan Pemrograman Berorientasi Objek (DPBO) untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

## Desain Program

Program menggunakan tiga tabel utama yang saling terhubung:

### Tabel Kategori
- `id_kategori` (PK) - Primary Key
- `nama_kategori` - Nama kategori pakaian
- `deskripsi` - Deskripsi kategori
- `created_at` - Waktu pembuatan data
- `updated_at` - Waktu pembaruan data terakhir

### Tabel Pakaian
- `id_pakaian` (PK) - Primary Key
- `nama_pakaian` - Nama item pakaian
- `id_kategori` (FK) - Foreign Key ke tabel Kategori
- `id_pemasok` (FK) - Foreign Key ke tabel Pemasok
- `harga` - Harga jual pakaian
- `stok` - Jumlah stok tersedia
- `ukuran` - Ukuran pakaian
- `warna` - Warna pakaian
- `created_at` - Waktu pembuatan data
- `updated_at` - Waktu pembaruan data terakhir

### Tabel Pemasok
- `id_pemasok` (PK) - Primary Key
- `nama_pemasok` - Nama pemasok
- `alamat` - Alamat pemasok
- `telepon` - Nomor telepon kontak
- `email` - Alamat email pemasok
- `created_at` - Waktu pembuatan data
- `updated_at` - Waktu pembaruan data terakhir

## Entity Relationship Diagram (ERD)
Berikut adalah ERD yang menunjukkan hubungan antar entitas dalam sistem:

- Satu Kategori dapat memiliki banyak Pakaian (One-to-Many)
- Satu Pemasok dapat memasok banyak Pakaian (One-to-Many)


## Class Diagram
Program mengimplementasikan tiga kelas utama yang mewakili entitas-entitas dalam database:

### Kelas Kategori
#### Attributes:
- `id_kategori`
- `nama_kategori`
- `deskripsi`
- `created_at`
- `updated_at`

#### Methods:
- `getAllKategori()`
- `getKategoriById(id_kategori)`
- `updateKategori(id, nama, deskripsi)`
- `createKategori(nama, deskripsi)`
- `deleteKategori(id_kategori)`
- `searchKategori(keyword)`
- `countPakaianInKategori(id_kategori)`

### Kelas Pakaian
#### Attributes:
- `id_pakaian`
- `nama_pakaian`
- `id_kategori`
- `id_pemasok`
- `harga`
- `stok`
- `ukuran`
- `warna`
- `created_at`
- `updated_at`

#### Methods:
- `getAllPakaian()`
- `getPakaianById(id_pakaian)`
- `updatePakaian(id, nama, kategori, pemasok, harga, stok, ukuran, warna)`
- `createPakaian(nama, kategori, pemasok, harga, stok, ukuran, warna)`
- `deletePakaian(id_pakaian)`
- `searchPakaian(keyword)`
- `filterPakaianByKategori(id_kategori)`
- `filterPakaianByPemasok(id_pemasok)`

### Kelas Pemasok
#### Attributes:
- `id_pemasok`
- `nama_pemasok`
- `alamat`
- `telepon`
- `email`
- `created_at`
- `updated_at`

#### Methods:
- `getAllPemasok()`
- `getPemasokById(id_pemasok)`
- `updatePemasok(id, nama, alamat, telepon, email)`
- `createPemasok(nama, alamat, telepon, email)`
- `deletePemasok(id_pemasok)`
- `searchPemasok(keyword)`
- `countPakaianByPemasok(id_pemasok)`

## Alur Program

### 1. Alur Umum
1. Pengguna mengakses salah satu halaman terkait (Kategori, Pakaian, atau Pemasok)
2. Sistem menampilkan data sesuai dengan halaman yang dipilih
3. Pengguna dapat melakukan operasi CRUD pada data
4. Sistem memproses permintaan dan memberikan umpan balik kepada pengguna

### 2. Alur Menambah Data Baru
1. Pengguna memilih opsi "Tambah" pada halaman terkait
2. Sistem menampilkan form isian untuk data baru
3. Pengguna mengisi data yang diperlukan
4. Sistem melakukan validasi input
5. Jika valid, data disimpan ke database
6. Sistem memberikan konfirmasi berhasil dan menampilkan data terbaru

### 3. Alur Edit Data
1. Pengguna memilih opsi "Edit" pada data yang ingin diubah
2. Sistem menampilkan form dengan data yang sudah ada sebelumnya
3. Pengguna mengubah data sesuai kebutuhan
4. Sistem melakukan validasi input
5. Jika valid, data diperbarui dalam database
6. Sistem memberikan konfirmasi berhasil dan menampilkan data terbaru

### 4. Alur Hapus Data
1. Pengguna memilih opsi "Hapus" pada data yang ingin dihapus
2. Sistem menampilkan konfirmasi penghapusan
3. Jika pengguna mengkonfirmasi, sistem memeriksa dependensi data
4. Jika tidak ada kendala, data dihapus dari database
5. Sistem memberikan konfirmasi berhasil dan menampilkan data terbaru

### 5. Alur Pencarian Data
1. Pengguna memasukkan kata kunci di kolom pencarian
2. Sistem melakukan pencarian berdasarkan kata kunci
3. Sistem menampilkan hasil pencarian yang sesuai

## Dokumentasi Hasil
![Image](https://github.com/user-attachments/assets/c43ade8d-de8e-48af-bdc1-9a93edf94828)
![Image](https://github.com/user-attachments/assets/fb1b299b-7c5e-4dd4-ada9-d25cc1819028)
![Image](https://github.com/user-attachments/assets/0d76408d-45cc-4f68-91a7-e4a09635c0cd)
![Image](https://github.com/user-attachments/assets/e9a65de4-367a-491e-b741-36b39a2a5619)
![Image](https://github.com/user-attachments/assets/197f2682-20a6-4fce-9601-ec032593878f)
