<?php
session_start(); // Diperlukan untuk fitur Recent Searches

// 1. DATA BUKU (15 Data Informatika)
$buku_list = [
    ['kode' => 'B001', 'judul' => 'Pemrograman PHP Modern', 'kategori' => 'Teknologi', 'pengarang' => 'Budi Raharjo', 'penerbit' => 'Informatika', 'tahun' => 2022, 'harga' => 150000, 'stok' => 15],
    ['kode' => 'B002', 'judul' => 'Belajar Laravel 10', 'kategori' => 'Teknologi', 'pengarang' => 'Andi Wijaya', 'penerbit' => 'Elex Media', 'tahun' => 2023, 'harga' => 185000, 'stok' => 5],
    ['kode' => 'B003', 'judul' => 'Clean Code', 'kategori' => 'Software Engineering', 'pengarang' => 'Robert C. Martin', 'penerbit' => 'Pearson', 'tahun' => 2008, 'harga' => 450000, 'stok' => 3],
    ['kode' => 'B004', 'judul' => 'Design Patterns', 'kategori' => 'Software Engineering', 'pengarang' => 'Erich Gamma', 'penerbit' => 'Addison-Wesley', 'tahun' => 1994, 'harga' => 550000, 'stok' => 4],
    ['kode' => 'B005', 'judul' => 'Introduction to Algorithms', 'kategori' => 'Computer Science', 'pengarang' => 'Thomas H. Cormen', 'penerbit' => 'MIT Press', 'tahun' => 2022, 'harga' => 1200000, 'stok' => 2],
    ['kode' => 'B006', 'judul' => 'The Pragmatic Programmer', 'kategori' => 'Software Engineering', 'pengarang' => 'Andrew Hunt', 'penerbit' => 'Addison-Wesley', 'tahun' => 2019, 'harga' => 420000, 'stok' => 6],
    ['kode' => 'B007', 'judul' => 'Don\'t Make Me Think', 'kategori' => 'UI/UX Design', 'pengarang' => 'Steve Krug', 'penerbit' => 'New Riders', 'tahun' => 2014, 'harga' => 320000, 'stok' => 8],
    ['kode' => 'B008', 'judul' => 'Mastering Python for Data Science', 'kategori' => 'Data Science', 'pengarang' => 'Samir Madhavan', 'penerbit' => 'Packt Publishing', 'tahun' => 2015, 'harga' => 275000, 'stok' => 10],
    ['kode' => 'B009', 'judul' => 'Docker: Up & Running', 'kategori' => 'DevOps', 'pengarang' => 'Karl Matthias', 'penerbit' => 'O\'Reilly', 'tahun' => 2018, 'harga' => 380000, 'stok' => 7],
    ['kode' => 'B010', 'judul' => 'Compilers', 'kategori' => 'Computer Science', 'pengarang' => 'Alfred V. Aho', 'penerbit' => 'Pearson', 'tahun' => 2006, 'harga' => 600000, 'stok' => 1],
    ['kode' => 'B011', 'judul' => 'Web Security for Developers', 'kategori' => 'Cyber Security', 'pengarang' => 'Malcolm McDonald', 'penerbit' => 'No Starch Press', 'tahun' => 2020, 'harga' => 310000, 'stok' => 9],
    ['kode' => 'B012', 'judul' => 'Clean Architecture', 'kategori' => 'Software Engineering', 'pengarang' => 'Robert C. Martin', 'penerbit' => 'Pearson', 'tahun' => 2017, 'harga' => 480000, 'stok' => 12],
    ['kode' => 'B013', 'judul' => 'System Design Interview', 'kategori' => 'Teknologi', 'pengarang' => 'Alex Xu', 'penerbit' => 'ByteByteGo', 'tahun' => 2020, 'harga' => 520000, 'stok' => 4],
    ['kode' => 'B014', 'judul' => 'Hands-On Machine Learning', 'kategori' => 'Data Science', 'pengarang' => 'Aurélien Géron', 'penerbit' => 'O\'Reilly', 'tahun' => 2019, 'harga' => 650000, 'stok' => 0],
    ['kode' => 'B015', 'judul' => 'Site Reliability Engineering', 'kategori' => 'DevOps', 'pengarang' => 'Betsy Beyer', 'penerbit' => 'Google', 'tahun' => 2016, 'harga' => 400000, 'stok' => 11],
];

