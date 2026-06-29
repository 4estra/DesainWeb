<?php
include 'koneksi.php';
$id_transaksi = $_GET['id'];
$query = "SELECT pesanan.*, jasa.nama_jasa, jasa.harga 
          FROM pesanan 
          JOIN jasa ON pesanan.jasa_id = jasa.id 
          WHERE pesanan.id = '$id_transaksi'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nota Pembayaran</title>
    <link rel="stylesheet" href="style.css">
</head>

<body style="background: #000; color: #fff; font-family: sans-serif; padding: 20px;">

    <div
        style="max-width: 400px; margin: 50px auto; background: #111; padding: 30px; border: 1px solid #333; border-radius: 10px;">
        <h2 style="text-align: center; border-bottom: 1px solid #333; padding-bottom: 10px;">LENSA.ABAD</h2>

        <div style="margin: 20px 0;">
            <p>ID Transaksi: #<?php echo $data['id']; ?></p>
            <p>Customer: <?php echo $data['nama_customer']; ?></p>
        </div>

        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px 0;">Layanan: <?php echo $data['nama_jasa']; ?></td>
                <td style="text-align: right;">Rp <?php echo number_format($data['total_bayar']); ?></td>
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