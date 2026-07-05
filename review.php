<?php include 'koneksi.php';
if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $rating = (int) $_POST['rating'];

    mysqli_query($conn, "INSERT INTO reviews (nama, isi, rating) VALUES ('$nama', '$isi', $rating)");
    header("Location: review.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews - Lensa.Abad</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-black text-light">

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

    <div class="container py-5 mx-auto px-3" style="max-width: 650px;">
        <div class="card-body p-4">
            <form method="POST" action="">
                <!-- Hapus row g-3 kalau bikin berantakan, kita pakai stack biasa -->
                <div class="mb-3">
                    <label class="form-label text-secondary small">Nama Kamu</label>
                    <input type="text" name="nama" class="form-control bg-dark text-light border-secondary"
                        placeholder="Tulis namamu..." required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-secondary small">Penilaian</label>
                    <select name="rating" class="form-select bg-dark text-light border-secondary">
                        <option value="5">5 Bintang (Sangat Puas)</option>
                        <option value="4">4 Bintang (Puas)</option>
                        <option value="3">3 Bintang (Cukup)</option>
                        <option value="2">2 Bintang (Kurang)</option>
                        <option value="1">1 Bintang (Kecewa)</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label text-secondary small">Pengalaman Kamu</label>
                    <textarea name="isi" class="form-control bg-dark text-light border-secondary"
                        placeholder="Ceritain dong..." required style="min-height: 100px;"></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-light w-100 fw-bold">Kirim Review</button>
            </form>
        </div>
    </div>

    <div class="row g-4 d-flex justify-content-center align-items-center">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM reviews ORDER BY id DESC");
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $bintang = str_repeat('★', $row['rating']);
                echo '
                    <div class="col-6 ">
                        <div class="card bg-dark border-secondary shadow-sm ">
                            <div class="card-body p-2 ">
                                <h5 class="text-warning mb-3">' . $bintang . '</h5>
                                <p class="card-text text-light">"' . $row['isi'] . '"</p>
                                <small class="text-secondary">— ' . $row['nama'] . '</small>
                            </div>
                        </div>
                    </div>';
            }
        } else {
            echo '
                <div class="col-12 text-center py-5">
                    <p class="text-secondary">Belum ada review. Jadilah yang pertama memberikan ulasan untuk kami!</p>
                </div>';
        }
        ?>
    </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>