// 2. AMBIL PARAMETER GET
$keyword   = $_GET['keyword'] ?? '';
$kategori  = $_GET['kategori'] ?? '';
$min_harga = $_GET['min_harga'] ?? '';
$max_harga = $_GET['max_harga'] ?? '';
$tahun     = $_GET['tahun'] ?? '';
$status    = $_GET['status'] ?? 'semua';
$sort      = $_GET['sort'] ?? 'judul';
$page      = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit     = 10; // Sesuai instruksi: 10 per halaman

// 3. VALIDASI INPUT
$errors = [];
if (!empty($min_harga) && !empty($max_harga) && $min_harga > $max_harga) {
    $errors[] = "Harga minimum tidak boleh lebih besar dari harga maksimum.";
}
if (!empty($tahun) && ($tahun < 1900 || $tahun > date("Y"))) {
    $errors[] = "Tahun harus valid (1900 - " . date("Y") . ").";
}

// 4. PROSES FILTER & SAVE SESSION
$hasil_filter = [];
if (empty($errors)) {
    foreach ($buku_list as $buku) {
        if ($keyword !== '' && stripos($buku['judul'], $keyword) === false && stripos($buku['pengarang'], $keyword) === false) continue;
        if ($kategori !== '' && $buku['kategori'] !== $kategori) continue;
        if ($min_harga !== '' && $buku['harga'] < (int)$min_harga) continue;
        if ($max_harga !== '' && $buku['harga'] > (int)$max_harga) continue;
        if ($tahun !== '' && $buku['tahun'] != $tahun) continue;
        if ($status === 'tersedia' && $buku['stok'] <= 0) continue;
        if ($status === 'habis' && $buku['stok'] > 0) continue;
        $hasil_filter[] = $buku;
    }

    // Simpan Recent Search ke Session
    if (!empty($keyword)) {
        if (!isset($_SESSION['recent_searches'])) $_SESSION['recent_searches'] = [];
        if (!in_array($keyword, $_SESSION['recent_searches'])) {
            array_unshift($_SESSION['recent_searches'], $keyword);
            $_SESSION['recent_searches'] = array_slice($_SESSION['recent_searches'], 0, 5);
        }
    }
}

// 5. PROSES EXPORT CSV (Dijalankan sebelum output HTML)
if (isset($_GET['export']) && $_GET['export'] == 'csv' && empty($errors)) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="hasil_pencarian_buku.csv"');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Kode', 'Judul', 'Kategori', 'Pengarang', 'Penerbit', 'Tahun', 'Harga', 'Stok']);
    foreach ($hasil_filter as $row) fputcsv($output, $row);
    fclose($output);
    exit;
}

// 6. PROSES SORTING
usort($hasil_filter, function($a, $b) use ($sort) {
    if ($sort == 'harga' || $sort == 'tahun') return $a[$sort] <=> $b[$sort];
    return strcasecmp($a[$sort], $b[$sort]);
});

// 7. PAGINATION DATA
$total_data = count($hasil_filter);
$total_halaman = ceil($total_data / $limit);
$offset = ($page - 1) * $limit;
$hasil_tampil = array_slice($hasil_filter, $offset, $limit);

