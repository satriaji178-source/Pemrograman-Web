# PERPUSTAKAAN

Project studi kasus nyata sistem perpustakaan. Mata kuliah Pemrograman Web 2, menggunakan Bahasa pemrograman PHP, library Laravel, dan Database MySQL

## Tugas 1 (Pertemuan 6) : Eksplorasi Database dengan Query (40%)

### Dokumentasi Hasil Query (Screenshot)

#### 1 Statistik Buku (5 Query)

1.A Total jumlah buku aktif  
![1.A Total jumlah buku aktif](Dokumentasi%20P6//1.A.jpg)

1.B Total nilai inventaris buku aktif
![1.B Total nilai inventaris buku aktif](Dokumentasi%20P6/1.B.png)

1.C Rata-rata harga buku aktif  
![1.C Rata-rata harga buku aktif](Dokumentasi%20P6/1.C.png)

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

![ERD](ERD.jpg)

### Screenshot

#### Struktur semua tabel

1. Tabel anggota
   ![Tabel Anggota](SS_Tugas2_P6/Struktur%20Tabel/anggota.png)

2. Tabel buku  
   ![Tabel Buku](SS_Tugas2_P6/Struktur%20Tabel/buku.png)

3. Tabel kategori_buku
   ![Tabel Kategori](SS_Tugas2_P6/Struktur%20Tabel/kategori_buku.png)

4. Tabel penerbit  
   ![Tabel Penerbit](SS_Tugas2_P6/Struktur%20Tabel/penerbit.png)
5. Tabel transaksi
   ![Tabel transaksi](SS_Tugas2_P6/Struktur%20Tabel/transaksi.png)

#### Data di setiap tabel

1. Data tabel anggota  
   ![Data tabel anggota](SS_Tugas2_P6/Data%20Tabel/anggota.png)

2. Data tabel buku  
   ![Data tabel buku](SS_Tugas2_P6/Data%20Tabel/buku.png)

3. Data tabel kategori_buku  
   ![Data tabel kategori_buku](SS_Tugas2_P6/Data%20Tabel/kategori_buku.png)

4. Data tabel penerbit  
   ![Data tabel penerbit](SS_Tugas2_P6/Data%20Tabel/penerbit.png)

5. Data tabel transaksi  
   ![Data tabel transaksi](SS_Tugas2_P6/Data%20Tabel/transaksi.png)

#### Hasil query JOIN

1. Query JOIN 1
    ![JOIN 1](SS_Tugas2_P6/Hasil%20Query/join_1.png)

2. Query JOIN Jumlah Buku Per Kategori  
  ![Jumlah Buku Per Kategori](SS_Tugas2_P6/Hasil%20Query/jmlBuku_kategori.png)

3. Query JOIN Jumlah Buku Per Penerbit  
  ![Jumlah Buku Per Penerbit](SS_Tugas2_P6/Hasil%20Query/jmlBuku_penerbit.png)

4. Query JOIN Lengkap  
  ![JOIN lengkap](SS_Tugas2_P6/Hasil%20Query/join_lengkap.png)

