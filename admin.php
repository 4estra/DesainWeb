<?php
include 'koneksi.php';

if (isset($_POST['update_status'])) {
    $id_pesanan = $_POST['id_pesanan'];
    $status_baru = $_POST['status'];
    mysqli_query($conn, "UPDATE pesanan SET status = '$status_baru' WHERE id = '$id_pesanan'");
    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Lensa.Abad</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body class="bg-black text-light">

    <div class="container py-5">
        <h2 class="mb-4 text-center fw-light">Manajemen Pesanan</h2>

        <div class="card bg-dark border-secondary shadow">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-dark table-hover table-bordered mb-0">
                        <thead class="table-active border-secondary text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nama Customer</th>
                                <th>No. WA</th>
                                <th>Paket Jasa</th>
                                <th>Bukti Bayar</th>
                                <th>Status Pengerjaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php
                            // Ambil data pesanan digabung sama nama jasanya
                            $query = mysqli_query($conn, "SELECT p.*, j.nama_jasa FROM pesanan p JOIN jasa j ON p.jasa_id = j.id ORDER BY p.id DESC");

                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $badge_color = 'bg-secondary';
                                    if ($row['status'] == 'Proses')
                                        $badge_color = 'bg-warning text-dark';
                                    if ($row['status'] == 'Selesai')
                                        $badge_color = 'bg-success';

                                    echo "<tr>
                                        <td class='text-center'>#{$row['id']}</td>
                                        <td>{$row['nama_customer']}</td>
                                        <td><a href='https://wa.me/{$row['no_telp']}' target='_blank' class='text-info'>{$row['no_telp']}</a></td>
                                        <td>{$row['nama_jasa']}</td>
                                        <td class='text-center'>";
                                    if (!empty($row['bukti_bayar'])) {
                                        echo "<a href='uploads/{$row['bukti_bayar']}' target='_blank' class='btn btn-sm btn-outline-info'>Lihat Bukti</a>";
                                    } else {
                                        echo "<span class='text-danger small'>Belum Upload</span>";
                                    }
                                    echo "</td>
                                        <td class='text-center'><span class='badge {$badge_color}'>{$row['status']}</span></td>
                                        <td>
                                            <form method='POST' class='d-flex gap-2'>
                                                <input type='hidden' name='id_pesanan' value='{$row['id']}'>
                                                <select name='status' class='form-select form-select-sm bg-dark text-light border-secondary'>
                                                    <option value='Menunggu' " . ($row['status'] == 'Menunggu' ? 'selected' : '') . ">Menunggu</option>
                                                    <option value='Proses' " . ($row['status'] == 'Proses' ? 'selected' : '') . ">Proses</option>
                                                    <option value='Selesai' " . ($row['status'] == 'Selesai' ? 'selected' : '') . ">Selesai</option>
                                                </select>
                                                <button type='submit' name='update_status' class='btn btn-sm btn-light'>Update</button>
                                            </form>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center py-4 text-secondary'>Belum ada pesanan masuk.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>