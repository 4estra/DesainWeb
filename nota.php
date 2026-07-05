<?php
include 'koneksi.php';
$id_pesanan = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM pesanan WHERE id = '$id_pesanan'");
$data = mysqli_fetch_assoc($query);
?>

<div class="nota-box" style="border: 1px solid #ccc; padding: 20px; width: 300px;">
    <h2>Invoice Lensa.Abad</h2>
    <p>Customer: <?php echo $data['nama_customer']; ?></p>
    <p>Layanan: <?php echo $data['paket']; ?></p>
    <p>Harga: Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></p>
    <hr>
    <h3>Total: Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></h3>
</div>