// Fungsi Highlight
function highlightKeyword($text, $search) {
    if ($search === '') return $text;
    return preg_replace('/(' . preg_quote($search, '/') . ')/i', '<span class="bg-warning">$1</span>', $text);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pencarian Buku Lanjutan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="mb-4 text-center">Sistem Pencarian Buku Lanjutan</h2>

    <?php if(!empty($_SESSION['recent_searches'])): ?>
        <div class="mb-3">
            <small class="text-secondary">Pencarian Terakhir: </small>
            <?php foreach($_SESSION['recent_searches'] as $s): ?>
                <a href="?keyword=<?= urlencode($s) ?>" class="badge rounded-pill bg-secondary text-decoration-none"><?= htmlspecialchars($s) ?></a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form method="GET">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold">Kata Kunci</label>
                        <input type="text" name="keyword" class="form-control" placeholder="Judul/Pengarang..." value="<?= htmlspecialchars($keyword) ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold">Kategori</label>
                        <select name="kategori" class="form-select">
                            <option value="">Semua Kategori</option>
                            <?php 
                            $categories = array_unique(array_column($buku_list, 'kategori'));
                            foreach($categories as $cat): ?>
                                <option value="<?= $cat ?>" <?= $kategori == $cat ? 'selected' : '' ?>><?= $cat ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-bold">Min Harga</label>
                        <input type="number" name="min_harga" class="form-control" value="<?= htmlspecialchars($min_harga) ?>">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-bold">Max Harga</label>
                        <input type="number" name="max_harga" class="form-control" value="<?= htmlspecialchars($max_harga) ?>">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-bold">Urutkan</label>
                        <select name="sort" class="form-select">
                            <option value="kode" <?= $sort == 'kode' ? 'selected' : '' ?>>Kode</option>
                            <option value="judul" <?= $sort == 'judul' ? 'selected' : '' ?>>Judul (A-Z)</option>
                            <option value="harga" <?= $sort == 'harga' ? 'selected' : '' ?>>Harga Termurah</option>
                            <option value="tahun" <?= $sort == 'tahun' ? 'selected' : '' ?>>Tahun Terbit</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label small fw-bold d-block">Status</label>
                        <div class="mt-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="semua" <?= $status == 'semua' ? 'checked' : '' ?>>
                                <label class="form-check-label">Semua</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="tersedia" <?= $status == 'tersedia' ? 'checked' : '' ?>>
                                <label class="form-check-label">Tersedia</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="habis" <?= $status == 'habis' ? 'checked' : '' ?>>
                                <label class="form-check-label">Habis</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center border-top pt-3">
                        <button type="submit" class="btn btn-primary px-5">Cari Buku</button>
                        <a href="search_advance_tugas.php" class="btn btn-outline-secondary">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0"><?php foreach($errors as $err) echo "<li>$err</li>"; ?></ul>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5>Hasil: <span class="badge bg-info text-dark"><?= $total_data ?> Buku</span></h5>
        <?php if ($total_data > 0): ?>
            <a href="?<?= http_build_query(array_merge($_GET, ['export' => 'csv'])) ?>" class="btn btn-success btn-sm">Download CSV</a>
        <?php endif; ?>
    </div>

    <div class="table-responsive bg-white p-3 rounded shadow-sm">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Kode</th><th>Judul</th><th>Kategori</th><th>Pengarang</th>
                    <th>Tahun</th><th>Harga</th><th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($total_data > 0): ?>
                    <?php foreach($hasil_tampil as $b): ?>
                        <tr>
                            <td><?= $b['kode'] ?></td>
                            <td><?= highlightKeyword($b['judul'], $keyword) ?></td>
                            <td><?= $b['kategori'] ?></td>
                            <td><?= highlightKeyword($b['pengarang'], $keyword) ?></td>
                            <td><?= $b['tahun'] ?></td>
                            <td>Rp <?= number_format($b['harga'], 0, ',', '.') ?></td>
                            <td>
                                <span class="badge bg-<?= $b['stok'] > 0 ? 'success' : 'danger' ?>">
                                    <?= $b['stok'] > 0 ? $b['stok'] : 'Habis' ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" class="text-center py-4">Buku tidak ditemukan.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if ($total_halaman > 1): ?>
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <?php $qp = $_GET; ?>
                <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?<?= http_build_query(array_merge($qp, ['page' => $page - 1])) ?>">Previous</a>
                </li>
                <?php for($i = 1; $i <= $total_halaman; $i++): ?>
                    <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                        <a class="page-link" href="?<?= http_build_query(array_merge($qp, ['page' => $i])) ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?= ($page >= $total_halaman) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?<?= http_build_query(array_merge($qp, ['page' => $page + 1])) ?>">Next</a>
                </li>
            </ul>
        </nav>
        <?php endif; ?>
    </div>
</div>

</body>
</html>