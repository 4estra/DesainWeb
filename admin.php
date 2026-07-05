<?php
session_start();
include 'koneksi.php';

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit();
}
if (isset($_POST['login'])) {
    if ($_POST['username'] == "4estra" && $_POST['password'] == "naulikeyou2") {
        $_SESSION['login'] = true;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Lensa.Abad</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
    body {
        background-color: #000;
    }

    .login-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .login-card {
        width: 100%;
        max-width: 400px;
    }

    .admin-container {
        max-width: 1100px;
        margin: auto;
    }
    </style>
</head>

<body>

    <?php if (!isset($_SESSION['login'])): ?>
    <div class="login-wrapper">
        <div class="card bg-dark text-light border-secondary login-card p-4 shadow">
            <h3 class="text-center mb-4 fw-light">Admin Login</h3>
            <?php if (isset($error))
                    echo "<div class='alert alert-danger py-2 text-center small'>$error</div>"; ?>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label text-secondary small">Username</label>
                    <input type="text" name="username" class="form-control bg-dark text-light border-secondary"
                        required>
                </div>
                <div class="mb-4">
                    <label class="form-label text-secondary small">Password</label>
                    <input type="password" name="password" class="form-control bg-dark text-light border-secondary"
                        required>
                </div>
                <button type="submit" name="login" class="btn btn-light w-100 fw-bold">Masuk</button>
            </form>
        </div>
    </div>
    <?php else: ?>
    <div class="container-fluid py-5 px-4 admin-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-light text-light">Manajemen Pesanan</h2>
            <a href="?logout" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>

        <?php
            if (isset($_POST['update_status'])) {
                $id = $_POST['id_pesanan'];
                $st = $_POST['status'];
                mysqli_query($conn, "UPDATE pesanan SET status = '$st' WHERE id = '$id'");
            }
            ?>

        <div class="card bg-dark border-secondary shadow">
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead class="table-active">
                        <tr>
                            <th style="width: 50px;">ID</th>
                            <th>Nama</th>
                            <th>Paket</th>
                            <th>Harga</th>
                            <th>No. WA</th>
                            <th>Tgl Pesan</th>
                            <th>Tgl Kerja</th>
                            <th>Status</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY id ASC");
                            while ($row = mysqli_fetch_assoc($query)) {
                                $paket = (!empty($row['paket'])) ? $row['paket'] : '-';
                                $harga = (!empty($row['harga'])) ? $row['harga'] : 0;
                                $tgl_kerja = (!empty($row['tgl_pengerjaan'])) ? $row['tgl_pengerjaan'] : '-';
                                ?>
                        <tr>
                            <td>#<?= $row['id']; ?></td>
                            <td><?= $row['nama_customer']; ?></td>
                            <td><?= $paket; ?></td>
                            <td>Rp <?= number_format($harga, 0, ',', '.'); ?></td>
                            <td><a href="https://wa.me/<?= $row['no_telp']; ?>" target="_blank"
                                    class="text-info"><?= $row['no_telp']; ?></a></td>
                            <td><?= $row['tgl_pesan']; ?></td>
                            <td><?= $tgl_kerja; ?></td>
                            <td>
                                <span
                                    class="badge <?= ($row['status'] == 'Selesai' ? 'bg-success' : 'bg-warning text-dark') ?>">
                                    <?= $row['status']; ?>
                                </span>
                            </td>
                            <td class="text-end">
                                <form method="POST" class="d-inline-flex gap-2">
                                    <input type="hidden" name="id_pesanan" value="<?= $row['id']; ?>">
                                    <select name="status"
                                        class="form-select form-select-sm bg-dark text-light border-secondary"
                                        style="width: 120px;">
                                        <option value="Menunggu"
                                            <?= ($row['status'] == 'Menunggu' ? 'selected' : '') ?>>
                                            Menunggu</option>
                                        <option value="Proses" <?= ($row['status'] == 'Proses' ? 'selected' : '') ?>>
                                            Proses
                                        </option>
                                        <option value="Selesai" <?= ($row['status'] == 'Selesai' ? 'selected' : '') ?>>
                                            Selesai</option>
                                    </select>
                                    <button type="submit" name="update_status"
                                        class="btn btn-sm btn-light">Update</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>
</body>

</html>