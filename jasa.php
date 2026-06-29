<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="Images/LensaAbad.png">
</head>

<body>
    <div class="header">
        <img src="Images/LensaAbadTransparent2.png" alt="">
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

    <?php
    $query = mysqli_query($conn, "SELECT * FROM jasa");
    while ($row = mysqli_fetch_assoc($query)) {
        ?>

        <div class="blok-layanan-utama">
            <div class="area-konten-teks">
                <h2 class="label-nama-paket"><?php echo $row['nama_jasa']; ?></h2>
                <span class="nilai-investasi">Mulai dari Rp <?php echo number_format($row['harga']); ?></span>

                <p class="paragraf-penjelas">
                    <?php echo $row['deskripsi']; ?>
                </p>

                <ul class="list-kelengkapan-file">
                    <li><?php echo $row['durasi']; ?></li>
                    <li><?php echo $row['fotografer']; ?></li>
                    <li><?php echo $row['jumlah_file']; ?>+ File Foto yang sudah di-retouch</li>
                </ul>
                <a href="pesan.php?id=<?php echo $row['id']; ?>" class="btn-pesan">Pesan</a>
            </div>

            <div class="area-bingkai-foto">
                <img class="gambar-unggulan-paket" src="Images/<?php echo $row['image_file']; ?>"
                    alt="<?php echo $row['nama_jasa']; ?>">
            </div>
        </div>

    <?php } ?>

    <hr class="garis-batas-section">

    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Lensa.Abad</h3>
                <p>Capturing moments behind the lens with a minimalist touch.</p>
            </div>
            <div class="footer-section">
                <h4>Connect</h4>
                <div class="social-links">
                    <a href="https://www.instagram.com/lensa.abad">Instagram</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Lensa.Abad. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>