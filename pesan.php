<?php include 'koneksi.php';
$id_jasa = $_GET['id'];
$jasa = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM jasa WHERE id = '$id_jasa'"));

if (isset($_POST['pesan'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    // Ganti email jadi no_telp
    $no_telp = mysqli_real_escape_string($conn, $_POST['no_telp']);
    $total = $jasa['harga'];

    // Update query INSERT-nya
    mysqli_query($conn, "INSERT INTO pesanan (nama_customer, no_telp, jasa_id, total_bayar) VALUES ('$nama', '$no_telp', '$id_jasa', '$total')");
    $id_transaksi = mysqli_insert_id($conn);
    header("Location: upload_bukti.php?id=$id_transaksi");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan - <?php echo $jasa['nama_jasa']; ?></title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-black text-light">

    <div class="header">
        <img src="Images/LensaAbadTransparent2.png" alt="Logo">
        <ul class="navbar">
            <li><a href="index.html">Home</a></li>
            <li><a href="ourworks.html">Our Works</a></li>
            <li><a href="jasa.php">Our Services</a></li>
            <li><a href="kontak.html">Contact Us</a></li>
            <li><a href="tentangkami.html">About Us</a></li>
            <li><a href="review.php">Review</a></li>
            <li><a href="faq.html">FaQ</a></li>
        </ul>
    </div>

    <div class="container py-5 mx-auto" style="max-width: 500px;">
        <a href="jasa.php" class="text-secondary text-decoration-none mb-3 d-block text-center">&larr; Kembali ke Daftar
            Jasa</a>

        <h2 class="mb-4 text-center">Pesan Paket: <span class="text-light"><?php echo $jasa['nama_jasa']; ?></span></h2>

        <div class="card bg-dark border-secondary shadow">
            <div class="card-body p-4">
                <form method="POST">
                    <div class="mb-3">
                        <label class="text-secondary mb-1 small">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control bg-dark text-light border-secondary"
                            placeholder="Masukkan nama kamu di sini..." required>
                    </div>
                    <div class="mb-3">
                        <label class="text-secondary mb-1 small">Nomor WhatsApp</label>
                        <input type="number" name="no_telp" class="form-control bg-dark text-light border-secondary"
                            placeholder="Contoh: 081234567890" required>
                    </div>
                    <div class="mb-4 text-center mt-4">
                        <p class="mb-1 text-secondary">Total Harga:</p>
                        <h3 class="text-light fw-bold">Rp <?php echo number_format($jasa['harga']); ?></h3>
                    </div>
                    <button type="submit" name="pesan" class="btn btn-light w-100 fw-bold py-2">Konfirmasi
                        Pesanan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>