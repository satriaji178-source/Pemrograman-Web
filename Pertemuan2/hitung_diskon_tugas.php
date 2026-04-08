<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perhitungan Diskon - Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 mb-5">
        <h1 class="mb-4 text-center">Sistem Perhitungan Diskon Bertingkat</h1>
        
        <?php
        // 1. Data Input
        $nama_pembeli = "Budi Santoso";
        $judul_buku = "Laravel Advanced";
        $harga_satuan = 150000;
        $jumlah_beli = 4;
        $is_member = true; // true atau false
        
        // 2. Hitung subtotal
        $subtotal = $harga_satuan * $jumlah_beli;
        
        // 3. Tentukan persentase diskon berdasarkan jumlah buku
        if ($jumlah_beli > 10) {
            $persentase_diskon = 0.20; // 20%
        } elseif ($jumlah_beli >= 6) {
            $persentase_diskon = 0.15; // 15%
        } elseif ($jumlah_beli >= 3) {
            $persentase_diskon = 0.10; // 10%
        } else {
            $persentase_diskon = 0; // 0%
        }
        
        // 4. Hitung diskon kuantitas
        $diskon = $subtotal * $persentase_diskon;
        
        // 5. Total setelah diskon pertama
        $total_setelah_diskon1 = $subtotal - $diskon;
        
        // 6. Hitung diskon member (jika member) -> 5% dari total setelah diskon 1
        $diskon_member = 0;
        if ($is_member) {
            $diskon_member = $total_setelah_diskon1 * 0.05;
        }
        
        // 7. Total setelah semua diskon
        $total_setelah_diskon = $total_setelah_diskon1 - $diskon_member;
        
        // 8. Hitung PPN (11%)
        $ppn = $total_setelah_diskon * 0.11;
        
        // 9. Total akhir
        $total_akhir = $total_setelah_diskon + $ppn;
        
        // 10. Total penghematan
        $total_hemat = $diskon + $diskon_member;
        ?>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Nota Pembelian</h4>
                    </div>
                    <div class="card-body">
                        
                        <div class="mb-4">
                            <h5>Informasi Pelanggan</h5>
                            <p class="mb-1"><strong>Nama:</strong> <?= $nama_pembeli ?></p>
                            <p class="mb-1"><strong>Status:</strong> 
                                <?php if($is_member): ?>
                                    <span class="badge bg-success">Member</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Non-Member</span>
                                <?php endif; ?>
                            </p>
                        </div>

                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td width="50%"><strong>Judul Buku</strong></td>
                                    <td><?= $judul_buku ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Harga Satuan</strong></td>
                                    <td>Rp <?= number_format($harga_satuan, 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Jumlah Beli</strong></td>
                                    <td><?= $jumlah_beli ?> Buku</td>
                                </tr>
                                <tr>
                                    <td><strong>Subtotal</strong></td>
                                    <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Diskon Kuantitas (<?= $persentase_diskon * 100 ?>%)</strong></td>
                                    <td class="text-danger">- Rp <?= number_format($diskon, 0, ',', '.') ?></td>
                                </tr>
                                <?php if($is_member): ?>
                                <tr>
                                    <td><strong>Diskon Member (5%)</strong></td>
                                    <td class="text-danger">- Rp <?= number_format($diskon_member, 0, ',', '.') ?></td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <td><strong>Total Setelah Diskon</strong></td>
                                    <td>Rp <?= number_format($total_setelah_diskon, 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td><strong>PPN (11%)</strong></td>
                                    <td class="text-warning">+ Rp <?= number_format($ppn, 0, ',', '.') ?></td>
                                </tr>
                                <tr class="table-dark">
                                    <td><h5 class="mb-0 text-white">Total Akhir</h5></td>
                                    <td><h5 class="mb-0 text-white">Rp <?= number_format($total_akhir, 0, ',', '.') ?></h5></td>
                                </tr>
                            </tbody>
                        </table>

                        <?php if($total_hemat > 0): ?>
                        <div class="alert alert-success mt-3 mb-0" role="alert">
                            🎉 Selamat! Anda berhemat sebesar <strong>Rp <?= number_format($total_hemat, 0, ',', '.') ?></strong> pada transaksi ini.
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>