<?php
include 'koneksi.php';
$id_pesanan = $_GET['id'];

$query = "SELECT pesanan.*, jasa.nama_jasa, jasa.harga 
          FROM pesanan 
          JOIN jasa ON pesanan.jasa_id = jasa.id 
          WHERE pesanan.id = '$id_pesanan'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>


<div class="nota-box" style="border: 1px solid #ccc; padding: 20px; width: 300px;">
    <h2>Invoice Lensa.Abad</h2>
    <p>Customer: <?php echo $data['nama_customer']; ?></p>
    <p>Layanan: <?php echo $data['nama_jasa']; ?></p>
    <p>Harga: Rp <?php echo number_format($data['harga']); ?></p>
    <hr>
    <h3>Total: Rp <?php echo number_format($data['total_bayar']); ?></h3>
</div>