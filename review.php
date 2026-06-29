<?php include 'koneksi.php';
if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $rating = (int) $_POST['rating'];

    mysqli_query($conn, "INSERT INTO reviews (nama, isi, rating) VALUES ('$nama', '$isi', $rating)");


    header("Location: review.php");
    exit();
} ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews - Lensa.Abad</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

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

    <div class="container" style="max-width: 800px; margin: 50px auto; padding: 20px; color: white;">
        <h2 style="text-align: center; margin-bottom: 40px;">Client Reviews</h2>

        <form method="POST" action=""
            style="background: #111; padding: 20px; border-radius: 10px; margin-bottom: 40px;">
            <input type="text" name="nama" class="form-control" placeholder="Nama Kamu" required
                style="width: 100%; padding: 10px; margin-bottom: 10px; background: #222; border: 1px solid #333; color: white; border-radius: 5px;">

            <select name="rating"
                style="width: 100%; padding: 10px; margin-bottom: 10px; background: #222; border: 1px solid #333; color: white; border-radius: 5px;">
                <option value="5">5 Bintang (Sangat Puas)</option>
                <option value="4">4 Bintang</option>
                <option value="3">3 Bintang</option>
                <option value="2">2 Bintang</option>
                <option value="1">1 Bintang (Kecewa)</option>
            </select>

            <textarea name="isi" class="form-control" placeholder="Tulis review kamu..." required
                style="width: 100%; padding: 10px; margin-bottom: 10px; background: #222; border: 1px solid #333; color: white; border-radius: 5px; height: 100px;"></textarea>

            <button type="submit" name="submit"
                style="width: 100%; padding: 10px; background: #fff; color: #000; border: none; border-radius: 5px; cursor: pointer;">Kirim
                Review</button>
        </form>

        <?php

        if (isset($_POST['submit'])) {
            $nama = mysqli_real_escape_string($conn, $_POST['nama']);
            $isi = mysqli_real_escape_string($conn, $_POST['isi']);
            $rating = (int) $_POST['rating'];

            mysqli_query($conn, "INSERT INTO reviews (nama, isi, rating) VALUES ('$nama', '$isi', $rating)");
        }
        ?>

        <div style="display: grid; gap: 20px;">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM reviews ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($query)) {
                $bintang = str_repeat('★', $row['rating']);
                echo '
                <div style="background: #111; padding: 20px; border-radius: 10px; border: 1px solid #222;">
                    <h5 style="color: #ffc107; margin-bottom: 10px;">' . $bintang . '</h5>
                    <p style="margin-bottom: 15px;">"' . $row['isi'] . '"</p>
                    <small style="color: #888;">— ' . $row['nama'] . '</small>
                </div>';
            }
            ?>
        </div>
    </div>

</body>

</html>