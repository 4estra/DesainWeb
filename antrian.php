<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Antrian Pesanan - Lensa.Abad</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
    body {
        background-color: #000;
        color: #fff;
    }

    .antrian-container {
        max-width: 900px;
        margin: 50px auto;
    }
    </style>
</head>

<body>

    <div class="header">
        <img src="Images/LensaAbadTransparent2.png" alt="Logo">
        <ul class="navbar">
            <li><a href="index.html">Home</a></li>
            <li><a href="ourworks.html">Our Works</a></li>

            <li>
                <a href="#">Services ▾</a>
                <ul class="dropdown-menu-custom">
                    <li><a href="jasa.php">Paket Foto</a></li>
                    <li><a href="antrian.php">Cek Antrian</a></li>
                </ul>
            </li>

            <li>
                <a href="#">About ▾</a>
                <ul class="dropdown-menu-custom">
                    <li><a href="tentangkami.html">About Us</a></li>
                    <li><a href="kontak.html">Contact Us</a></li>
                    <li><a href="review.php">Reviews</a></li>
                    <li><a href="faq.html">FaQ</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="antrian-container">
        <h2 class="text-center mb-4 fw-light">Antrian Pesanan</h2>
        <div class="card bg-dark border-secondary shadow">
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead class="table-active">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Paket</th>
                            <th>Tgl Kerja</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY id ASC");
                        while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                        <tr>
                            <td>#<?= $row['id']; ?></td>
                            <td><?= $row['nama_customer']; ?></td>
                            <td><?= $row['paket']; ?></td>
                            <td><?= $row['tgl_pengerjaan']; ?></td>
                            <td>
                                <span
                                    class="badge <?= ($row['status'] == 'Selesai' ? 'bg-success' : 'bg-warning text-dark') ?>">
                                    <?= $row['status']; ?>
                                </span>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4 text-center">
            <a href="index.html" class="btn btn-outline-light">Kembali ke Home</a>
        </div>
    </div>
</body>

</html>