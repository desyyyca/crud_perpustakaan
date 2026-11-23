CREATE DATABASE IF NOT EXISTS perpustakaan;

USE perpustakaan;

CREATE TABLE IF NOT EXISTS buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_buku VARCHAR(20),
    judul_buku VARCHAR(100),
    stok INT,
    sinopsis TEXT,
    status_pinjam ENUM('Tersedia', 'Dipinjam'),
    kategori VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100),
    gambar VARCHAR(255)
);

INSERT INTO buku (kode_buku, judul_buku, stok, sinopsis, status_pinjam, kategori) VALUES
('02', 'Dia seorang vampir', 1, 'Solikah seorang vampir yang sedang pkl di sentana', 'Tersedia', 'Sejarah'),
('03', 'Laskar pelangi', 10, 'Mengisahkan perjuangan 10 anak dari keluarga kurang mampu di Pulau Belitung untuk tetap bisa bersekolah di SD Muhammadiyah yang nyaris ditutup.', 'Tersedia', 'Novel'),
('04', 'Bumi Manusia', 4, 'Berlatar era kolonial Belanda di Hindia Belanda, cerita berpusat pada Minke, seorang pribumi cerdas yang bersekolah di HBS', 'Dipinjam', 'Novel'),
('05', 'Matematika Kelas X', 10, 'Buku ini dirancang untuk memperkuat kemampuan penalaran kritis dan pemecahan masalah matematis siswa SMA/SMK Kelas X.', 'Dipinjam', 'Pelajaran');