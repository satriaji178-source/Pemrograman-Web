# PERPUSTAKAAN

Project studi kasus nyata sistem perpustakaan. Mata kuliah Pemrograman Web 2, menggunakan Bahasa pemrograman PHP, library Laravel, dan Database MySQL

## Tugas 1 (Pertemuan 6) : Eksplorasi Database dengan Query (40%)

### Dokumentasi Hasil Query (Screenshot)

#### 1 Statistik Buku (5 Query)

1.A Total jumlah buku aktif  
![1.A Total jumlah buku aktif](Dokumentasi%20P6//1.A.jpg)

1.B Total nilai inventaris buku aktif
![1.B Total nilai inventaris buku aktif](Dokumentasi%20P6/1.B.jpg)

1.C Rata-rata harga buku aktif  
![1.C Rata-rata harga buku aktif](Dokumentasi%20P6/1.C.jpg)

1.D Buku termahal (judul dan harga)  
![1.D Buku termahal](Dokumentasi%20P6/1.D.jpg)

1.E Buku dengan stok terbanyak  
![1.E Buku dengan stok terbanyak](Dokumentasi%20P6/1.E.jpg)

#### 2 Filter dan Pencarian (5 Query)

2.A Buku kategori Programming dengan harga di bawah 100000  
![2.A Buku kategori Programming dengan harga di bawah 100000](Dokumentasi%20P6/2.A.jpg)

2.B Buku dengan judul mengandung kata PHP atau MySQL  
![2.B Buku dengan judul mengandung kata PHP atau MySQL](Dokumentasi%20P6/2.B.jpg)

2.C Buku terbit tahun 2024  
![2.C Buku terbit tahun 2024](Dokumentasi%20P6/2.C.jpg)

2.D Buku dengan stok antara 5 sampai 10  
![2.D Buku dengan stok antara 5 sampai 10](Dokumentasi%20P6/2.D.jpg)

2.E Buku oleh pengarang Budi Raharjo  
![2.E Buku oleh pengarang Budi Raharjo](Dokumentasi%20P6/2.E.jpg)

#### 3 Grouping dan Agregasi (3 Query)

3.A Jumlah judul buku dan total stok per kategori  
![3.A Jumlah judul buku dan total stok per kategori](Dokumentasi%20P6/3.A.jpg)

3.B Rata-rata harga buku per kategori  
![3.B Rata-rata harga buku per kategori](Dokumentasi%20P6/3.B.jpg)

3.C Kategori dengan total nilai inventaris terbesar  
![3.C Kategori dengan total nilai inventaris terbesar](Dokumentasi%20P6/3.C.jpg)

#### 4 Update Data (2 Query)

4.A Kenaikan harga buku kategori Programming sebesar 5%  
![4.A Kenaikan harga buku kategori Programming sebesar 5%](Dokumentasi%20P6/4.A.jpg)

4.B Penambahan stok 10 untuk buku dengan stok kurang dari 5  
![4.B Penambahan stok 10 untuk buku dengan stok kurang dari 5](Dokumentasi%20P6/4.B.jpg)

#### 5 Laporan Khusus (2 Query)

5.A Daftar buku yang perlu restocking (stok < 5)  
![5.A Daftar buku yang perlu restocking](Dokumentasi%20P6/5.A.jpg)

5.B 5 buku termahal dari buku aktif  
![5.B 5 buku termahal dari buku aktif](Dokumentasi%20P6/5.B.jpg)

## Tugas 2 (Pertemuan 6) : Desain Database Lengkap (60%)

### ERD

![ERD](Dokumentasi%20P6/ERD.jpg)

### Screenshot

#### Struktur semua tabel

1. Tabel anggota
   ![Tabel Anggota](Dokumentasi%20P6/Tabel_anggota.jpg)

2. Tabel buku  
   ![Tabel Buku](Dokumentasi%20P6/Tabel_buku.jpg)

3. Tabel kategori_buku
   ![Tabel Kategori](Dokumentasi%20P6/Tabel_kategoribuku.jpg)

4. Tabel penerbit  
   ![Tabel Penerbit](Dokumentasi%20P6/Tabel_penerbit.jpg)

5. Tabel transaksi
   ![Tabel transaksi](Dokumentasi%20P6/Tabel_transaksi.jpg)

#### Data di setiap tabel

1. Data tabel anggota  
   ![Data tabel anggota](Dokumentasi%20P6/Data_anggota.jpg)

2. Data tabel buku  
   ![Data tabel buku](Dokumentasi%20P6/Data_buku.jpg)

3. Data tabel kategori_buku  
   ![Data tabel kategori_buku](Dokumentasi%20P6/Data_kategori_buku.jpg)

4. Data tabel penerbit  
   ![Data tabel penerbit](Dokumentasi%20P6/Data_penerbit.jpg)

5. Data tabel transaksi  
   ![Data tabel transaksi](Dokumentasi%20P6/Data_transaksi.jpg)

#### Hasil query JOIN

1. Query JOIN 1
    ![JOIN 1](Dokumentasi%20P6/Query_JOIN1.jpg)

2. Query JOIN Jumlah Buku Per Kategori  
  ![Jumlah Buku Per Kategori](Dokumentasi%20P6/Q2.jpg)

3. Query JOIN Jumlah Buku Per Penerbit  
  ![Jumlah Buku Per Penerbit](Dokumentasi%20P6/Q3.jpg)

4. Query JOIN Lengkap  
  ![JOIN lengkap](Dokumentasi%20P6/Q4.jpg)

