--=========
--Tugas 2
--=========

--=======================
--Modifikasi tabel buku 
--=======================

-- Menghapus kolom lama
DROP COLUMN kategori,
DROP COLUMN penerbit,

-- Menambah kolom baru dengan tipe INT
ADD COLUMN id_kategori INT AFTER judul,
ADD COLUMN id_penerbit INT AFTER pengarang;

--Menambah relasi Foreign Key
ALTER TABLE buku
ADD CONSTRAINT fk_buku_kategori
  FOREIGN KEY (id_kategori) 
  REFERENCES kategori_buku(id_kategori)
  ON DELETE SET NULL
  ON UPDATE CASCADE,
ADD CONSTRAINT fk_buku_penerbit
  FOREIGN KEY (id_penerbit) 
  REFERENCES penerbit(id_penerbit)
  ON DELETE SET NULL
  ON UPDATE CASCADE;

--Data kategori
INSERT INTO kategori_buku (nama_kategori, deskripsi) VALUES
('Programming', 'Buku panduan bahasa pemrograman dan algoritma'),
('Database', 'Teknik perancangan dan manajemen basis data'),
('Web Design', 'Panduan desain antarmuka dan pengalaman pengguna'),
('Networking', 'Administrasi jaringan dan infrastruktur IT'),
('Cyber Security', 'Keamanan sistem informasi dan etika hacking');

--Data penerbit
INSERT INTO penerbit (nama_penerbit, alamat, telepon, email) VALUES
('Informatika Bandung', 'Jl. Buah Batu No. 12, Bandung', '022-7234567', 'info@informatika.id'),
('Elex Media Komputindo', 'Jl. Palmerah Barat, Jakarta', '021-5365011', 'kontak@elexmedia.id'),
('Andi Offset', 'Jl. Beo No. 38, Yogyakarta', '0274-561881', 'marketing@andipublisher.com'),
('Graha Ilmu', 'Ruko Jambusari No. 7, Yogyakarta', '0274-882262', 'info@grahailmu.co.id'),
('Penerbit Erlangga', 'Jl. H. Baping No. 100, Jakarta', '021-8717006', 'redaksi@erlangga.co.id');

--Data buku dengan relasi
INSERT INTO buku (kode_buku, judul, id_kategori, pengarang, id_penerbit, tahun_terbit, isbn, harga, stok, deskripsi) 
VALUES
('BK-001', 'Pemrograman PHP untuk Pemula', 1, 'Budi Raharjo', 1, 2023, '978-602-1234-56-1', 75000.00, 10, 'Buku panduan lengkap belajar PHP dari dasar'),
('BK-002', 'Mastering MySQL Database', 2, 'Andi Nugroho', 4, 2022, '978-602-1234-56-2', 95000.00, 5, 'Panduan administrasi dan optimasi MySQL'),
('BK-003', 'Laravel Framework Advanced', 1, 'Siti Aminah', 1, 2024, '978-602-1234-56-3', 125000.00, 8, 'Teknik advanced development dengan Laravel'),
('BK-004', 'Web Design Principles', 3, 'Dedi Santoso', 3, 2023, '978-602-1234-56-4', 85000.00, 15, 'Prinsip desain web modern'),
('BK-005', 'Network Security Fundamentals', 4, 'Rina Wijaya', 5, 2023, '978-602-1234-56-5', 110000.00, 3, 'Dasar-dasar keamanan jaringan komputer'),
('BK-006', 'PHP Web Services', 1, 'Budi Raharjo', 1, 2024, '978-602-1234-56-6', 90000.00, 12, 'Membangun RESTful API dengan PHP'),
('BK-007', 'PostgreSQL Advanced', 2, 'Ahmad Yani', 4, 2024, '978-602-1234-56-7', 115000.00, 7, 'Teknik advanced PostgreSQL'),
('BK-008', 'JavaScript Modern', 1, 'Siti Aminah', 1, 2023, '978-602-1234-56-8', 80000.00, 10, 'JavaScript ES6+ untuk web development'),
('BK-009', 'Data Science with Python', 1, 'Heri Kusnanto', 2, 2024, '978-602-1234-56-9', 145000.00, 10, 'Analisis data menggunakan Python'),
('BK-010', 'Advanced CSS Grid & Flexbox', 3, 'Dedi Santoso', 2, 2023, '978-602-1234-56-10', 75000.00, 12, 'Teknik layout web tingkat lanjut'),
('BK-011', 'Database Sharding Techniques', 2, 'Andi Nugroho', 4, 2024, '978-602-1234-56-11', 130000.00, 4, 'Skalabilitas database untuk Big Data'),
('BK-012', 'Ethical Hacking 101', 5, 'Yosef Murya', 1, 2024, '978-602-1234-56-12', 120000.00, 6, 'Dasar-dasar keamanan siber'),
('BK-013', 'Cloud Computing Infrastructure', 4, 'Rina Wijaya', 3, 2022, '978-602-1234-56-13', 155000.00, 5, 'Membangun infrastruktur cloud'),
('BK-014', 'UI Research Methodologies', 3, 'Nofriani Faisal', 5, 2023, '978-602-1234-56-14', 95000.00, 8, 'Metode riset untuk antarmuka pengguna'),
('BK-015', 'Django Framework Mastery', 1, 'Abdul Kadir', 3, 2024, '978-602-1234-56-15', 135000.00, 7, 'Membangun web dengan Django');

--========================
--QUERY YANG HARUS DIBUAT
--========================

--A. JOIN untuk tampilkan buku dengan nama kategori dan penerbit
SELECT 
    b.kode_buku, 
    b.judul, 
    k.nama_kategori, 
    p.nama_penerbit
FROM buku b
JOIN kategori_buku k ON b.id_kategori = k.id_kategori
JOIN penerbit p ON b.id_penerbit = p.id_penerbit;
--B. Jumlah buku per kategori
SELECT 
    k.nama_kategori, 
    COUNT(b.id_buku) AS jumlah_buku
FROM kategori_buku k
LEFT JOIN buku b ON k.id_kategori = b.id_kategori
GROUP BY k.nama_kategori;

--C. Jumlah buku per penerbit
SELECT 
    p.nama_penerbit, 
    COUNT(b.id_buku) AS jumlah_buku
FROM penerbit p
LEFT JOIN buku b ON p.id_penerbit = b.id_penerbit
GROUP BY p.nama_penerbit;

--D. Buku beserta detail lengkap (kategori + penerbit)
SELECT 
    b.kode_buku, 
    b.judul, 
    k.nama_kategori, 
    k.deskripsi AS deskripsi_kategori,
    b.pengarang, 
    p.nama_penerbit, 
    p.alamat AS alamat_penerbit,
    p.telepon AS telp_penerbit,
    b.tahun_terbit, 
    b.isbn, 
    b.harga, 
    b.stok, 
    b.deskripsi AS deskripsi_buku
FROM buku b
INNER JOIN kategori_buku k ON b.id_kategori = k.id_kategori
INNER JOIN penerbit p ON b.id_penerbit = p.id_penerbit
ORDER BY b.kode_buku ASC;