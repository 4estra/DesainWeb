<?php include 'koneksi.php';
$id_jasa = $_GET['id'];
$jasa = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM jasa WHERE id = '$id_jasa'"));

if (isset($_POST['pesan'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $total = $jasa['harga'];

    mysqli_query($conn, "INSERT INTO pesanan (nama_customer, email, jasa_id, total_bayar) VALUES ('$nama', '$email', '$id_jasa', '$total')");
    $id_transaksi = mysqli_insert_id($conn);
    header("Location: upload_bukti.php?id=$id_transaksi");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pesan - <?php echo $jasa['nama_jasa']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container" style="max-width: 500px; margin: 100px auto; padding: 20px; color: white;">
        <a href="jasa.php" style="color: #888; text-decoration: none; font-size: 0.9rem;">&larr; Kembali ke Daftar
            Jasa</a>
        <h2 style="margin-top: 15px; margin-bottom: 20px;">Pesan Paket: <?php echo $jasa['nama_jasa']; ?></h2>
        <form method="POST" style="background: #111; padding: 20px; border-radius: 10px;">
            <input type="text" name="nama" placeholder="Nama Lengkap" required
                style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #333; background: #222; color: white;">
            <input type="email" name="email" placeholder="Email" required
                style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #333; background: #222; color: white;">
            <p style="margin: 15px 0;">Total Harga: <strong>Rp <?php echo number_format($jasa['harga']); ?></strong></p>
            <button type="submit" name="pesan"
                style="width: 100%; padding: 10px; background: #fff; border: none; cursor: pointer;">Konfirmasi
                Pesanan</button>
        </form>
    </div>
</body>

</html>