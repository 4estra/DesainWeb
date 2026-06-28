<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Reviews - Lensa.Abad</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-black text-light">

    <div class="container mx-auto py-5" style="max-width: 800px;">
        <h2 class="text-center mb-5">Client Reviews</h2>

        <form method="POST" action="" class="mb-5 bg-dark p-4 rounded">
            <input type="text" name="nama" class="form-control mb-2" placeholder="Nama Kamu" required>
            <textarea name="isi" class="form-control mb-2" placeholder="Tulis review kamu..." required></textarea>
            <button type="submit" name="submit" class="btn btn-outline-light">Kirim Review</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $nama = mysqli_real_escape_string($conn, $_POST['nama']);
            $isi = mysqli_real_escape_string($conn, $_POST['isi']);
            mysqli_query($conn, "INSERT INTO reviews (nama, isi) VALUES ('$nama', '$isi')");
        }
        ?>

        <div class="row row-cols-1 g-4">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM reviews ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($query)) {
                echo '
                <div class="col">
                    <div class="card h-100 bg-dark text-light border-secondary">
                        <div class="card-body">
                            <h5 class="card-title text-warning">★★★★★</h5>
                            <p class="card-text">"' . $row['isi'] . '"</p>
                        </div>
                        <div class="card-footer border-secondary">
                            <small class="text-secondary">' . $row['nama'] . '</small>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</body>

</html>