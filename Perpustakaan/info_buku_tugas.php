<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Info Buku - Perpustakaan</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="mb-4 text-center">Informasi Buku Tugas</h1>

            <?php
            // Data Buku
            $judul1 = "Mastering SQL & PostgreSQL";
            $kategori1 = "Database";
            $pengarang1 = "Siti Aminah";
            $penerbit1 = "Andi Offset";
            $tahun_terbit1 = 2024;
            $harga1 = 110000;
            $stok1 = 15;
            $isbn1 = "978-602-123-456-7";
            $bahasa1 = "Indonesia";
            $jumlah_halaman1 = 320;
            $berat_buku1 = 400;

            $judul2 = "Python for Data Science";
            $kategori2 = "Pemrograman";
            $pengarang2 = "Alex Wijaya";
            $penerbit2 = "Elex Media";
            $tahun_terbit2 = 2023;
            $harga2 = 145000;
            $stok2 = 5;
            $isbn2 = "978-623-987-654-3";
            $bahasa2 = "Inggris";
            $jumlah_halaman2 = 450;
            $berat_buku2 = 550;

            $judul3 = "Modern UI/UX Design with Figma";
            $kategori3 = "Web Design";
            $pengarang3 = "Rian Pratama";
            $penerbit3 = "Media Kita";
            $tahun_terbit3 = 2025;
            $harga3 = 95000;
            $stok3 = 12;
            $isbn3 = "978-602-555-888-0";
            $bahasa3 = "Indonesia";
            $jumlah_halaman3 = 210;
            $berat_buku3 = 300;
            ?>

            <div class="row">
                
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><?php echo $kategori1; ?></h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bonderless">
                                <tr><th width="140">Judul</th><td>: <?php echo $judul1; ?></td></tr>
                                <tr><th>Pengarang</th><td>: <?php echo $pengarang1; ?></td></tr>
                                <tr><th>Penerbit</th><td>: <?php echo $penerbit1; ?></td></tr>
                                <tr><th>Tahun Terbit</th><td>: <?php echo $tahun_terbit1; ?></td></tr>
                                <tr><th>Harga</th><td>: Rp <?php echo number_format($harga1, 0, ',','.'); ?></td></tr>
                                <tr><th>Stok</th><td>: <?php echo $stok1; ?></td></tr>
                                <tr><th>ISBN</th><td>: <?php echo $isbn1; ?></td></tr>
                                <tr><th>Bahasa</th><td>: <?php echo $bahasa1; ?></td></tr>
                                <tr><th>Halaman</th><td>: <?php echo $jumlah_halaman1; ?></td></tr>
                                <tr><th>Berat Buku</th><td>: <?php echo $berat_buku1; ?>g</td></tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0"><?php echo $kategori2; ?></h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bonderless">
                                <tr><th width="140">Judul</th><td>: <?php echo $judul2; ?></td></tr>
                                <tr><th>Pengarang</th><td>: <?php echo $pengarang2; ?></td></tr>
                                <tr><th>Penerbit</th><td>: <?php echo $penerbit2; ?></td></tr>
                                <tr><th>Tahun Terbit</th><td>: <?php echo $tahun_terbit2; ?></td></tr>
                                <tr><th>Harga</th><td>: Rp <?php echo number_format($harga2, 0, ',','.'); ?></td></tr>
                                <tr><th>Stok</th><td>: <?php echo $stok2; ?></td></tr>
                                <tr><th>ISBN</th><td>: <?php echo $isbn2; ?></td></tr>
                                <tr><th>Bahasa</th><td>: <?php echo $bahasa2; ?></td></tr>
                                <tr><th>Halaman</th><td>: <?php echo $jumlah_halaman2; ?></td></tr>
                                <tr><th>Berat Buku</th><td>: <?php echo $berat_buku2; ?>g</td></tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-warning text-dark">
                            <h5 class="mb-0"><?php echo $kategori3; ?></h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bonderless">
                                <tr><th width="140">Judul</th><td>: <?php echo $judul3; ?></td></tr>
                                <tr><th>Pengarang</th><td>: <?php echo $pengarang3; ?></td></tr>
                                <tr><th>Penerbit</th><td>: <?php echo $penerbit3; ?></td></tr>
                                <tr><th>Tahun Terbit</th><td>: <?php echo $tahun_terbit3; ?></td></tr>
                                <tr><th>Harga</th><td>: Rp <?php echo number_format($harga3, 0, ',','.'); ?></td></tr>
                                <tr><th>Stok</th><td>: <?php echo $stok3; ?></td></tr>
                                <tr><th>ISBN</th><td>: <?php echo $isbn3; ?></td></tr>
                                <tr><th>Bahasa</th><td>: <?php echo $bahasa3; ?></td></tr>
                                <tr><th>Halaman</th><td>: <?php echo $jumlah_halaman3; ?></td></tr>
                                <tr><th>Berat Buku</th><td>: <?php echo $berat_buku3; ?>g</td></tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div> </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>