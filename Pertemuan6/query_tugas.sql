--===================
-- 1.STATISTIK BUKU
--===================

--A.Total buku seluruhnya
SELECT COUNT(*) AS total_buku
FROM buku

--B. Total nilai investasi 
SELECT SUM(harga * stok) AS total_nilai_inventaris
FROM buku

--C. Rata-rata harga buku
SELECT AVG(harga) AS rata_rata_harga
FROM buku

--D. Buku termahal
SELECT judul, harga
FROM buku
ORDER BY harga DESC
LIMIT 1;

--E. Buku dengan stok terbanyak
SELECT judul, stok
FROM buku
ORDER BY stok DESC
LIMIT 1;

--=========================
--2. Filter dan Pencarian
--=========================

--A. Semua buku kategori Programming yang harga < 100.000
SELECT * 
FROM buku
WHERE id_kategori = '1' AND harga < 100000;

--B. Buku yang judulnya mengandung kata PHP atau MySQL
SELECT *
FROM buku
WHERE judul LIKE '%PHP%' OR judul LIKE '%MySQL%';

--C. Buku yang terbitnya tahun 2024
SELECT *
FROM buku
WHERE tahun_terbit = 2024;

--D. Buku yang stoknya antara 5-10
SELECT *
FROM buku
WHERE stok BETWEEN 5 AND 10;

--E. Buku yang perngarangnya Budi Raharjo
SELECT *
FROM buku
WHERE pengarang = 'Budi Raharjo';

--==========================
--3. Grouping dan Agregasi
--==========================

--A. Jumlah buku per kategori dengan total stok per katergori
SELECT id_kategori, 
       COUNT(*) AS jumlah_judul, 
       SUM(stok) AS total_stok
FROM buku
GROUP BY id_kategori;

--B. Rata-rata harga per kategori
SELECT id_kategori, 
       AVG(harga) AS rata_rata_harga
FROM buku
GROUP BY id_kategori;

--C. Kategori dengan total nilai investaris terbesar
SELECT id_kategori, 
       SUM(harga * stok) AS total_nilai_inventaris --Nilai investaris dihitung dari harga dikali stok
FROM buku
GROUP BY id_kategori
ORDER BY total_nilai_inventaris DESC
LIMIT 1;

--================
--4. Update Data
--================

--A. Naikkan harga semua buku kategori Programming sebesar 5%
UPDATE buku
SET harga = harga * 1.05
WHERE id_kategori = '1';

--B. Tambahkan stok 10 untuk semua buku yang stoknya < 5
UPDATE buku
SET stok = stok + 10
WHERE stok < 5;

--==================
--5. Laporan khusus 
--==================

--A. Daftar buku yang perlu restocking (stok < 5)
SELECT judul, pengarang, stok 
FROM buku
WHERE stok < 5;

--B. Top 5 buku termahal
SELECT * FROM buku
ORDER BY harga DESC
LIMIT 5;