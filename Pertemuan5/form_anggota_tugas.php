<?php
$errors = [];
$success_data = null;

// Logika pemrosesan form saat di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $telepon = trim($_POST['telepon']);
    $alamat = trim($_POST['alamat']);
    $gender = $_POST['gender'] ?? '';
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $pekerjaan = $_POST['pekerjaan'];

    // 1. Validasi Nama (min 3 karakter)
    if (empty($nama)) {
        $errors['nama'] = "Nama lengkap wajib diisi.";
    } elseif (strlen($nama) < 3) {
        $errors['nama'] = "Nama minimal 3 karakter.";
    }

    // 2. Validasi Email
    if (empty($email)) {
        $errors['email'] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    }

    // 3. Validasi Telepon (08xxxxxxxxxx, 10-13 digit)
    if (empty($telepon)) {
        $errors['telepon'] = "Nomor telepon wajib diisi.";
    } elseif (!preg_match("/^08[0-9]{8,11}$/", $telepon)) {
        $errors['telepon'] = "Format telepon salah (08xxxxxxxxxx, 10-13 digit).";
    }

    // 4. Validasi Alamat (min 10 karakter)
    if (empty($alamat)) {
        $errors['alamat'] = "Alamat wajib diisi.";
    } elseif (strlen($alamat) < 10) {
        $errors['alamat'] = "Alamat minimal 10 karakter.";
    }

    // 5. Validasi Jenis Kelamin
    if (empty($gender)) {
        $errors['gender'] = "Pilih jenis kelamin.";
    }

    // 6. Validasi Tanggal Lahir (Umur min 10 tahun)
    if (empty($tanggal_lahir)) {
        $errors['tanggal_lahir'] = "Tanggal lahir wajib diisi.";
    } else {
        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;
        if ($age < 10) {
            $errors['tanggal_lahir'] = "Umur minimal 10 tahun.";
        }
    }

    // 7. Validasi Pekerjaan
    if (empty($pekerjaan)) {
        $errors['pekerjaan'] = "Pilih pekerjaan.";
    }

    // Jika tidak ada error, tampilkan data
    if (empty($errors)) {
        $success_data = [
            'Nama' => $nama,
            'Email' => $email,
            'Telepon' => $telepon,
            'Alamat' => $alamat,
            'Gender' => $gender,
            'Tanggal Lahir' => $tanggal_lahir,
            'Pekerjaan' => $pekerjaan
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Anggota Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; padding-top: 50px; }
        .container { max-width: 600px; }
    </style>
</head>
<body>

<div class="container mb-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0 text-center">Form Registrasi Anggota</h4>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control <?= isset($errors['nama']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>">
                    <div class="invalid-feedback"><?= $errors['nama'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                    <div class="invalid-feedback"><?= $errors['email'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Telepon (08xxxxxxxxxx)</label>
                    <input type="text" name="telepon" class="form-control <?= isset($errors['telepon']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($_POST['telepon'] ?? '') ?>">
                    <div class="invalid-feedback"><?= $errors['telepon'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" rows="3" class="form-control <?= isset($errors['alamat']) ? 'is-invalid' : '' ?>"><?= htmlspecialchars($_POST['alamat'] ?? '') ?></textarea>
                    <div class="invalid-feedback"><?= $errors['alamat'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Jenis Kelamin</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input <?= isset($errors['gender']) ? 'is-invalid' : '' ?>" type="radio" name="gender" value="Laki-laki" <?= (isset($_POST['gender']) && $_POST['gender'] == 'Laki-laki') ? 'checked' : '' ?>>
                        <label class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input <?= isset($errors['gender']) ? 'is-invalid' : '' ?>" type="radio" name="gender" value="Perempuan" <?= (isset($_POST['gender']) && $_POST['gender'] == 'Perempuan') ? 'checked' : '' ?>>
                        <label class="form-check-label">Perempuan</label>
                    </div>
                    <?php if(isset($errors['gender'])): ?>
                        <div class="text-danger small mt-1"><?= $errors['gender'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control <?= isset($errors['tanggal_lahir']) ? 'is-invalid' : '' ?>" value="<?= htmlspecialchars($_POST['tanggal_lahir'] ?? '') ?>">
                    <div class="invalid-feedback"><?= $errors['tanggal_lahir'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pekerjaan</label>
                    <select name="pekerjaan" class="form-select <?= isset($errors['pekerjaan']) ? 'is-invalid' : '' ?>">
                        <option value="">-- Pilih Pekerjaan --</option>
                        <option value="Pelajar" <?= (isset($_POST['pekerjaan']) && $_POST['pekerjaan'] == 'Pelajar') ? 'selected' : '' ?>>Pelajar</option>
                        <option value="Mahasiswa" <?= (isset($_POST['pekerjaan']) && $_POST['pekerjaan'] == 'Mahasiswa') ? 'selected' : '' ?>>Mahasiswa</option>
                        <option value="Pegawai" <?= (isset($_POST['pekerjaan']) && $_POST['pekerjaan'] == 'Pegawai') ? 'selected' : '' ?>>Pegawai</option>
                        <option value="Lainnya" <?= (isset($_POST['pekerjaan']) && $_POST['pekerjaan'] == 'Lainnya') ? 'selected' : '' ?>>Lainnya</option>
                    </select>
                    <div class="invalid-feedback"><?= $errors['pekerjaan'] ?? '' ?></div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
            </form>
        </div>
    </div>

    <?php if ($success_data): ?>
        <div class="mt-4">
            <div class="alert alert-success">Registrasi Berhasil!</div>
            <div class="card border-success">
                <div class="card-header bg-success text-white">Data Anggota Baru</div>
                <div class="card-body">
                    <table class="table table-sm table-borderless mb-0">
                        <?php foreach ($success_data as $key => $val): ?>
                            <tr>
                                <th width="150"><?= $key ?></th>
                                <td>: <?= htmlspecialchars($val) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

</body>
</html>