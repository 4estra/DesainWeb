<?php
include 'koneksi.php';
$id_pesanan = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM pesanan WHERE id = '$id_pesanan'");
$data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Nota Pembayaran</title>
</head>

<body style="background: #000; color: #fff; font-family: sans-serif; padding: 20px;">
    <div
        style="max-width: 400px; margin: 50px auto; background: #111; padding: 30px; border: 1px solid #333; border-radius: 10px;">
        <h2 style="text-align: center; border-bottom: 1px solid #333; padding-bottom: 10px;">LENSA.ABAD</h2>
        <div style="margin: 20px 0;">
            <p>ID Transaksi: #<?php echo $data['id']; ?></p>
            <p>Customer: <?php echo $data['nama_customer']; ?></p>
            <p>Tgl Pesan: <?php echo $data['tgl_pesan']; ?></p>
            <p>Tgl Pengerjaan: <?php echo $data['tgl_pengerjaan']; ?></p>
        </div>
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px 0;">Layanan: <?php echo $data['paket']; ?></td>
                <td style="text-align: right;">Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
            </tr>
        </table>
        <div style="margin-top: 30px; border-top: 1px solid #333; padding-top: 20px; text-align: center;">
            <?php if (!empty($data['bukti_bayar'])): ?>
            <p style="color: #0f0;">Bukti sudah diunggah</p>
            <a href="uploads/<?php echo $data['bukti_bayar']; ?>" target="_blank"
                style="color: #fff; text-decoration: underline;">Lihat Bukti</a>
            <?php else: ?>
            <p style="color: #f00;">Menunggu Bukti Transfer</p>
            <?php endif; ?>
        </div>
        <div style="margin-top: 30px; text-align: center;">
            <a href="jasa.php"
                style="display: block; padding: 10px; background: #fff; color: #000; text-decoration: none; border-radius: 5px;">Kembali</a>
        </div>
    </div>
</body>

</html>